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

class RegisterViaLinkController extends Controller
{
    public function send_link(){
        return view('admin.guest.guest_registration');
    }

    public function guest_registration(Request $req){
        $validator = Validator::make($req->all(), [
            'name'          => 'required',
            'mobile_no'     => 'required',
            'email'         => 'unique:call_leads,email',
            'age'           => 'required',
            'qualification' => 'required',
            'address'       => 'required',
            'call_purpose'  => 'required',
            'feed_back'     => 'required',
            'follow_up'     => 'required',
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
            return redirect('/link/guest/registration')->with('success', 'Registration Successfull..Thanks!');
        } catch (Exception $e) {
            return redirect('/guest/registration')->with('error', 'Call leads failed to update.Please try again!');
        }
    }    
}
