@extends("layouts.app")
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Client</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ URL::previous() }}"><button type="button" class="btn btn-block btn-primary btn-sm"> <i class="fas fa-arrow-left"></i> Back</button></a></li>
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
					@if($message = Session::get('success'))
					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button>	
					    <strong>{{ $message }}</strong>
					</div>
					@endif
              <div class="card-header">
                <h3 class="card-title">Edit Client</h3>
              </div>
              <form role="form" method="post" action="{{ url('client/update') }}" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">
                  	<div class="form-group">
                    	<label for="exampleInputFname">First Name</label>
                    	<input type="text" class="form-control" id="exampleInputFname" name="fname" placeholder="Enter first name" value={{ $client->first_name }}>
                    	<input type="hidden" name="client_id" value="{{ $client->id }}">
                    	<input type="hidden" name="account_id" value="{{ $client->account_id }}">
                  	</div>
                  	<div class="form-group">
                    	<label for="exampleInputLname">Last Name</label>
                    	<input type="text" class="form-control" id="exampleInputLname" name="lname" placeholder="Enter last name" value="{{ $client->last_name }}">
                  	</div>
                  	<div class="form-group">
                    	<label for="exampleInputNominee">Father/Husband Name</label>
                    	<input type="text" class="form-control" id="exampleInputNominee" name="nominee" placeholder="Enter name" value="{{ $client->father_husband }}">
                  	</div>
                  	<div class="form-group">
                    	<label for="exampleInputEmail1">Email address</label>
                    	<input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" value="{{ $client->email }}">
                    </div>
                    <div class="form-group">
	                    <label for="exampleInputEmail1">Mobile_no</label>
	                    <input type="number" class="form-control" id="exampleInputEmail1" name="mobile_no" placeholder="Enter mobile no" value="{{ $client->client_account->mobile_no }}">
	                </div>
                    <div class="form-group">
                    	<label for="exampleInputAddress">Address</label>
                    	<input type="text" class="form-control" id="exampleInputAddress" name="address" placeholder="Enter address" value="{{ $client->address }}">
                    </div>
                 	<div class="form-group">
                    	<label for="exampleInputAge">Age</label>
                    	<input type="number" class="form-control" id="exampleInputAge" name="age"  placeholder="Enter age" value="{{ $client->age }}">
                  	</div>
                  	<div class="form-group">
                 	<label for="exampleInputCitizenship">Citizenship</label>
	                <div class="form-group clearfix">
		                <div class="icheck-success d-inline">
	                        <input type="radio" name="citizenship" value="india" id="radioDanger1" {{ ($client->citizenship=="india")? "checked" : "" }}>
	                        <label for="radioDanger1" class="radioDanger1">India</label>
	                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	            
	                    <div class="icheck-success d-inline">
                        	<input type="radio" name="citizenship" value="foriegn" id="radioDanger2" {{ ($client->citizenship=="foriegn")? "checked" : "" }}>
                        	<label for="radioDanger2" class="radioDanger2">Out of India</label>
                      	</div>
                    </div> 
                    </div>
                    <div class="form-group">
                    	<label for="exampleInputVisitPurpose">Visit Purpose</label>
	                    <div class="form-group clearfix">
	                      <div class="icheck-success d-inline">
	                        <input type="radio" name="visit_purpose" value="spoken" id="radioSuccess1" {{ ($client->visit_purpose=="spoken")? "checked" : "" }}>
	                        <label for="radioSuccess1">Spoken English</label>
	                      </div>&nbsp;&nbsp;&nbsp;
	                      @if($client->visit_purpose=="ielts")
		                      <div class="icheck-success d-inline">
		                        <input type="radio" name="visit_purpose" value="ielts" id="radioSuccess2" {{ ($client->visit_purpose=="ielts")? "checked" : "" }}>
		                        <label for="radioSuccess2">Ielts</label>
		                      </div>
	                      @endif
	                    </div> 
                    </div>
                    @if($client->visit_purpose=="ielts")
                    <div class="form-group">
                    	<label for="exampleInputAge">Desire Country</label>
	                     	<div class="form-group clearfix">
	                     		<div class="d-inline">
	                        	<input type="radio" name="country" value="usa" {{ ($client->desire_country=="usa")? "checked" : "" }}>
	                        	<label for="radioSuccess1">United State</label>
	                    	</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                      	<div class="d-inline">
	                        	<input type="radio" name="country" value="canada" {{ ($client->desire_country=="canada")? "checked" : "" }}>
	                        	<label for="radioSuccess2">Canada</label>
	                      	</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                      <div class="d-inline">
	                        <input type="radio" name="country" value="australia" {{ ($client->desire_country=="australia")? "checked" : "" }}>
	                        <label for="radioSuccess2">Australia</label>
	                      </div>&nbsp;&nbsp;&nbsp;
	                      <div class="d-inline">&nbsp;&nbsp;&nbsp;
	                        <input type="radio" name="country" value="uk" {{ ($client->desire_country=="uk")? "checked" : "" }}>
	                        <label for="radioSuccess2">United Kingdom</label>
	                      </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                      <div class="d-inline">
	                        <input type="radio" name="country" value="nz" {{ ($client->desire_country=="nz")? "checked" : "" }}>
	                        <label for="radioSuccess2">New Zealand</label>
	                      </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                      <div class="d-inline">
	                        <input type="radio" name="country" value="europe" {{ ($client->desire_country=="europe")? "checked" : "" }}>
	                        <label for="radioSuccess2">Europe</label>
	                      </div>
	                      </div>
                    </div>
                    <div class="form-group">
                    	<label for="exampleInputAge">Travel Purpose</label>
	                     	<div class="form-group clearfix">
	                     		<div class="d-inline">
	                        	<input type="radio" name="travel_reason" value="study" {{ ($client->travel_purpose=="study")? "checked" : "" }}>
	                        	<label for="radioSuccess1">Study Permit</label>
	                    	</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                      	<div class="d-inline">
	                        	<input type="radio" name="travel_reason" value="tourist" {{ ($client->travel_purpose=="tourist")? "checked" : "" }}>
	                        	<label for="radioSuccess2">Tourist Visa</label>
	                      	</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                      <div class="d-inline">
	                        <input type="radio" name="travel_reason" value="permanent" {{ ($client->travel_purpose=="permanent")? "checked" : "" }}>
	                        <label for="radioSuccess2">Permanent Residency</label>
	                      </div>&nbsp;&nbsp;&nbsp;
	                      <div class="d-inline">&nbsp;&nbsp;&nbsp;
	                        <input type="radio" name="travel_reason" value="business" {{ ($client->travel_purpose=="business")? "checked" : "" }}>
	                        <label for="radioSuccess2">Business Visa</label>
	                      </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                      </div>
                    </div>
                    <div class="row">
	                    <div class="form-group col-md-3">
	                    	<label for="exampleInputEnglish">Listening</label>
	                    	<input type="text" class="form-control" id="exampleInputEnglish" name="listen_score" placeholder="Enter score" value="{{ ($client->listen_score) }}">
	                  	</div>
	                  	<div class="form-group col-md-3">
	                    	<label for="exampleInputEnglish">Writing</label>
	                    	<input type="text" class="form-control" id="exampleInputEnglish" name="write_score" placeholder="Enter score" value="{{ ($client->write_score) }}">
	                  	</div>
	                  	<div class="form-group col-md-3">
	                    	<label for="exampleInputEnglish">Reading</label>
	                    	<input type="text" class="form-control" id="exampleInputEnglish" name="read_score" placeholder="Enter score" value="{{ ($client->read_score) }}">
	                  	</div>
	                  	<div class="form-group col-md-3">
	                    	<label for="exampleInputEnglish">Speaking</label>
	                    	<input type="text" class="form-control" id="exampleInputEnglish" name="speak_score" placeholder="Enter score" value="{{ ($client->speak_score) }}">
	                  	</div>
                  	</div>
                  	<div class="row">
	                    <div class="form-group col-md-6">
							<label>Qualification</label>
							<select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="qualification">
							<option selected="selected" disabled>Select...</option>
							<option value="plus tow" {{ $client->qualification =='plus tow' ? 'selected' : '' }}>Plus Two</option>
							<option value="diploma" {{ $client->qualification =='diploma' ? 'selected' : '' }}>Diploma</option>
							<option value="graduation" {{ $client->qualification =='graduation' ? 'selected' : '' }}>Graduation</option>
							<option value="masters" {{ $client->qualification =='masters' ? 'selected' : '' }}>Masters</option>
							<option value="others" {{ $client->qualification =='others' ? 'selected' : '' }}>Others</option>
							</select>
	                  	</div>
                  	</div>
                  	<div class="row">
	                    <div class="form-group col-md-6">
			                  <label>Any Work Experience ?</label>
			                  <input type="text" class="form-control" id="exampleInputwork" name="wrok_exp" placeholder="Enter yes or no" value="{{ ($client->work_experience) }}">
	                  	</div>
                  	</div>
                  	<div class="row">
	                    <div class="form-group col-md-6">
			                  <label>Any Visa refusal ?</label>
			                  <input type="text" class="form-control" id="AppliedBefore" name="applied_before" placeholder="Enter yes or no" value="{{ ($client->visa_applied_before) }}">
	                  	</div>
                  	</div>
                  	<div class="row">
	                    <div class="form-group col-md-4">

	                    <label for="exampleInputFile">Image (Passport Size)
	                    	@if(!empty($client->client_image->passport_size_img))<img src="{{ URL::asset('public/image/clients/')}}/{{ $client->client_image->passport_size_img }}" alt="Passport Size Image" width="50" height="50" style="border-radius: 25px;">@else
	                    <img src="{{ URL::asset('public/image/no_doc.png')}}" alt="Passport Size Image" width="70" height="70" style="border-radius: 25px;">
	                     @endif</label>
	                    <div class="input-group">
	                        <div class="custom-file">
	                        	<input type="file" class="custom-file-input" name="passport_size_img" id="exampleInputFile">
	                        	<label class="custom-file-label" for="exampleInputFile"></label>
	                        </div>
	                    </div>
	                   </div>
	                   <div class="form-group col-md-4">
	                    <label for="exampleInputFile">Passport (Front Photo)
	                    @if(!empty($client->client_image->passport_front_img))<img src="{{ URL::asset('public/image/clients/')}}/{{ $client->client_image->passport_front_img }}" alt="Passport Size Image" width="50" height="50" style="border-radius: 25px;">@else
	                    <img src="{{ URL::asset('public/image/no_doc.png')}}" alt="Passport Size Image" width="70" height="70" style="border-radius: 25px;">
	                     @endif</label>
	                    <div class="input-group">
	                        <div class="custom-file">
	                        	<input type="file" class="custom-file-input" name="passport_front_img" id="exampleInputFile">
	                        	<label class="custom-file-label" for="exampleInputFile"></label>
	                        </div>
	                    </div>
	                   </div>
	                   <div class="form-group col-md-4">
	                    <label for="exampleInputFile">Passport (Back Photo)
	                    	@if(!empty($client->client_image->passport_back_img))<img src="{{ URL::asset('public/image/clients/')}}/{{ $client->client_image->passport_back_img }}" alt="Passport Size Image" width="50" height="50" style="border-radius: 25px;">@else
	                    <img src="{{ URL::asset('public/image/no_doc.png')}}" alt="Passport Size Image" width="70" height="70" style="border-radius: 25px;">
	                     @endif</label>
	                    <div class="input-group">
	                        <div class="custom-file">
	                        	<input type="file" class="custom-file-input" name="passport_back_img" id="exampleInputFile">
	                        	<label class="custom-file-label" for="exampleInputFile"></label>
	                        </div>
	                    </div>
	                   </div>
                  	</div>
                  	<div class="row">
                  		<div class="form-group col-md-4">
	                    <label for="exampleInputFileMatric">Matriculation (Photo Copy)
	                    	@if(!empty($client->client_image->matric_img))<img src="{{ URL::asset('public/image/clients/')}}/{{ $client->client_image->matric_img }}" alt="Passport Size Image" width="50" height="50" style="border-radius: 25px;">@else
	                    <img src="{{ URL::asset('public/image/no_doc.png')}}" alt="Passport Size Image" width="70" height="70" style="border-radius: 25px;">
	                     @endif</label>
	                    <div class="input-group">
	                        <div class="custom-file">
	                        	<input type="file" class="custom-file-input" name="matric_img" id="exampleInputFileMatric">
	                        	<label class="custom-file-label" for="exampleInputFileMatric"></label>
	                        </div>
	                    </div>
	                   </div>
	                   <div class="form-group col-md-4">
	                    <label for="exampleInputFilePlusTwo">Plus Two (Photo Copy)
	                    @if(!empty($client->client_image->plus_two_img))<img src="{{ URL::asset('public/image/clients/')}}/{{ $client->client_image->plus_two_img }}" alt="Passport Size Image" width="50" height="50" style="border-radius: 25px;">@else
	                    <img src="{{ URL::asset('public/image/no_doc.png')}}" alt="Passport Size Image" width="70" height="70" style="border-radius: 25px;">
	                     @endif</label>
	                    <div class="input-group">
	                        <div class="custom-file">
	                        	<input type="file" class="custom-file-input" name="plus_two_img" id="exampleInputFilePlusTwo">
	                        	<label class="custom-file-label" for="exampleInputFilePlusTwo"></label>
	                        </div>
	                    </div>
	                   </div>
	                   <div class="form-group col-md-4">
	                    <label for="exampleInputFileGraduation">Graduation (Photo Copy)
	                    @if(!empty($client->client_image->graduation_img))<img src="{{ URL::asset('public/image/clients/')}}/{{ $client->client_image->graduation_img }}" alt="Passport Size Image" width="50" height="50" style="border-radius: 25px;">@else
	                    <img src="{{ URL::asset('public/image/no_doc.png')}}" alt="Passport Size Image" width="70" height="70" style="border-radius: 25px;">
	                     @endif</label>
	                    <div class="input-group">
	                        <div class="custom-file">
	                        	<input type="file" class="custom-file-input" name="graduation_img" id="exampleInputFileGraduation">
	                        	<label class="custom-file-label" for="exampleInputFileGraduation"></label>
	                        </div>
	                    </div>
	                   </div>
	               </div>
                  	<div class="row">
                  		<div class="form-group col-md-4">
		                    <label for="exampleInputFileMasters">Masters (Photo Copy)
		                    @if(!empty($client->client_image->masters_img))<img src="{{ URL::asset('public/image/clients/')}}/{{ $client->client_image->masters_img }}" alt="Passport Size Image" width="50" height="50" style="border-radius: 25px;">@else
	                    <img src="{{ URL::asset('public/image/no_doc.png')}}" alt="Passport Size Image" width="70" height="70" style="border-radius: 25px;">
	                     @endif</label>
		                    <div class="input-group">
		                        <div class="custom-file">
		                        	<input type="file" class="custom-file-input" name="masters_img" id="exampleInputFileMasters">
		                        	<label class="custom-file-label" for="exampleInputFileMasters"></label>
		                        </div>
		                    </div>
	                   </div>
                  		<div class="form-group col-md-4">
	                    <label for="exampleInputFileIelts">IELTS (Photo Copy)
	                    	@if(!empty($client->client_image->ielts_img))<img src="{{ URL::asset('public/image/clients/')}}/{{ $client->client_image->ielts_img }}" alt="Passport Size Image" width="50" height="50" style="border-radius: 25px;">@else
	                    <img src="{{ URL::asset('public/image/no_doc.png')}}" alt="Passport Size Image" width="70" height="70" style="border-radius: 25px;">
	                     @endif</label>
	                    <div class="input-group">
	                        <div class="custom-file">
	                        	<input type="file" class="custom-file-input" name="ielts_img" id="exampleInputFileIelts">
	                        	<label class="custom-file-label" for="exampleInputFileIelts"></label>
	                        </div>
	                    </div>
	                   </div>
	                   <div class="form-group col-md-4">
	                    <label for="exampleInputIdProof">ID Proof (Photo Copy)
	                    	@if(!empty($client->client_image->id_proof_img))<img src="{{ URL::asset('public/image/clients/')}}/{{ $client->client_image->id_proof_img }}" alt="Passport Size Image" width="50" height="50" style="border-radius: 25px;">@else
	                    <img src="{{ URL::asset('public/image/no_doc.png')}}" alt="Passport Size Image" width="70" height="70" style="border-radius: 25px;">
	                     @endif</label>
	                    <div class="input-group">
	                        <div class="custom-file">
	                        	<input type="file" class="custom-file-input" name="id_proof_img" id="exampleInputIdProof">
	                        	<label class="custom-file-label" for="exampleInputIdProof">as</label>
	                        </div>
	                    </div>
	                   </div>
                  	</div>
                  	@if(!empty($client->client_image->other_images))
                  	<div class="row">
                  		<div class="form-group col-md-6">
	                    <label for="exampleInputFileOthers">Other Documents
	                    <?php $images = json_decode($client->client_image->other_images);?>
	                    @if($images)
		                    @foreach(json_decode($client->client_image->other_images) as $key=>$val)
		                      <img src="{{ URL::asset('public/image/clients/')}}/{{ $val }}" alt="Passport Size Image" width="50" height="50" style="border-radius: 25px; margin-bottom: 7px;">
		                    @endforeach
	                	@endif
	                	</label>
	                    <div class="input-group">
	                        <div class="custom-file">
	                        	<input type="file" class="custom-file-input" name="others_img[]" id="exampleInputFileOthers" multiple>
	                        	<label class="custom-file-label" for="exampleInputFileMasters"></label>
	                        </div>
	                    </div>
	                   </div>
	                </div>
	                @endif
	                @endif
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('public/asset/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>