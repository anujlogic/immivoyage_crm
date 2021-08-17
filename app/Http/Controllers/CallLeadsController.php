<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\CallLeads;
use App\Models\ClientImages;
use App\Mail\AdminMail;
use Mail;
use Redirect;
use Auth;
use File;
use Hash;

class CallLeadsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        if(Auth::user()->user_type !='admin'){
            $leads = CallLeads::where('manage_by',Auth::user()->id)->orderBy('id','desc')->get();
            return view('admin.leads.index',compact('leads'));
        }else{
            $leads = CallLeads::orderBy('id','desc')->get();
    	    return view('admin.leads.index',compact('leads'));
        }
    }

    public function create(){
    	$manager = User::where('user_type','management')->get();
    	return view('admin.leads.create',compact('manager'));
    }

    public function store(Request $req){
    	$validator = Validator::make($req->all(), [
            'lead_category' => 'required',
            'name'          => 'required',
            'mobile_no'     => 'required',
            'email'         => 'unique:call_leads,email',
            'age'           => 'required',
            'qualification' => 'required',
            'address'       => 'required',
            'call_purpose'  => 'required',
            'feed_back'     => 'required',
            'follow_up'     => 'required',
            'call_manage_by'=> 'required',
        ]);
        if($validator->fails()){
        	return back()->withErrors($validator)->withInput();
        }
        try {
            $call_lead = new CallLeads;
            $call_lead->lead_category = $req->post('lead_category');
            $call_lead->name          = $req->post('name');
            $call_lead->email         = $req->post('email');
            $call_lead->age           = $req->post('age');
            $call_lead->qualification = $req->post('qualification');
            $call_lead->address       = $req->post('address');
            $call_lead->contact_no    = $req->post('mobile_no');
            $call_lead->call_purpose  = $req->post('call_purpose');
            $call_lead->manage_by     = $req->post('call_manage_by');
            $call_lead->feed_back     = $req->post('feed_back');
            $call_lead->follow_up     = $req->post('follow_up');
        if($req->post('call_purpose')=="visa"){
            $call_lead->visa_category = $req->post('visa_category');
            $call_lead->ielts_score   = $req->post('ielts_score');
            $call_lead->listen        = $req->post('listen_score');
            $call_lead->wirte         = $req->post('write_score');
            $call_lead->read          = $req->post('read_score');
            $call_lead->speak         = $req->post('speak_score');
            $call_lead->country       = $req->post('desire_country');
        }else{
            $call_lead->ielts_score   = $req->post('ieltsScore');
            $call_lead->listen        = $req->post('ieltsListen');
            $call_lead->wirte         = $req->post('ieltsWrite');
            $call_lead->read          = $req->post('ieltsRead');
            $call_lead->speak         = $req->post('ieltsSpeak');
            $call_lead->required_test = $req->post('ielts_test');
            $call_lead->require_band  = $req->post('ieltsBand');
        }
        $call_lead->save();
            return redirect('/call/list')->with('success', 'Call leads saved successfully.');
        } catch (Exception $e) {
            return redirect('/call/list')->with('error', 'Call leads failed to submit.Please try again!');
        }  
    }
    
    public function edit($id){
    	$call_lead = CallLeads::find($id);
        $manager = User::where('user_type','management')->get();
    	return view('admin.leads.edit',compact('call_lead','manager'));
    }
    
    public function update(Request $req){
    	$validator = Validator::make($req->all(), [
            'lead_category' => 'required',
            'name'          => 'required',
            'mobile_no'     => 'required',
            'email'         => 'required',
            'age'           => 'required',
            'qualification' => 'required',
            'address'       => 'required',
            'feed_back'     => 'required',
            'follow_up'     => 'required',
            'call_manage_by'=> 'required',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        try {
            $call_lead = CallLeads::find($req->id);
            $call_lead->lead_category = $req->post('lead_category');
            $call_lead->name          = $req->post('name');
            $call_lead->email         = $req->post('email');
            $call_lead->age           = $req->post('age');
            $call_lead->qualification = $req->post('qualification');
            $call_lead->address       = $req->post('address');
            $call_lead->contact_no    = $req->post('mobile_no');
            $call_lead->manage_by     = $req->post('call_manage_by');
            $call_lead->feed_back     = $req->post('feed_back');
            $call_lead->follow_up     = $req->post('follow_up');
        if($req->post('call_purpose')=="visa"){
            $call_lead->visa_category = $req->post('visa_category');
            $call_lead->ielts_score   = $req->post('ielts_score');
            $call_lead->listen        = $req->post('listen_score');
            $call_lead->wirte         = $req->post('write_score');
            $call_lead->read          = $req->post('read_score');
            $call_lead->speak         = $req->post('speak_score');
            $call_lead->country       = $req->post('desire_country');
        }else{
            $call_lead->ielts_score   = $req->post('ieltsScore');
            $call_lead->listen        = $req->post('ieltsListen');
            $call_lead->wirte         = $req->post('ieltsWrite');
            $call_lead->read          = $req->post('ieltsRead');
            $call_lead->speak         = $req->post('ieltsSpeak');
            $call_lead->required_test = $req->post('ielts_test');
            $call_lead->require_band  = $req->post('ieltsBand');
        }
        $call_lead->save();
            return redirect('/call/list')->with('success', 'Call leads Updated successfully.');
        } catch (Exception $e) {
            return redirect('/call/list')->with('error', 'Call leads failed to update.Please try again!');
        }
    }
    
    public function delete($id){
    	$call_lead = CallLeads::find($id);
        if($call_lead){
            $call_lead->delete();
            return redirect('/call/list')->with('success', 'Call lead deleted successfully.');
        }else{
            return redirect('/call/list')->with('error', 'Call lead not found.Please try again.');
        } 
    }   

    public function call_detail($id){
        $call_lead = CallLeads::find($id);
        $manager = User::where('user_type','management')->get();
        return view('admin.leads.view',compact('call_lead','manager'));
    }


    public function enroll_update(Request $req){
        if($req->ajax()){
            $value  = $req->post('enroll');
            $data   = explode("-",$value);
            $enroll = CallLeads::where('id',$data[1])->with('manager')->first();
            $enroll->enroll = $data[0];
            $enroll->save();
            if($data[0]=="no"){
                $user = User::where('lead_id',$data[1])->first();
                if($user){
                    $user->delete();
                }
            }
            if($data[0]=="yes"){
                $user = User::where('lead_id',$data[1])->first();
                if ($user === null){
                    $user = new User;
                    $user->name  = $enroll->name;
                    $user->email = $enroll->email;
                    $user->password  = Hash::make('Code@immivoyage#1');
                    $user->user_type = 'lead';
                    $user->address   = $enroll->address;
                    $user->mobile_no = $enroll->contact_no;
                    $user->lead_id   = $data[1];
                    $user->save();
                }
                $email = 'mylogicforyou@gmail.com';
                 $data  = [
                    'category'=>$enroll->lead_category,
                    'name'=>$enroll->name,
                    'mobile_no'=>$enroll->contact_no,
                    'call_purpose'=>$enroll->call_purpose,
                    'feed_back'=>$enroll->feed_back,
                    'manage_by'=>$enroll->manager->name,
                    'url'=>'https://portal.immivoyage.com'
                ];
                Mail::to($email)->send(new AdminMail($data));
            }
            if($enroll){
                return response()->json(['message'=>'Enroll updated successfully;']);
            }else{
                return response()->json(['message'=>'Enroll failed to update;']);
            }
        }
    }

}
