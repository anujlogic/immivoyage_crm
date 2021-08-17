<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\ClientImages;
use Redirect;
use Auth;
use Hash;

class ManagementTeamController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
    	$manage_team = User::where('user_type','management')->get();
        return  view('admin.management.index',compact('manage_team'));
    }

    public function create(){
    	return view('admin.management.create');
    }

    public function store(Request $req){
    	$validator = Validator::make($req->all(), [
            'name'       => 'required',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|confirmed|min:8',
            'address'    => 'required',
            'mobile_no'  => 'required',
            'image'      => 'required',
            ]);
        if($validator->fails()){
        	return redirect('/management/create')->withErrors($validator)->withInput();
        }
        try{
        	$manager = new User;
        	$manager->name       = $req->post('name');	
        	$manager->email      = $req->post('email');	
        	$manager->password   = Hash::make($req->post('password'));	
        	$manager->address    = $req->post('address');	
        	$manager->mobile_no  = $req->post('mobile_no');	
        	$manager->user_type  = 'management';
        	if($req->hasFile('image')){
			    $imageName = time().'.'.$req->image->extension();
			    $req->image->move(public_path('image'), $imageName);
			    $manager->image = $imageName;
			}
			$manager->save();
			return redirect('/management/list')->with('success', 'Immivoyage manager created successfully.');
        }catch(Exception $e){
        	return redirect('/management/list')->with('error', 'Immivoyage manager Failed to create.');
        }
    }

    public function edit($id){
    	$manager = User::find($id);
    	return view('admin.management.edit',compact('manager'));
    }

    public function update(Request $req){
    	$manager_data = User::find($req->post('manager_id'));
    	$validator = Validator::make($req->all(), [
            'name'   => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            ]);
            
        if($validator->fails()){
        	return redirect('/management/edit/'.$req->post('manager_id'))->withErrors($validator)->withInput();
        }
        try{
        	$manager = User::find($req->post('manager_id'));
        	$manager->name       = $req->post('name');	
        	$manager->email      = $req->post('email');	
        	$manager->password   = Hash::make($req->post('password'));	
        	$manager->address    = $req->post('address');	
        	$manager->mobile_no  = $req->post('mobile_no');	
        	$manager->user_type  = 'management';
        	if($req->hasFile('image')){
			    $imageName = time().'.'.$req->image->extension();
			    $req->image->move(public_path('image'), $imageName);
			    $manager->image = $imageName;
			}
			$manager->save();
			return redirect('/management/list')->with('success', 'Immivoyage manager updated successfully.');
        }catch(Exception $e){
        	return redirect('/management/list')->with('error', 'Immivoyage manager Failed to update.');
        }
    }

    public function delete($id){
    	$manager = User::find($id);
		if($manager){
    		$manager->delete();
    		return redirect('/management/list')->with('success', 'Immivoyage manager deleted successfully.');
		}else{
			return redirect('/management/list')->with('error', 'Manager not deleted.Please try again.');
		} 
    }

}
