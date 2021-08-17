<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\AssignedTest;
use Redirect;
use Auth;
use File;
use Hash;

class TutorController extends Controller
{

	public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	$tutor = User::where('user_type','=','tutor')->get();
    	return view('admin.tutor.index',compact('tutor'));
    }

    public function create(){
    	return view('admin.tutor.create');
    }

    public function store(Request $request){
    	$validator = Validator::make($request->all(), [
            'name'              => 'required',
            'email'             => 'unique:users,email',
            'contact_no'        => 'required',
            'address'           => 'required',
            'image'             => 'mimes:jpeg,png,jpg,gif,svg',
        ]);
        if($validator->fails()){
        	return redirect('tutor/create')->withErrors($validator)->withInput();
        }
        try{
            $user = new User;
            $user->name       = $request->post('name');
            $user->email      = $request->post('email');
            $user->password   = Hash::make('flight@immivoyage#1');
            $user->address    = $request->post('address');
            $user->mobile_no  = $request->post('contact_no');
            $user->user_type  = 'tutor';
            if($request->hasFile('image')){
    			$image = $request->file('image');
          		$imageName = time().'.'.$image->getClientOriginalExtension();
			    $request->image->move(public_path('image/tutor'), $imageName);
			    $user->image = $imageName;
    		}
            $user->save();
            return redirect('/tutor/list')->with('success', 'Tutor Register Successfully.');
        }catch(Exception $e){
        	return redirect('/login')->with('error', 'Tutor Not Registered. Please Try Again.');
        }
    }

    public function edit($id){
    	$tutor = User::find($id);
    	return view('admin.tutor.edit',compact('tutor'));
    }

    public function update(Request $request){
    	$validator = Validator::make($request->all(), [
            'name'              => 'required',
            'email'             => 'required',
            'contact_no'        => 'required',
            'address'           => 'required',
        ]);
        if($validator->fails()){
        	return redirect('tutor/edit/'.$request->post('id'))->withErrors($validator)->withInput();
        }
        try{
            $user = User::find($request->post('id'));
            $user->name       = $request->post('name');
            $user->email      = $request->post('email');
            $user->address    = $request->post('address');
            $user->mobile_no  = $request->post('contact_no');
            if($request->hasFile('image')){
    			$image = $request->file('image');
          		$imageName = time().'.'.$image->getClientOriginalExtension();
			    $request->image->move(public_path('image/tutor'), $imageName);
			    $user->image = $imageName;
    		}
            $user->save();
            return redirect('/tutor/list')->with('success', 'Tutor Updated Successfully');
        }catch(Exception $e){
        	return redirect('/login')->with('error', 'Tutor Not Updated. Please Try Again.');
        }
    }

    public function delete($id){
    	$tutor = User::find($id);
    	if($tutor){
    		$filename = public_path().'/image/tutor/'.$tutor->image;
    		File::Delete($filename);
    		$tutor->delete();
    		return redirect('/tutor/list')->with('success', 'Tutor Deleted Successfully');
    	}else{
    		return redirect('/tutor/list')->with('error', 'Tutor Not Deleted. Please Try Again !!');
    	}
    }

    public function edit_test_remarks($id){
        $assignTest = AssignedTest::where('id','=',$id)->first();
        //$data[] = json_decode($assignTest->answer);
        return view('admin.tutor.edit_remarks',compact('assignTest','id'));
    }

    public function tutor_update_marks(Request $request){  
        $assignTest        =  AssignedTest::find($request->post('id'));
        $assignTest->marks = $request->post('remark');
        if($assignTest->save()){
            return redirect('edit/test/remarks/'.$request->post('id'))->with('success', 'Remarks Update Successfully');
        }else{
            return redirect('edit/test/remarks/'.$request->post('id'))->with('error', 'Remarks Failed to Update');
        }
    }


}

