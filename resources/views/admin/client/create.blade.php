@extends("layouts.app")
@section("content")
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Client</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ URL::previous() }}"><button type="button" class="btn btn-block btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</button></a></li>
              </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card card-primary">  
					@if($errors->any())
  					<div class="alert alert-danger">
    					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     					@foreach ($errors->all() as $error)
				            <li>{{ $error }}</li>
				        @endforeach
  					</div>
					@endif
              <div class="card-header">
                <h3 class="card-title">Create New Client</h3>
              </div>
              <form role="form" method="post" action="{{ url('store') }}" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">
                  	<div class="form-group"  id="first_name">
                    	<label for="exampleInputFname">First Name</label>
                    	<input type="text" class="form-control" id="exampleInputFname" name="fname" placeholder="Enter first name">
                  	</div>
                  	<div class="form-group">
                    	<label for="exampleInputLname">Last Name</label>
                    	<input type="text" class="form-control" id="exampleInputLname" name="lname" placeholder="Enter last name">
                  	</div>
                  	<div class="form-group">
                    	<label for="exampleInputNominee">Father/Husband Name</label>
                    	<input type="text" class="form-control" id="exampleInputNominee" name="nominee" placeholder="Enter name">
                  	</div>
                  	<div class="form-group">
                    	<label for="exampleInputEmail1">Email address</label>
                    	<input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                    	<label for="exampleInputEmail1">Password</label>
                    	<input type="password" class="form-control" id="exampleInputEmail1" name="password" placeholder="Generate password">
                    </div>
                    <div class="form-group">
	                    <label for="exampleInputEmail1">Cofirm Password</label>
	                    <input type="password" class="form-control" id="exampleInputEmail1" name="password_confirmation" placeholder="Confirm password">
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Mobile_no</label>
	                    <input type="number" class="form-control" id="exampleInputEmail1" name="mobile_no" placeholder="Enter mobile no">
	                </div>
                    <div class="form-group">
                    	<label for="exampleInputAddress">Address</label>
                    	<input type="text" class="form-control" id="exampleInputAddress" name="address" placeholder="Enter address">
                    </div>
                 	<div class="form-group">
                    	<label for="exampleInputAge">Age</label>
                    	<input type="number" class="form-control" id="exampleInputAge" name="age"  placeholder="Enter age">
                  	</div>
                  	<div class="form-group">
                 	<label for="exampleInputCitizenship">Citizenship</label>
	                <div class="form-group clearfix">
		                <div class="icheck-success d-inline">
	                        <input type="radio" name="citizenship" value="india" id="radioDanger1"  >
	                        <label for="radioDanger1" class="radioDanger1">India</label>
	                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	            
	                    <div class="icheck-success d-inline">
                        	<input type="radio" name="citizenship" value="foriegn" id="radioDanger2">
                        	<label for="radioDanger2" class="radioDanger2">Out of India</label>
                      </div>
                    </div> 
                    </div>
                    <div class="form-group">
                    	<label for="exampleInputVisitPurpose">Visit Purpose</label>
	                    <div class="form-group clearfix">
	                      <div class="icheck-success d-inline">
	                        <input type="radio" name="visit_purpose" value="spoken" id="radioSuccess1"  class="ielts">
	                        <label for="radioSuccess1">Spoken English</label>
	                      </div>&nbsp;&nbsp;&nbsp;
	                      <div class="icheck-success d-inline">
	                        <input type="radio" name="visit_purpose" value="ielts" id="radioSuccess2" class="ielts"> 
	                        <label for="radioSuccess2">Ielts</label>
	                      </div>
	                    </div> 
                    </div>
                    <div id="ielts" style="display: none;">
                    <div class="form-group" id="desire_country">
                    	<label for="exampleInputAge">Desire Country</label>
                     	<div class="form-group clearfix">
                     		<div class="d-inline">
                        		<input type="radio" name="country" value="usa">
                        		<label for="radioSuccess1">United State</label>
	                    	</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                      	<div class="d-inline">
	                        	<input type="radio" name="country" value="canada">
	                        	<label for="radioSuccess2">Canada</label>
	                      	</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                        <div class="d-inline">
	                        <input type="radio" name="country" value="australia">
	                        <label for="radioSuccess2">Australia</label>
	                        </div>&nbsp;&nbsp;&nbsp;
							<div class="d-inline">&nbsp;&nbsp;&nbsp;
								<input type="radio" name="country" value="uk">
								<label for="radioSuccess2">United Kingdom</label>
							</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<div class="d-inline">
								<input type="radio" name="country" value="nz">
								<label for="radioSuccess2">New Zealand</label>
							</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                    <div class="d-inline">
		                        <input type="radio" name="country" value="europe">
		                        <label for="radioSuccess2">Europe</label>
	                        </div>
                        </div>
                    </div>
                    <div class="form-group" id="travel">
                    	<label for="exampleInputAge">Reason Of Travel</label>
	                     	<div class="form-group clearfix">
	                     		<div class="d-inline">
	                        	<input type="radio" name="travel_reason" value="study">
	                        	<label for="radioSuccess1">Study Permit</label>
	                    	</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                      	<div class="d-inline">
	                        	<input type="radio" name="travel_reason" value="tourist">
	                        	<label for="radioSuccess2">Tourist Visa</label>
	                      	</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                      <div class="d-inline">
	                        <input type="radio" name="travel_reason" value="permanent">
	                        <label for="radioSuccess2">Permanent Residency</label>
	                      </div>&nbsp;&nbsp;&nbsp;
	                      <div class="d-inline">&nbsp;&nbsp;&nbsp;
	                        <input type="radio" name="travel_reason" value="business">
	                        <label for="radioSuccess2">Business Visa</label>
	                      </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                      </div>
                    </div>
                    <div class="row">
	                    <div class="form-group col-md-3" id="listen">
	                    	<label for="exampleInputEnglish">Listening</label>
	                    	<input type="text" class="form-control" name="listen_score" placeholder="Enter score">
	                  	</div>
	                  	<div class="form-group col-md-3" id="write">
	                    	<label for="exampleInputEnglish">Writing</label>
	                    	<input type="text" class="form-control" name="write_score" placeholder="Enter score">
	                  	</div>
	                  	<div class="form-group col-md-3" id="read">
	                    	<label for="exampleInputEnglish">Reading</label>
	                    	<input type="text" class="form-control" name="read_score" placeholder="Enter score">
	                  	</div>
	                  	<div class="form-group col-md-3" id="speak">
	                    	<label for="exampleInputEnglish">Speaking</label>
	                    	<input type="text" class="form-control" name="speak_score" placeholder="Enter score">
	                  	</div>
                  	</div>
                  	<div class="row">
	                    <div class="form-group col-md-6">
			                <label>Qualification</label>
		                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="qualification" id="qualification">
			                    <option selected="selected" disabled>Select...</option>
			                    <option value="plus tow">Plus Two</option>
			                    <option value="diploma">Diploma</option>
			                    <option value="graduation">Graduation</option>
			                    <option value="masters">Masters</option>
			                    <option value="others">Others</option>
		                    </select>
	                  	</div>
                  	</div>
                  	<div class="row">
	                    <div class="form-group col-md-6" id="exampleInputwork">
			                <label>Any Work Experience ?</label>
			                <input type="text" class="form-control" name="wrok_exp" placeholder="Enter yes or no">
	                  	</div>
                  	</div>
                  	<div class="row">
	                    <div class="form-group col-md-6" id="AppliedBefore">
			                <label>Any Visa refusal ?</label>
			                <input type="text" class="form-control" name="applied_before" placeholder="Enter yes or no">
	                  	</div>
                  	</div>
                  	<div class="row">
	                    <div class="form-group col-md-4">
	                    <label for="exampleInputFileImg">Image (Passport Size)</label>
	                    <div class="input-group">
	                        <div class="custom-file" id="exampleInputFileImg">
	                        	<input type="file" class="custom-file-input" name="passport_size_img">
	                        	<label class="custom-file-label" for="exampleInputFile"></label>
	                        </div>
	                    </div>
	                   </div>
	                   <div class="form-group col-md-4">
	                    <label for="exampleInputFile">Passport (Front Photo)</label>
	                    <div class="input-group">
	                        <div class="custom-file" id="exampleInputFilePassF">
	                        	<input type="file" class="custom-file-input" name="passport_front_img">
	                        	<label class="custom-file-label" for="exampleInputFile"></label>
	                        </div>
	                    </div>
	                   </div>
	                   <div class="form-group col-md-4">
	                    <label for="exampleInputFile">Passport (Back Photo)</label>
	                    <div class="input-group">
	                        <div class="custom-file" id="exampleInputFilePassB">
	                        	<input type="file" class="custom-file-input" name="passport_back_img">
	                        	<label class="custom-file-label" for="exampleInputFile"></label>
	                        </div>
	                    </div>
	                   </div>
                  	</div>
                  	<div class="row">
                  		<div class="form-group col-md-4">
	                    <label for="exampleInputFileMatric">Matriculation (Photo Copy)</label>
	                    <div class="input-group">
	                        <div class="custom-file" id="exampleInputFileMatric">
	                        	<input type="file" class="custom-file-input" name="matric_img">
	                        	<label class="custom-file-label" for="exampleInputFileMatric"></label>
	                        </div>
	                    </div>
	                   </div>
	                   <div class="form-group col-md-4">
	                    <label for="exampleInputFilePlusTwo">Plus Two (Photo Copy)</label>
	                    <div class="input-group">
	                        <div class="custom-file" id="exampleInputFilePlusTwo">
	                        	<input type="file" class="custom-file-input" name="plus_two_img">
	                        	<label class="custom-file-label" for="exampleInputFilePlusTwo"></label>
	                        </div>
	                    </div>
	                   </div>
	                   <div class="form-group col-md-4">
	                    <label for="exampleInputFileGraduation">Graduation (Photo Copy)</label>
	                    <div class="input-group">
	                        <div class="custom-file" id="exampleInputFileGraduation">
	                        	<input type="file" class="custom-file-input" name="graduation_img">
	                        	<label class="custom-file-label" for="exampleInputFileGraduation"></label>
	                        </div>
	                    </div>
	                   </div>
                  	</div>
                  	<div class="row">
                  		<div class="form-group col-md-4">
	                    <label for="exampleInputFileMasters">Masters (Photo Copy)</label>
	                    <div class="input-group">
	                        <div class="custom-file" id="exampleInputFileMasters">
	                        	<input type="file" class="custom-file-input" name="masters_img">
	                        	<label class="custom-file-label" for="exampleInputFileMasters"></label>
	                        </div>
	                    </div>
	                   </div>
                  		<div class="form-group col-md-4">
	                    <label for="exampleInputFileIelts">IELTS (Photo Copy)</label>
	                    <div class="input-group">
	                        <div class="custom-file" id="exampleInputFileIelts">
	                        	<input type="file" class="custom-file-input" name="ielts_img">
	                        	<label class="custom-file-label" for="exampleInputFileIelts"></label>
	                        </div>
	                    </div>
	                   </div>
	                   <div class="form-group col-md-4">
	                    <label for="exampleInputIdProof">ID Proof (Photo Copy)</label>
	                    <div class="input-group">
	                        <div class="custom-file" id="exampleInputIdProof">
	                        	<input type="file" class="custom-file-input" name="id_proof_img">
	                        	<label class="custom-file-label" for="exampleInputIdProof"></label>
	                        </div>
	                    </div>
	                   </div>
                  	</div>
                  	<div class="row">
                  		<div class="form-group col-md-8">
	                    <label for="exampleInputFileOthers">Other Documents</label>
	                    <div class="input-group">
	                        <div class="custom-file">
	                        	<input type="file" class="custom-file-input" name="others_img[]" id="exampleInputFileOthers" multiple>
	                        	<label class="custom-file-label" for="exampleInputFileMasters"></label>
	                        </div>
	                    </div>
	                   </div>
	                </div>
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
      </div>
      </div>
    </section>
  </div>
