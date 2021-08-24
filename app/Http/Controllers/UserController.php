<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\ClientImages;
use Redirect;
use Auth;
use File;
use Hash;
use Str;

class UserController extends Controller{

	public function user_create(){
		return view('user.create');
	}

	public function user_edit($id){
		$client = Client::with('client_image')->with('client_account')->find($id);
    	return view('user.edit',compact('client'));

	}

	public function user_update(Request $request){
		$validator = Validator::make($request->all(), [
            'fname'             => 'required',
            'lname'             => 'required',
            'mobile_no'         => 'required',
            'nominee'           => 'required',
            'address'           => 'required',
            'age'               => 'required',
            'citizenship'       => 'required',
            'visit_purpose'     => 'required',
        ]);
        if($validator->fails()){
        	return back()->withErrors($validator)->withInput();
        }
        try{
            $user = User::where('id',$request->post('account_id'))->first();
            $user->name       = ucwords($request->post('fname')).' '.ucwords($request->post('lname'));
            $user->email      = $request->post('email');
            $user->address    = $request->post('address');
            $user->mobile_no  = $request->post('mobile_no');
            $user->save();

	    	$client = Client::find($request->post('client_id'));
			$client->first_name          = $request->post('fname');
	    	$client->last_name           = $request->post('lname');
	    	$client->father_husband      = $request->post('nominee');
	    	$client->email               = $request->post('email');
	    	$client->address             = $request->post('address');
	    	$client->age                 = $request->post('age');
	    	$client->citizenship         = $request->post('citizenship');
	    	$client->visit_purpose       = $request->post('visit_purpose');
	    	$client->desire_country      = $request->post('country');
	    	$client->travel_purpose      = $request->post('travel_reason');
	    	$client->listen_score        = $request->post('listen_score');
	    	$client->write_score         = $request->post('write_score');
	    	$client->read_score          = $request->post('read_score');
	    	$client->speak_score         = $request->post('speak_score');
	    	$client->qualification       = $request->post('qualification');
	    	$client->work_experience     = $request->post('wrok_exp');
	    	$client->visa_applied_before = $request->post('applied_before');
	        $client->save();
            if($request->post('visit_purpose')=='ielts'){
    	        $client_image = ClientImages::where('client_id',$request->post('client_id'))->first();
                if($request->hasFile('passport_size_img')){
            		$passport_size_img = time().'.'.$request->passport_size_img->getClientOriginalName(); 
            		$request->passport_size_img->move(public_path('image/clients'), $passport_size_img);
            		$client_image['passport_size_img'] = $passport_size_img;
                }
                if($request->hasFile('passport_front_img')){
        		    $passport_front_img = time().'.'.$request->passport_front_img->getClientOriginalName();  
        		    $request->passport_front_img->move(public_path('image/clients'), $passport_front_img);
    		        $client_image['passport_front_img'] = $passport_front_img;
                }
                if($request->hasFile('passport_back_img')){
        		    $passport_back_img = time().'.'.$request->passport_back_img->getClientOriginalName();  
        		    $request->passport_back_img->move(public_path('image/clients'), $passport_back_img);
        		    $client_image['passport_back_img'] = $passport_back_img;
                }
                if($request->hasFile('matric_img')){    
        		    $matric_img = time().'.'.$request->matric_img->getClientOriginalName();  
        		    $request->matric_img->move(public_path('image/clients'), $matric_img);
        		    $client_image['matric_img'] = $matric_img;
                }
                if($request->hasFile('plus_two_img')){    
        		    $plus_two_img = time().'.'.$request->plus_two_img->getClientOriginalName();  
        		    $request->plus_two_img->move(public_path('image/clients'), $plus_two_img);
        		    $client_image['plus_two_img'] = $plus_two_img;
                }
                if($request->hasFile('graduation_img')){
        		    $graduation_img = time().'.'.$request->graduation_img->getClientOriginalName();  
        		    $request->graduation_img->move(public_path('image/clients'), $graduation_img);
        		    $client_image['graduation_img'] = $graduation_img;
                }
                if($request->hasFile('masters_img')){
        		    $masters_img = time().'.'.$request->masters_img->getClientOriginalName();  
        		    $request->masters_img->move(public_path('image/clients'), $masters_img);
        		    $client_image['masters_img'] = $masters_img;
                }
                if($request->hasFile('masters_img')){    
        		    $ielts_img = time().'.'.$request->ielts_img->getClientOriginalName();  
        		    $request->ielts_img->move(public_path('image/clients'), $ielts_img);
        		    $client_image['ielts_img'] = $ielts_img;
                }
                if($request->hasFile('masters_img')){
        		    $id_proof_img = time().'.'.$request->id_proof_img->getClientOriginalName();  
        		    $request->id_proof_img->move(public_path('image/clients'), $id_proof_img);
        		    $client_image['id_proof_img'] = $id_proof_img;
                }
        		$client_image->client_id = $client->id;
        		$client_image->save();
            }
	        return redirect('/dashboard')->with('success', 'Immivoyage Client updated successfully.');
		}catch (Exception $e){
			return back('/dashboard')->with('error', 'Data not updated.Please try again!');
		}
	}  

    public function view_user_detail($id){
        $client = Client::with('client_image')->with('client_account')->find($id);
        return view('admin.client.view',compact('client'));
    }


    public function forget_password(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
        ]);

        try{
            $token = Str::random(64);
            $user  = User::where('email','=',$request->input('email'))->first();
            if($user){
                $user->password = $token;
                $user->save();
                return redirect('/forgot-password')->with('success', 'Password send on your Verified Email Account!');
            }else{
                return redirect('/forgot-password')->with('error', 'Account Does not Exist !');
            }
        }catch(Exception $e){
            return redirect('/forgot-password')->with('error', 'Something Wrong. Please Try Again !');
        }
    }

    public function send_link(){
        //print_r('hello Mr guest user');exit;
        return view('admin.guest.guest_registration');
    } 
    
}
