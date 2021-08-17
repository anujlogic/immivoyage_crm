<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ielts;
use Redirect;
use Auth;
use Hash;

class IeltsController extends Controller {

	public function __construct(){
        $this->middleware('auth');
    }

	public function index(){
		if(Auth::user()->user_type !='admin'){
			$ielts = Ielts::where('manage_id',Auth::user()->id)->orderBy('id','DESC')->get();
			return view('admin.ielts.index',compact('ielts'));
		}else{
			$ielts = Ielts::orderBy('id','DESC')->get();
			return view('admin.ielts.index',compact('ielts'));
		}
	}

	public function create(){
		return view('admin.ielts.create');
	}

	public function store(Request $req){
		$validator = Validator::make($req->all(), [
            'fname'             => 'required',
            'lname'             => 'required',
            'email'             => 'required',
            'mobile_no'         => 'required',
            'city'           	=> 'required',
            'address'           => 'required',
        ]);
        if($validator->fails()){
        	return back()->withErrors($validator)->withInput();
        }
        try{
	        $ielts = new ielts;
	        $ielts->first_name   = $req->post('fname');
	        $ielts->last_name    = $req->post('lname');
	        $ielts->email        = $req->post('email');
	        $ielts->mobile_no    = $req->post('mobile_no');
	        $ielts->city         = $req->post('city');
	        $ielts->address      = $req->post('address');
	        $ielts->manage_id    = Auth::user()->id;
	        if(!empty($req->post('interest_status'))){
	        	$ielts->status = $req->post('interest_status');
	        }
	        if(!empty($req->post('test_purpose'))){
	        	$ielts->test_purpose = $req->post('interest_status');
	        }
	        if(!empty($req->post('education'))){
	        	$ielts->education = $req->post('education');
	        }
	        if(!empty($req->post('age'))){
	        	$ielts->age = $req->post('age');
	        }
	        if(!empty($req->post('work_exp'))){
	        	$ielts->work_exp = $req->post('work_exp');
	        }
	        if(!empty($req->post('travel_history'))){
	        	$ielts->travel_history = $req->post('travel_history');
	        }
	        if(!empty($req->post('refusal_before'))){
	        	$ielts->refusal_before = $req->post('refusal_before');
	        }
	        $ielts->save();
	        return redirect('/ielts/list')->with('success', 'Ielts registration add successfully.');
        }catch(Exception $e){
        	return redirect('/ielts/list')->with('error', 'Ielts registration failed.');
        }
	}

	public function edit($id){
		$ielts = Ielts::find($id);
		return view('admin.ielts.edit',compact('ielts'));

	}

	public function update(Request $req){
		 $validator = Validator::make($req->all(), [
            'fname'             => 'required',
            'lname'             => 'required',
            'email'             => 'required',
            'mobile_no'         => 'required',
            'city'           	=> 'required',
            'address'           => 'required',
        ]);
        if($validator->fails()){
        	return back()->withErrors($validator)->withInput();
        }
        try{
	        $ielts = Ielts::find($req->post('id'));
	        $ielts->first_name = $req->post('fname');
	        $ielts->last_name  = $req->post('lname');
	        $ielts->email      = $req->post('email');
	        $ielts->mobile_no  = $req->post('mobile_no');
	        $ielts->city       = $req->post('city');
	        $ielts->address    = $req->post('address');
	        if(!empty($req->post('interest_status'))){
	        	$ielts->status = $req->post('interest_status');
	        }
	        if(!empty($req->post('test_purpose'))){
	        	$ielts->test_purpose = $req->post('test_purpose');
	        }
	        if(!empty($req->post('education'))){
	        	$ielts->education = $req->post('education');
	        }
	        if(!empty($req->post('age'))){
	        	$ielts->age = $req->post('age');
	        }
	        if(!empty($req->post('work_exp'))){
	        	$ielts->work_exp = $req->post('work_exp');
	        }
	        if(!empty($req->post('travel_history'))){
	        	$ielts->travel_history = $req->post('travel_history');
	        }
	        if(!empty($req->post('refusal_before'))){
	        	$ielts->refusal_before = $req->post('refusal_before');
	        }
	        $ielts->save();
	        return redirect('/ielts/list')->with('success', 'Ielts registration add successfully.');
        }catch(Exception $e){
        	return redirect('/ielts/list')->with('error', 'Ielts registration failed.');
        }
	}

	public function delete($id){
		$Ielts = Ielts::find($id);
		$Ielts->delete();
		return redirect('/ielts/list')->with('success', 'Ielts deleted successfully.');
	}
}
