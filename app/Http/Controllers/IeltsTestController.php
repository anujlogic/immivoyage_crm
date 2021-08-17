<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\IeltsTest;
use App\Models\CallLeads;
use App\Models\AssignedTest;
use App\Models\UploadTest;
use Redirect;
use Auth;
use File;
use Hash;

class IeltsTestController extends Controller
{

	public function __construct(){
        $this->middleware('auth');
    }

   	public function index(){
    	$ieltsTest  = IeltsTest::where('tutor_id',Auth::id())->orderBY('id','DESC')->get();
    	$getLead 	= CallLeads::where('email',Auth::user()->email)->first();
    	if(Auth::user()->user_type=="lead"){
    		$getMyTest  = AssignedTest::where('student_id',$getLead->id)->with('student')->with('tutor')->with('test')->orderBy('id','DESC')->get();
    	}else{
    		$getMyTest = [];
    	}
    	return view('ieltsTest.index',compact('ieltsTest','getMyTest'));
    }

    public function create(){
    	return view('ieltsTest.create');
    }

    public function store(Request $request){
    	$validator = Validator::make($request->all(), [
            'name'        => 'required',
            'category'    => 'required',
            'description' => 'required',
            'file'        => 'required|file|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if($validator->fails()){
        	return redirect('ielts/test/create')->withErrors($validator)->withInput();
        }
    	try{
    		$ieltTest = new IeltsTest;
    		$ieltTest->tutor_id = Auth::id();
    		$ieltTest->name = $request->post('name');
    		$ieltTest->category	   = $request->post('category');
    		$ieltTest->description = $request->post('description');
    	 	if($request->hasFile('file')){
    			$image = $request->file('file');
          		$imageName = time().'.'.$image->getClientOriginalExtension();
			    $request->file->move(public_path('image/ielts_test'), $imageName);
			    $ieltTest->file = $imageName;
    		}
    		$ieltTest->save();
    		return redirect('/ielts/test/list')->with('success', 'Test Created Successfully');
    	} catch (Exception $e) {
    		return redirect('/ielts/test/list')->with('error', 'Test Not Created.PLease Try Again');
    	}
    }

    public function edit($id){
    	$ieltsTest = IeltsTest::find($id);
    	return view('ieltsTest.edit',compact('ieltsTest'));
    }

    public function update(Request $request){
    	$validator = Validator::make($request->all(), [
            'name'              => 'required',
            'category'          => 'required',
        ]);
        if($validator->fails()){
        	return redirect('ielts/test/edit'.$request->post('id'))->withErrors($validator)->withInput();
        }
    	try{
    		$ieltTest = IeltsTest::find($request->post('id'));
    		$ieltTest->name 	   = $request->post('name');
    		$ieltTest->category	   = $request->post('category');
    		$ieltTest->description = $request->post('description');
    	 	if($request->hasFile('file')){
    			$image = $request->file('file');
          		$imageName = time().'.'.$image->getClientOriginalExtension();
			    $request->file->move(public_path('image/ielts_test'), $imageName);
			    $ieltTest->file = $imageName;
    		}
    		$ieltTest->save();
    		return redirect('/ielts/test/list')->with('success', 'Test Updated Successfully');
    	} catch (Exception $e) {
    		return redirect('/ielts/test/list')->with('error', 'Test Not Updated.PLease Try Again');
    	}
    }   

    public function delete($id){
    	$ieltsTest = IeltsTest::find($id);
    	if($ieltsTest){
    		$filename = public_path().'/image/ielts_test/'.$ieltsTest->file;
    		File::Delete($filename);
    		$ieltsTest->delete();
    		return redirect('/ielts/test/list')->with('success', 'Test Deleted Successfully');
    	}else{
    		return redirect('/ielts/test/list')->with('error', 'Test Not Deleted. Please Try Again');
    	}
    }

    public function assign_test($id){
    	$students = CallLeads::where('enroll','=','yes')->get();
    	$tests    = IeltsTest::orderBy('id','DESC')->get();
    	$getTest  = AssignedTest::with('student')->with('tutor')->with('test')->orderBy('id','DESC')->get();
    	return view('ieltsTest.assign_test',compact('students','tests','getTest'));
    }

    public function assign_test_store(Request $request){
    	$validator = Validator::make($request->all(), [
            'student_list' => 'required',
            'test'         => 'required',
        ]);
        if($validator->fails()){
        	return redirect('ielts/test/assign/1')->withErrors($validator)->withInput();
        }
    	try{
    		$students = $request->post('student_list');
    		$test_id  = $request->post('test');
    		 
    		foreach($students as $student_id){
    			$assignTest = new AssignedTest;
			    $assignTest->student_id = $student_id;
			    $assignTest->tutor_id   = Auth::id();
			    $assignTest->test_id    = $test_id;
			    $assignTest->save();
	    	}
	    	return redirect('/ielts/test/assign/'.$test_id)->with('success', 'Test assigned Successfully');
    	}catch(Exception $e){
    		return redirect('/ielts/test/assign/'.$test_id)->with('error', 'Test Not Assigned.Please Try again.');
    	}
    }


    public function test_upload_page(){
    	$getLead 	    = CallLeads::where('email',Auth::user()->email)->first();
        $myUpoadedTest  = UploadTest::where('student_id',$getLead->id)->with('test')->with('tutor')->with('student')->get();
    	if(Auth::user()->user_type=="lead"){
    		$getMyTest  = AssignedTest::where('student_id',$getLead->id)->with('test')->get();
    	}else{
    		$getMyTest = [];
    	}
    	return view('ieltsTest.upload_student_test',compact('getMyTest','myUpoadedTest'));
    }


    public function student_test_upload(Request $request){
        $validator = Validator::make($request->all(), [
            'assign_id' => 'required',
            'file'      => 'mimes:jpeg,png,jpg,gif,svg',
        ]);
        if($validator->fails()){
            return redirect('test/upload/view')->withErrors($validator)->withInput();
        }
        try{
            $assignTestData = AssignedTest::where('id','=',$request->post('assign_id'))->first();
            $uploadTest     = new UploadTest;
            $uploadTest->assign_test_id = $request->post('assign_id');
            $uploadTest->test_id        = $assignTestData->test_id;
            $uploadTest->tutor_id       = $assignTestData->tutor_id;
            $uploadTest->student_id     = $assignTestData->student_id;
            if($request->hasFile('file')){
                $image     = $request->file('file');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $request->file->move(public_path('image/upload_test'), $imageName);
                $uploadTest->file = $imageName;
            }
            $uploadTest->save();
            return redirect('/test/upload/view/')->with('success', 'Test Uploaded Successfully');
        }catch(Exception $e){
            return redirect('/test/upload/view/')->with('error', 'Test Not Uploaded.Please Try again.');
        }
    }

    public function test_sheet($id){
        $assignTest = AssignedTest::where('id','=',$id)->first();
        return view('examinee.test_screen',compact('assignTest'));
    }

    public function examinee_result_store(Request $request){
        $assignTest = AssignedTest::find($request->post('assign_id'));
        $assignTest->answer = $request->post('opt');
        if($assignTest->save()){
            return redirect('/examinee/result/thanku');
        }else{
            return redirect('/examinee/result/thanku');
        }
    }

    public function thankyou(){
        return view('ieltsTest.thanku');
    }

    public function answer_sheet($id){
        $assignTest = AssignedTest::where('id','=',$id)->first();
        $aa = json_decode($assignTest->answer);
        $total_attempt_qstn = count((array)$aa);
        return view('examinee.answer_sheet',compact('assignTest','total_attempt_qstn'));
    }

    public function assign_test_answer($id){
        $test_data = IeltsTest::where('id',$id)->first();
        $answer    = (array)json_decode($test_data->answer);
        return view('ieltsTest.update_answer',compact('id','answer'));
    }

    public function update_test_answer(Request $request){
        try{
            $ieltTest = IeltsTest::find($request->post('test_id'));
            $ieltTest->answer = $request->post('answer');
            $ieltTest->save();
            return redirect('/ielts/test/list')->with('success', 'Answer Updated Successfully');
        }catch(Exception $e){
            return redirect('/ielts/test/list')->with('error', 'Answer Not Updated.PLease Try Again');
        }
    }

}
