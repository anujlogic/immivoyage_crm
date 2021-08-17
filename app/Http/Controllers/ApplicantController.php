<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\ClientImages;
use App\Models\Country;
use App\Models\University;
use App\Models\CourseType;
use App\Models\Courses;
use App\Models\Campus;
use App\Models\Applications;
use App\Models\Intake;
use Redirect;
use Auth;
use File;
use Hash;

class ApplicantController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

	public function index(){
		return view('admin.applicant.index');
	}

	public function getUniversity(Request $request)
    {
        $data['university'] = University::where("country_id",$request->country_id)->get(["name","id"]);
        return response()->json($data);
    }

    public function getCourseType(Request $request)
    {
        $data['courseType'] = CourseType::where("university_id",$request->university_id)->get(["name","id"]);
        return response()->json($data);
    }

    public function getCourses(Request $request)
    {
        $data['courses'] = Courses::where("course_type_id",$request->course_type_id)->get(["name","id"]);
        return response()->json($data);
    }

	public function create(){
		$country = Country::get();
		return view('admin.applicant.create',compact('country'));
	}


	public function edit(){
		echo 'edit page';
	}

	public function delete(Request $request)
    {
		echo 'delete function';
	}

	public function store_application(Request $request)
    {
		$validator = Validator::make($request->all(), [
            'country_id'    => 'required',  
            'university_id' => 'required',
            'coursetype_id' => 'required',
            'courses_id'    => 'required',
        ]);
        if($validator->fails()){
        	return redirect('/applicant/create')->withErrors($validator)->withInput();
        }
        try{
        	$application = new Applications;

        	$application->user_id 		 = Auth::user()->id;
        	$application->country_id 	 = $request->post('country_id');	
        	$application->university_id  = $request->post('university_id');	
        	$application->course_type_id = $request->post('coursetype_id');	
        	$application->course_id      = $request->post('coursetype_id');
        	if($application->save()){
        		return redirect()->route('applicant.university',['id'=>$application->id]);
        	}else{
        		return redirect('/applicant/create')->with('success', 'YOUR DESIRED COURSE. PLEASE CLICK TO APPLY NOW BUTTON BELOW');
        	}
        }catch(Exception $e){
        	return redirect('/applicant/create')->with('success', 'Application failed to generate.');
        }
		  
	}

	public function apply_university($id)
    {
		$country = Country::get();
		$applied_university  = Applications::where('id',$id)->with('getCountry')->with('getUniversity')->with('getCourseType')->with('getCourse')->first();
		return view('admin.applicant.create',compact('country','applied_university'));
		
	}

	public function apply_intake($id)
    {
		$application = Applications::where('id',$id)->first();
		$intake = Intake::where('university_id',$application->university_id)->where('course_id',$application->course_id)->with('intakeUniversity')->with('intakeCourse')->get();
		
		return view('admin.applicant.apply_intake',compact('intake','id'));
	}

	public function getCampus(Request $request){
        $data['campus'] = Campus::where("intake_id",$request->intake_id)->get(["name","id"]);
        return response()->json($data);
    }

    public function intake_update(Request $req)
    {
    	$validator = Validator::make($req->all(), [
            'intake'    => 'required',  
            'campus' => 'required',
        ]);
        if($validator->fails()){
        	return redirect('/apply/intake/'.$req->application_id)->withErrors($validator)->withInput();
        }
    	try{
    		$application = Applications::find($req->application_id);
    		$application->intake = $req->post('intake');
    		$application->campus = $req->post('campus');
    		$application->save();
    		return redirect()->route('selected.application',['id'=>$req->application_id]);
    	}catch(Exception $e){
    		return redirect('/apply/intake/'.$req->application_id)->with('error', 'Application failed to generate.Please Try Again !');
    	}
    }   

    public function selected_application($id)
    {
    	$application = Applications::where('id',$id)->with('getCountry')->with('getUniversity')->with('getCourseType')->with('getCourse')->with('getIntake')->with('getCampus')->get();
    	return view('admin.applicant.selected_application',compact('application','id'));
    }


    public function fileStore(Request $request){
        $user        = Auth::user();    
        $image       = $request->file('file');
        $imageName   = $image->getClientOriginalName();
        $image->move(public_path('/image/clients/'),$imageName);
        $imageUpload = new ClientImages();
        $imageUpload->client_id = $user->id;
        $imageUpload->passport_size_img = $imageName;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }

    public function fileDestroy(Request $request){
        $filename =  $request->get('filename');
        ClientImages::where('filename',$filename)->delete();
        $path=public_path().'/image/clients/'.$filename;
        if(file_exists($path)){
            unlink($path);
        }
        return response()->json(['success'=>$filename]);
    }

    public function application_checkout($id){
        return view('admin.applicant.application_checkout',compact('id'));
    }

    public function student_detail_update(Request $request){
        $validator = Validator::make($request->all(), [
            'passport_no'    => 'required',  
            'first_name' => 'required',
        ]);
        if($validator->fails()){
            return redirect('/application/checkout/'.$request->id)->withErrors($validator)->withInput();
        }
        try{
            $application = Applications::find($request->id);
            $application->passport_no      = $request->post('passport_no');
            $application->first_name       = $request->post('first_name');
            $application->last_name        = $request->post('last_name');
            $application->email            = $request->post('email');
            $application->mobile_no        = $request->post('phone_no');
            $application->dob              = $request->post('dob');
            $application->counsellor_no    = $request->post('counseller_phone_no');
            $application->counsellor_email = $request->post('counsellor_email');
            $application->save();
            return response()->json(['success'=>'Student detail updated successfully.']);
        }catch(Exception $e){
            return response()->json(['error'=>'Student detail failed to update.']);
        }
    }
       
}
