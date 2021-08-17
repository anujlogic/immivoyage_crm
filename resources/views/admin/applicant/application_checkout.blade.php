@extends("layouts.app")
@section("content")
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="content-wrapper">
	<h2>Collapse</h2>
  <p><strong>Note:</strong>The <strong>data-parent</strong> attribute makes sure that all collapsible elements under the specified parent will be closed when one of the collapsible item is shown.</p>
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a href="#collapse1" data-toggle="collapse" data-parent="#accordion">Step 2: Register your Student Details <i class="fa fa-caret-down"></i></a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
    <section class="content" style="margin-top: 15px;">
	    <div class="container-fluid">
	        <div class="row">
	        <div class="col-md-8 offset-md-2">
	            <div class="card card-primary">
					<form name="register-form">
					<div class="card-body required">
						<div id="message" style="color:red; font-size: 20px; text-align: center"></div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label">Student Passport No.</label>
							<div class="col-sm-9">
							  <input type="text" id="passport_no" class="form-control" id="inputEmail3" placeholder="Passport no." required>
							  <input type="hidden" id="application_id" class="form-control" id="inputEmail3" placeholder="Passport no." value="{{ $id }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputFname" class="col-sm-3 col-form-label">Student First Name</label>
							<div class="col-sm-9">
							  <input type="text" id="first_name" class="form-control" id="inputFname" placeholder="First name">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputLname" class="col-sm-3 col-form-label">Student Last Name</label>
							<div class="col-sm-9">
							  <input type="text" id="last_name" class="form-control" id="inputLname" placeholder="Last Name">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputLname" class="col-sm-3 col-form-label">Enter Student E-Mail ID</label>
							<div class="col-sm-9">
							  <input type="email" id="email" class="form-control" placeholder="Enter E-mail ID">
							</div>
						</div>
					  	<div class="form-group row">
						    <label for="inputCno" class="col-sm-3 col-form-label">Enter Student Phone No</label>
						    <div class="col-sm-9">
						      <input type="number" id="phone_no" class="form-control" placeholder="Enter student phone no">
						    </div>
					  	</div>
					  	<div class="form-group row"> 
			                <label for="inputLname" class="col-sm-3 col-form-label">Date of Birth</label>
						    <div class="col-sm-9">
			                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest" id="follow_up">
			                        <input type="text" name="follow_up" class="form-control datetimepicker-input" data-target="#reservationdatetime" id="dob">
			                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
			                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
			                        </div>
			                    </div>
		                    </div>
						</div>
						<div class="form-group row">
						    <label for="inputCno" class="col-sm-3 col-form-label">Counsellor Contact No.</label>
						    <div class="col-sm-9">
						      <input type="number" id="counseller_phone_no" class="form-control" placeholder="Enter student phone no">
						    </div>
					  	</div>
					  	<div class="form-group row">
							<label for="inputLname" class="col-sm-3 col-form-label">Counsellor E-Mail ID</label>
							<div class="col-sm-9">
							  <input type="email" id="counsellor_email" class="form-control" placeholder="Enter E-mail ID">
							</div>
						</div>
						<div class="pull-right reg-form">
					       <button type="button" onclick="saveAjaxSetting();" class="btn btn-primary btn-submit">Continue</button>
					    </div>
					</form>
	            </div>
	        </div>
	    </div>
		</div>
	</section>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Collapsible Group 2 <i class="fa fa-caret-down"></i></a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Collapsible Group 3
          	<i class="fa fa-caret-down"></i>
          </a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
  </div>
</div>	
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script type="text/javascript">
   	function saveAjaxSetting(data){
   		var id 					= $('#application_id').val();
   		var passport_no 		= $('#passport_no').val();
		var first_name  		= $('#first_name').val();
		var last_name   		= $('#last_name').val();
		var email   			= $('#email').val();
		var phone_no    		= $('#phone_no').val();
		var dob    				= $('#dob').val();
		var counseller_phone_no = $('#counseller_phone_no').val();
		var counsellor_email 	= $('#counsellor_email').val();

		if(passport_no == "" || first_name=="" || last_name=="" || email=="" || phone_no=="" || dob=="" || counseller_phone_no=="" || counsellor_email==""){
   			$("#message").html("Please Fill All Required Input Fields.!!");
   		}else{
   			$.ajax({
			    type: 'POST',
			    url: "{{ route('student_detail.update') }}",
			    dataType: 'json',
			    data:{
				    "_token": "{{ csrf_token() }}",
				    id:id,
				    passport_no:passport_no,
				    first_name:first_name,
				    last_name:last_name,
				    email:email,
				    phone_no:phone_no,
				    dob:dob,
				    counseller_phone_no:counseller_phone_no,
				    counsellor_email:counsellor_email,
			  	},
			    error: function (err) {
			        console.log(err);
			    },
			    success: function (data) {
			        console.log(data);
			    },
			});
   		}  
	}
</script>
<script type="text/javascript">
	$( document ).ready(function() {
		setTimeout(function() {
	    	$('#message').fadeOut('slow');
		}, 9000);
	}); 
</script>

