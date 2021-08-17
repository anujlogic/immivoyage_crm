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

class ClientController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	$client = Client::with('client_image')->with('manager')->where('manage_id','!=',0)->orderBy('id', 'DESC')->get();
    	return view('admin.client.index',compact('client')); 
    }

    public function create(){
    	return view('admin.client.create');
    }

    public function store(Request $request){
    	$validator = Validator::make($request->all(), [
            'fname'             => 'required',  
            'lname'             => 'required',
            'password'          => 'required|confirmed|min:8',
            'mobile_no'         => 'required',
            'nominee'           => 'required',
            'email'             => 'unique:client,email',
            'email'             => 'unique:users,email',
            'address'           => 'required',
            'age'               => 'required',
            'citizenship'       => 'required',
            
        ]);
        if($validator->fails()){
        	return redirect('client/create')->withErrors($validator)->withInput();
        }
        try{
            $user = new User;
            $user->name       = ucwords($request->post('fname')).' '.ucwords($request->post('lname'));
            $user->email      = $request->post('email');
            $user->password   = Hash::make($request->post('password'));
            $user->user_type  = 'client';
            $user->address    = $request->post('address');
            $user->mobile_no  = $request->post('mobile_no');
            $user->save();

        	$client = new Client;
        	$client->manage_id           = Auth::id();
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
            $client->account_id = $user->id;
            $client->save();

            if($request->post('visit_purpose')=='ielts'){
            	$client_image = new ClientImages;
        		$passport_size_img = time().'.'.$request->passport_size_img->getClientOriginalName(); 
        		$request->passport_size_img->move(public_path('image/clients'), $passport_size_img);
        		$client_image->passport_size_img = $passport_size_img;

        		$passport_front_img = time().'.'.$request->passport_front_img->getClientOriginalName();  
        		$request->passport_front_img->move(public_path('image/clients'), $passport_front_img);
        		$client_image->passport_front_img = $passport_front_img;

        		$passport_back_img = time().'.'.$request->passport_back_img->getClientOriginalName();  
        		$request->passport_back_img->move(public_path('image/clients'), $passport_back_img);
        		$client_image->passport_back_img = $passport_back_img;

        		$matric_img = time().'.'.$request->matric_img->getClientOriginalName();  
        		$request->matric_img->move(public_path('image/clients'), $matric_img);
        		$client_image->matric_img = $matric_img;

        		$plus_two_img = time().'.'.$request->plus_two_img->getClientOriginalName();  
        		$request->plus_two_img->move(public_path('image/clients'), $plus_two_img);
        		$client_image->plus_two_img = $plus_two_img;

        		$graduation_img = time().'.'.$request->graduation_img->getClientOriginalName();  
        		$request->graduation_img->move(public_path('image/clients'), $graduation_img);
        		$client_image->graduation_img = $graduation_img;

        		$masters_img = time().'.'.$request->masters_img->getClientOriginalName();  
        		$request->masters_img->move(public_path('image/clients'), $masters_img);
        		$client_image->masters_img = $masters_img;

        		$ielts_img = time().'.'.$request->ielts_img->getClientOriginalName();  
        		$request->ielts_img->move(public_path('image/clients'), $ielts_img);
        		$client_image->ielts_img = $ielts_img;

        		$id_proof_img = time().'.'.$request->id_proof_img->getClientOriginalName();  
        		$request->id_proof_img->move(public_path('image/clients'), $id_proof_img);
        		$client_image->id_proof_img = $id_proof_img;
                $data = [];
                if($request->hasfile('others_img')){
                    foreach($request->file('others_img') as $key => $image){
                        $img_name=time().'.'.$image->getClientOriginalName();
                        $image->move(public_path('/image/clients/'), $img_name);
                        $data[] = $img_name;
                    }
                }
                if(!empty($data)){
                    $client_image->other_images =json_encode($data);
                }
                $client_image->client_id = $client->id;
        		$client_image->save();
            }
    	  	
            if(Auth::check() && Auth::user()->user_type=='admin'){
                return redirect('/client')->with('success', 'Application form submitted successfully.');
            }else{
                return redirect('/login')->with('success', 'Immivoyage Client created successfully.');
            }
        }catch(Exception $e){
        	return redirect('/client')->with('error', 'Data not updated.Please try again!');
        }
           
    }

    public function edit($id){
    	$client = Client::with('client_image')->with('client_account')->find($id);
    	return view('admin.client.edit',compact('client'));
    }

    public function update(Request $request){
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
            $user->name      = ucwords($request->post('fname')).' '.ucwords($request->post('lname'));
            $user->email     = $request->post('email');
            $user->address   = $request->post('address');
            $user->mobile_no = $request->post('mobile_no');
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
                $data = [];
                if($request->hasfile('others_img')){
                    foreach($request->file('others_img') as $key => $image){
                        $img_name=time().'.'.$image->getClientOriginalName();
                        $image->move(public_path('/image/clients/'), $img_name);
                        $data[] = $img_name;
                    }
                }
                if(!empty($data)){
                    $client_image->other_images =json_encode($data);
                }
        		$client_image->client_id = $client->id;
        		$client_image->save();
            }
	        return redirect('/client')->with('success', 'Immivoyage Client updated successfully.');
		}catch (Exception $e){
			return back('/client')->with('error', 'Data not updated.Please try again!');
		}
    }

    public function delete($id){
		$client = Client::find($id);
		  if($client){
            if(!empty($client->account_id)){
                 $user = User::where('id',$client->account_id)->first();
                 $user->delete();
            }
            $client->delete();
            $images = ClientImages::where('client_id', $id)->get();
            foreach($images as $val){
                $filename = public_path().'/image/clients/'.$val->passport_size_img;
                File::delete($filename);
                $filename1 = public_path().'/image/clients/'.$val->passport_front_img;
                File::delete($filename1);
                $filename2 = public_path().'/image/clients/'.$val->passport_back_img;
                File::delete($filename2);
                $filename3 = public_path().'/image/clients/'.$val->matric_img;
                File::delete($filename3);
                $filename4 = public_path().'/image/clients/'.$val->plus_two_img;
                File::delete($filename4);
                $filename5 = public_path().'/image/clients/'.$val->diploma_img;
                File::delete($filename5);
                $filename6 = public_path().'/image/clients/'.$val->graduation_img;
                File::delete($filename6);
                $filename7 = public_path().'/image/clients/'.$val->masters_img;
                File::delete($filename7);
                $filename8 = public_path().'/image/clients/'.$val->ielts_img;
                File::delete($filename8);
                $filename9 = public_path().'/image/clients/'.$val->id_proof_img;
                File::delete($filename9);
            }
            $client_images = ClientImages::where('client_id', $id)->delete();
    		return redirect('/client')->with('success', 'Immivoyage client deleted successfully.');
		}else{
			return redirect('/client')->with('error', 'Client not deleted.Please try again.');
		} 
    }

    public function client_register_view(){
        return view('admin.user.register');
    }

    public function Clint_register_store(Request $req){
        try{
            $client = new User;
            $client->name       = $req->post('name');  
            $client->email      = $req->post('email'); 
            $client->password   = Hash::make($req->post('password'));  
            $client->address    = $req->post('address'); 
            $client->user_type  = 'client';
            $client->save();
            return redirect('/login')->with('success', 'Immivoyage Client created successfully.');
        }catch(Exception $e){
            return redirect('/register')->with('error', 'Immivoyage manager Failed to create.');
        }
    }

    public function view_document_detail($id){
        $client = Client::with('client_image')->with('client_account')->find($id);
        return view('admin.client.view',compact('client'));
    }

}
