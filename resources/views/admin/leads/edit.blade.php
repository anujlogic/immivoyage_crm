@extends("layouts.app")
@section("content")
<div class="content-wrapper">
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Call Leads</h1>
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
				<h3 class="card-title">Edit New Lead</h3>
				</div>
				<form role="form" method="post" action="{{ route('call.update') }}" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
			  			<div class="form-group col-md-6">
			                <label>Leads Category</label>
		                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="lead_category" id="lead_category">
			                    <option selected="selected" disabled>Select...</option>
			                    <option value="facebook" {{ $call_lead->lead_category == 'facebook' ? 'selected' : '' }}>Facebook</option>
			                    <option value="instagram" {{ $call_lead->lead_category == 'instagram' ? 'selected' : '' }} >Instagram</option>
			                    <option value="just_dial" {{ $call_lead->lead_category == 'just_dial' ? 'selected' : '' }}>Just Dial</option>
			                    <option value="others" {{ $call_lead->lead_category == 'others' ? 'selected' : '' }}>Others</option>
		                    </select>
                  		</div>
					  	<div class="form-group">
					    	<label for="exampleInputName">Name</label>
					    	<input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Enter name" value="{{ $call_lead->name }}">
					    	<input type="hidden" name="id" value="{{ $call_lead->id }}">
					  	</div>
					  	<div class="form-group">
					    	<label for="exampleInputContact">Mobile No</label>
					    	<input type="number" class="form-control" id="exampleInputContact" name="mobile_no" placeholder="Enter mobile no" value="{{ $call_lead->contact_no }}">
					  	</div>
					  	<div class="form-group">
					    	<label for="exampleInputAge">Age</label>
					    	<input type="number" class="form-control" id="exampleInputAge" name="age"  placeholder="Enter age" value="{{ $call_lead->age }}">
					  	</div>
					  	<div class="form-group">
					    	<label for="exampleInputEmail1">Email address</label>
					    	<input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" value="{{ $call_lead->email }}">
					    </div>
					    <div class="row">
		                    <div class="form-group col-md-6">
								<label>Qualification</label>
								<select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="qualification">
								<option selected="selected" disabled>Select...</option>
								<option value="plus tow" {{ $call_lead->qualification =='plus tow' ? 'selected' : '' }}>Plus Two</option>
								<option value="diploma" {{ $call_lead->qualification =='diploma' ? 'selected' : '' }}>Diploma</option>
								<option value="graduation" {{ $call_lead->qualification =='graduation' ? 'selected' : '' }}>Graduation</option>
								<option value="masters" {{ $call_lead->qualification =='masters' ? 'selected' : '' }}>Masters</option>
								<option value="others" {{ $call_lead->qualification =='others' ? 'selected' : '' }}>Others</option>
								</select>
		                  	</div>
                  		</div>
					    <div class="form-group">
					    	<label for="exampleInputAddress">Address</label>
					    	<input type="text" class="form-control" id="exampleInputAddress" name="address" placeholder="Enter address" value="{{ $call_lead->address }}">
					    </div>
					    <div class="form-group col-md-6">
			                <label>Call Purpose</label>
		                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="call_purpose" id="call_purpose">
			                    <option selected="selected" disabled>Select...</option>
			                    <option value="visa" {{ $call_lead->call_purpose == 'visa' ? 'selected' : '' }}>VISA</option>
			                    <option value="ielts" {{ $call_lead->call_purpose == 'ielts' ? 'selected' : '' }}>IELTS</option>
		                    </select>
	                  	</div>
                  	@if($call_lead->call_purpose == 'visa')
	                  	<div class="row" id="visa">
	                  		<div class="form-group col-md-12" id="visa_category">
			                	<label>Visa Category</label>
			                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="visa_category">
				                    <option selected="selected" disabled>Select...</option>
				                    <option value="study" {{ $call_lead->visa_category == 'study' ? 'selected' : '' }}>Study</option>
				                    <option value="work_permit" {{ $call_lead->visa_category == 'work_permit' ? 'selected' : '' }}>Work Permit</option>
				                    <option value="pr" {{ $call_lead->visa_category == 'pr' ? 'selected' : '' }}>Permanent Residence</option>
				                    <option value="investment" {{ $call_lead->visa_category == 'investment' ? 'selected' : '' }}>Investment</option>
				                    <option value="tourist" {{ $call_lead->visa_category == 'tourist' ? 'selected' : '' }}>Tourist</option>
			                    </select>
	                  		</div>
	                  		<div class="form-group col-md-12" id="score">
						    	<label for="exampleInputScore">IELTS Score</label>
						    	<input type="number" class="form-control" id="exampleInputScore" name="ielts_score" placeholder="Enter Score" value="{{ $call_lead->ielts_score }}">
					    	</div>
		                    <div class="form-group col-md-3" id="listen">
		                    	<label for="exampleInputEnglish">Listen</label>
		                    	<input type="text" class="form-control" name="listen_score" placeholder="Enter score" value="{{ $call_lead->listen }}">
		                  	</div>
		                  	<div class="form-group col-md-3" id="write">
		                    	<label for="exampleInputEnglish">Write</label>
		                    	<input type="text" class="form-control" name="write_score" placeholder="Enter score" value="{{ $call_lead->wirte }}">
		                  	</div>
		                  	<div class="form-group col-md-3" id="read">
		                    	<label for="exampleInputEnglish">Read</label>
		                    	<input type="text" class="form-control" name="read_score" placeholder="Enter score" value="{{ $call_lead->read }}">
		                  	</div>
		                  	<div class="form-group col-md-3" id="speak">
		                    	<label for="exampleInputEnglish">Speak</label>
		                    	<input type="text" class="form-control" name="speak_score" placeholder="Enter score" value="{{ $call_lead->speak }}">
		                  	</div>
		                  	<div class="form-group col-md-12" id="desire_country">
			                	<label>Desire Country</label>
			                    <select class="form-control select2  desire_country" data-dropdown-css-class="select2-danger" style="width: 100%;" name="desire_country">
				                    <option selected="selected" disabled>Select...</option>
				                    <option value="usa" {{ $call_lead->country == 'usa' ? 'selected' : '' }}>United States</option>
				                    <option value="ca" {{ $call_lead->country == 'ca' ? 'selected' : '' }}>Canada</option>
				                    <option value="uk" {{ $call_lead->country == 'uk' ? 'selected' : '' }}>United Kingdom</option>
				                    <option value="aussie" {{ $call_lead->country == 'aussie' ? 'selected' : '' }}>Australia</option>
				                    <option value="nz" {{ $call_lead->country == 'nz' ? 'selected' : '' }}>New Zealand</option>
			                    </select>
	              			</div>
	              		</div>
              		@endif
              		@if($call_lead->call_purpose == 'ielts')
	              		<div class="row" id="ielts">
	              			<div class="form-group col-md-12" id="ieltsScore">
						    	<label for="exampleInputScore">IELTS Score</label>
						    	<input type="number" class="form-control" id="exampleInputScore" name="ieltsScore" placeholder="Enter Score" value="{{ $call_lead->ielts_score }}">
					    	</div>
		                    <div class="form-group col-md-3" id="ieltsListen">
		                    	<label for="exampleInputEnglish">Listen</label>
		                    	<input type="text" class="form-control" name="ieltsListen" placeholder="Enter score" value="{{ $call_lead->listen }}">
		                  	</div>
		                  	<div class="form-group col-md-3" id="ieltsWrite">
		                    	<label for="exampleInputEnglish">Write</label>
		                    	<input type="text" class="form-control" name="ieltsWrite" placeholder="Enter score" value="{{ $call_lead->wirte }}">
		                  	</div>
		                  	<div class="form-group col-md-3" id="ieltsRead">
		                    	<label for="exampleInputEnglish">Read</label>
		                    	<input type="text" class="form-control" name="ieltsRead" placeholder="Enter score" value="{{ $call_lead->read }}">
		                  	</div>
		                  	<div class="form-group col-md-3" id="ieltsSpeak">
		                    	<label for="exampleInputEnglish">Speak</label>
		                    	<input type="text" class="form-control" name="ieltsSpeak" placeholder="Enter score" value="{{ $call_lead->speak }}">
		                  	</div>
		                  	<div class="form-group col-md-12" id="ieltsBand">
						    	<label for="exampleInputScore">Required Band</label>
						    	<input type="number" class="form-control" id="exampleInputScore" name="ieltsBand" placeholder="Enter Score" value="{{ $call_lead->require_band }}">
					    	</div>
					    	<div class="form-group col-md-6" id="ielts_test">
				                <label>Required Test</label>
			                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="ielts_test" id="ielts">
				                    <option selected="selected" disabled>Select...</option>
				                    <option value="GT" {{ $call_lead->required_test == 'GT' ? 'selected' : '' }}>GT</option>
				                    <option value="academic" {{ $call_lead->required_test == 'academic' ? 'selected' : '' }}>Academic</option>
			                    </select>
	                  		</div>
	              		</div>
              		@endif
              		<div class="form-group col-md-6" id="call_manage_by">
		                <label>Call Manage By</label>
	                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="call_manage_by" id="call_manage_by">
		                    <option selected="selected" disabled>Select...</option>
		                    @foreach($manager as $key=>$val)
		                    <option value="{{ $val->id }}" {{ $call_lead->manage_by == $val->id ? 'selected' : '' }}>{{ $val->name }}</option>
		                    @endforeach
	                    </select>
                  	</div>
                  	<div class="form-group col-md-6" id="feed_back">
                        <label>Feed Back</label>
                        <textarea class="form-control" name="feed_back" rows="3" placeholder="Enter ...">{{ $call_lead->feed_back }}</textarea>
                    </div>
                    <div class="form-group col-md-6" > 
	                    <label>Follow Up</label>
	                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest" id="follow_up">
	                        <input type="text" name="follow_up" class="form-control datetimepicker-input" data-target="#reservationdatetime" value="{{ $call_lead->follow_up }}">
	                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
	                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
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
	    $("#call_purpose").on('change', function(){
	    	alert('hello visa');
		if(this.value == 'visa'){
		$("#visa").show();
		$("#ielts").hide();
		$('.desire_country').attr('required', 'required');
		$("#visa_category input, #score input, #listen input, #write input, #read input, #speak input,#call_manage_by input").prop("required", true);
		$("#ieltsScore input, #ieltsListen input, #ieltsWrite input, #ieltsSpeak input, #ieltsRead input, #ieltsBand input,#ielts select").prop("required", false);
		}else{
			alert('hello ielts');
			$("#ielts").show();
			$("#visa").hide();
			$("#ieltsScore input, #ieltsListen input, #ieltsWrite input, #ieltsSpeak input, #ieltsRead input, #ieltsBand input,#ielts select").prop("required", true);
			$("#visa_category input, #score input, #listen input, #write input, #read input, #speak input, #desire_country input,#call_manage_by input , #follow_up input").prop("required", false);
		}
	    });
	});
</script>