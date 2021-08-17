<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\ClientImages;
use App\Models\AssignedTest;
use App\Models\CallLeads;
use Auth; 
use DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function profile(){
    	$login_id = Auth::User()->id;
    	$login_user = User::where('id',$login_id)->first();
    	return view('admin.profile.index',compact('login_user'));
    }

    public function dashboard(){
    	$login_id = Auth::user()->id;
    	$total_client   = Client::count();
    	$total_process  = Client::where('status','process')->count();
    	$total_success  = Client::where('status','success')->count();
    	$total_rejected = Client::where('status','rejected')->count();
        // Management Dashboard process // 
        $management_client   = Client::where('id',$login_id)->count();
        $management_process  = Client::where('id',$login_id)->where('status','process')->count();
        $management_success  = Client::where('id',$login_id)->where('status','success')->count();
        $management_rejected = Client::where('id',$login_id)->where('status','rejected')->count();

    	$management  = Client::select('manage_id', DB::raw('count(*) as total'))->where('manage_id','!=',0)->with('manager')->groupBy('manage_id')->get();
    	$last_month  = Client::where('created_at','>=',Carbon::now()->subdays(30))->with('client_account')->get();
    	$client_data = Client::where('account_id',$login_id)->with('client_image')->with('client_account')->first();
        $getLead     = CallLeads::where('email',Auth::user()->email)->where('enroll','=','yes')->first();

        if(Auth::user()->user_type=="tutor"){
            $tutorAssignTest  = AssignedTest::where('tutor_id',$login_id)->with('tutor')->with('test')->orderBy('id','DESC')->get();
        }else{
            $tutorAssignTest = [];
        }

        if(Auth::user()->user_type=="lead"){
            $getMyTest  = AssignedTest::where('student_id',$getLead->id)->with('student')->with('tutor')->with('test')->orderBy('id','DESC')->get();
        }else{
            $getMyTest = [];
        }
        //print '<pre>'; print_r($getMyTest->toArray());exit;
    	return view('dashboard',compact('total_client','total_process','total_success','total_rejected','management','last_month','client_data','management_client','management_process','management_process','management_rejected','getMyTest','tutorAssignTest'));
    }

    public function update_status(Request $request){
    	if($request->ajax()){
            $value  = $request->post('status');
            $data   = explode("-",$value);
            $client = Client::find($data[1]);
            $client->status = $data[0];
            $client->save();
            if($client){
                return response()->json(['message'=>'Client status updated successfully;']);
            }else{
                return response()->json(['message'=>'Client status updated failed;']);
            }
        }
    }   


}