@endsection
<script src="{{ asset('public/asset/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('public/asset/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function (){
  bsCustomFileInput.init();
});
</script>
<script type="text/javascript">
	$(document).ready(function(){
	    $(".ielts").on('change', function(){
		if(this.value == 'ielts'){
		$("#ielts").show();
		$("#exampleInputIdProof input, #exampleInputFileIelts input, #exampleInputFileMasters input, #exampleInputFileGraduation input, #exampleInputFilePlusTwo input, #exampleInputFileMatric input, #exampleInputFilePassB input, #exampleInputFilePassF input, #exampleInputFileImg input, #AppliedBefore input, #exampleInputwork input, #qualification input, #listen input, #read input, #write input, #speak input, .travel input, .desire_country input").prop("required", true);
		}else{
			$("#ielts").hide();
			$("#exampleInputIdProof input, #exampleInputFileIelts input, #exampleInputFileMasters input, #exampleInputFileGraduation input, #exampleInputFilePlusTwo input, #exampleInputFileMatric input, #exampleInputFilePassB input, #exampleInputFilePassF input, #exampleInputFileImg input, #AppliedBefore input, #exampleInputwork input, #qualification input, #listen input, #read input, #write input, #speak input, .travel input, .desire_country input").prop("required", false);
		}
	    });
	});
</script>