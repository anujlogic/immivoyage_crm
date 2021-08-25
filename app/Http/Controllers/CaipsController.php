<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\CaipsNotes;
use File;

class CaipsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	$caips = CaipsNotes::orderBy('id','DESC')->get();
     	return view('admin.caips.index',compact('caips'));
    }

    public function create(){
    	return view('admin.caips.create');
    }

    public function store(Request $request){
    	$v = Validator::make($request->all(), [
        	'name'          => 'required',
        	'email'         => 'unique:caips_note,email',
        	'contact_no'    => 'required',
        	'passport_no'   => 'required',
        	'birth_place' => 'required',
        	'gender'        => 'required',
        	'dob'           => 'required',
        	'issue_date'    => 'required',
        	'note'          => 'mimes:jpeg,png,jpg,gif,svg',
    	]);

    	if ($v->fails()){
        	return redirect()->back()->withErrors($v->errors());
    	}
    	try{
    		$caipsNote = new CaipsNotes;
    		$caipsNote->name          = $request->post('name');
    		$caipsNote->email         = $request->post('email');
    		$caipsNote->contact_no    = $request->post('contact_no');
    		$caipsNote->passport_no   = $request->post('passport_no');
    		$caipsNote->birth_place = $request->post('birth_place');
    		$caipsNote->gender        = $request->post('gender');
    		$caipsNote->dob           = $request->post('dob');
    		$caipsNote->issue_date    = $request->post('issue_date');
    		$caipsNote->expire_date   = $request->post('expire_date');
    		if($request->hasFile('note')){
    			$image = $request->file('note');
          		$imageName = time().'.'.$image->getClientOriginalExtension();
			    $request->note->move(public_path('image/caips'), $imageName);
			    $caipsNote->notes_file = $imageName;
    		}
    		$caipsNote->save();
    		return redirect('/caips/list')->with('success', 'Caips Note Store successfully.');
    	}catch(Exception $e){
    		return redirect('/caips/list')->with('error', 'Caips Note failed to store.');
    	}
    }

    public function edit($id){
    	$caipsNote = CaipsNotes::find($id);
    	return view('admin.caips.edit',compact('caipsNote'));
    }

    public function update(Request $request){
    	$v = Validator::make($request->all(), [
        	'name'          => 'required',
        	'email'         => 'required',
        	'contact_no'    => 'required',
        	'passport_no'   => 'required',
        	'birth_place'   => 'required',
        	'gender'        => 'required',
        	'dob'           => 'required',
        	'issue_date'    => 'required',
        	'note'          => 'mimes:jpeg,png,jpg,gif,svg',
    	]);

    	if ($v->fails()){
        	return redirect()->back()->withErrors($v->errors());
    	}
    	try{
    		$caipsNote = CaipsNotes::find($request->post('id'));
    		$caipsNote->name          = $request->post('name');
    		$caipsNote->email         = $request->post('email');
    		$caipsNote->contact_no    = $request->post('contact_no');
    		$caipsNote->passport_no   = $request->post('passport_no');
    		$caipsNote->birth_place   = $request->post('birth_place');
    		$caipsNote->gender        = $request->post('gender');
    		$caipsNote->dob           = $request->post('dob');
    		$caipsNote->issue_date    = $request->post('issue_date');
    		$caipsNote->expire_date   = $request->post('expire_date');
    		if($request->hasFile('note')){
    			$image = $request->file('note');
          		$imageName = time().'.'.$image->getClientOriginalExtension();
			    $request->note->move(public_path('image/caips'), $imageName);
			    $caipsNote->notes_file = $imageName;
    		}
    		$caipsNote->save();
    		return redirect('/caips/list')->with('success', 'Caips Note Updated Successfully.');
    	}catch(Exception $e){
    		return redirect('/caips/list')->with('error', 'Caips Note Failed to Update !!.');
    	}
    }


    public function delete($id){
    	$caipsNote = CaipsNotes::find($id);
    	if($caipsNote){
    		$filename = public_path().'/image/caips/'.$caipsNote->notes_file;
    		File::delete($filename);
    		$caipsNote->delete();
    		return redirect('/caips/list')->with('success', 'Caips Note Deleted Successfully.');
    	}else{
    		return redirect('/caips/list')->with('error', 'Caips Note Failed to Delete.');
    	}
    }

}
