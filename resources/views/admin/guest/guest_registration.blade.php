<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/png"  sizes="132x132" href="{{ asset('public/asset/image/fav_icon.png') }}">
        <link rel="stylesheet" href="{{ asset ('public/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset ('public/asset/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset('public/asset/plugins/jqvmap/jqvmap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/asset/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    </head>
    <style type="text/css">
    	.logo{
    		text-align: center ! important;
    	}
    </style>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <div id="fb-root"></div>
      <!-- Your Chat plugin code -->
      <div class="fb-customerchat"
        attribution="biz_inbox"
        page_id="107694657733142">
      </div>
<!-- END FACEBOOK CHAT PLUGIN -->
<div class="se-pre-con"></div>
<div class="content-wrappers">
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-12 logo">
      <div class="col-sm-12">
        <img src="https://portal.immivoyage.com/public/asset/image/logo.png" alt="AdminLTE Logo" style="width: 220px; height: 139px;">
      </div>
    </div>
  </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-8 offset-md-2 guest-form">
         	<div class="card card-primary">
          @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }}</strong> <i class="fas fa-thumbs-down"></i>
            </div>
          @endif
				<div class="card-header">
				<h3 class="card-title">Register With Immivoyage</h3>
				</div>
				<form role="form" method="post" action="{{ route('guest.registration') }}" enctype="multipart/form-data">
					@csrf
				<div class="card-body">
				  	<div class="form-group">
				    	<label for="exampleInputName">Name</label>
				    	<input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Enter name">
				  	</div>
				  	<div class="form-group">
				    	<label for="exampleInputContact">Mobile No</label>
				    	<input type="number" class="form-control" id="exampleInputContact" name="mobile_no" placeholder="Enter mobile no">
				  	</div>
				  	<div class="form-group">
				    	<label for="exampleInputAge">Age</label>
				    	<input type="number" class="form-control" id="exampleInputAge" name="age"  placeholder="Enter age">
				  	</div>
				  	<div class="form-group">
				    	<label for="exampleInputEmail1">Email address</label>
				    	<input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
				    </div>
				    <!-- <div class="form-group">
				    	<label for="exampleInputEmail1">Qualification</label>
				    	<input type="text" class="form-control" id="exampleInputEmail1" name="qualification" placeholder="Enter Qualification">
				    </div> -->
				    <div class="form-group">
				    	<label for="exampleInputAddress">Address</label>
				    	<input type="text" class="form-control" id="exampleInputAddress" name="address" placeholder="Enter address">
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
				    <div class="form-group col-md-6">
		                <label>Call Purpose</label>
	                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="call_purpose" id="call_purpose">
		                    <option selected="selected" disabled>Select...</option>
		                    <option value="visa">VISA</option>
		                    <option value="ielts">IELTS</option>
	                    </select>
                  	</div>
                  	<div class="row" id="visa" style="display:none;">
                  		<div class="form-group col-md-12" id="visa_category">
		                	<label>Visa Category</label>
		                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="visa_category">
			                    <option selected="selected" disabled>Select...</option>
			                    <option value="study">Study</option>
			                    <option value="work_permit">Work Permit</option>
			                    <option value="pr">Permanent Residence</option>
			                    <option value="investment">Investment</option>
			                    <option value="tourist">Tourist</option>
		                    </select>
                  		</div>
                  		<div class="form-group col-md-12" id="score">
					    	<label for="exampleInputScore">IELTS Score</label>
					    	<input type="number" class="form-control" id="exampleInputScore" name="ielts_score" placeholder="Enter Score">
				    	</div>
	                    <div class="form-group col-md-3" id="listen">
	                    	<label for="exampleInputEnglish">Listen</label>
	                    	<input type="text" class="form-control" name="listen_score" placeholder="Enter score">
	                  	</div>
	                  	<div class="form-group col-md-3" id="write">
	                    	<label for="exampleInputEnglish">Write</label>
	                    	<input type="text" class="form-control" name="write_score" placeholder="Enter score">
	                  	</div>
	                  	<div class="form-group col-md-3" id="read">
	                    	<label for="exampleInputEnglish">Read</label>
	                    	<input type="text" class="form-control" name="read_score" placeholder="Enter score">
	                  	</div>
	                  	<div class="form-group col-md-3" id="speak">
	                    	<label for="exampleInputEnglish">Speak</label>
	                    	<input type="text" class="form-control" name="speak_score" placeholder="Enter score">
	                  	</div>
	                  	<div class="form-group col-md-12" id="desire_country">
		                	<label>Desire Country</label>
		                    <select class="form-control select2  desire_country" data-dropdown-css-class="select2-danger" style="width: 100%;" name="desire_country">
			                    <option selected="selected" disabled>Select...</option>
			                    <option value="usa">United States</option>
			                    <option value="ca">Canada</option>
			                    <option value="uk">United Kingdom</option>
			                    <option value="aussie">Australia</option>
			                    <option value="nz">New Zealand</option>
		                    </select>
              			</div>
              		</div>
              		<div class="row" id="ielts" style="display:none;">
              			<div class="form-group col-md-12" id="ieltsScore">
					    	<label for="exampleInputScore">IELTS Score</label>
					    	<input type="number" class="form-control" id="exampleInputScore" name="ieltsScore" placeholder="Enter Score">
				    	</div>
	                    <div class="form-group col-md-3" id="ieltsListen">
	                    	<label for="exampleInputEnglish">Listen</label>
	                    	<input type="text" class="form-control" name="ieltsListen" placeholder="Enter score">
	                  	</div>
	                  	<div class="form-group col-md-3" id="ieltsWrite">
	                    	<label for="exampleInputEnglish">Write</label>
	                    	<input type="text" class="form-control" name="ieltsWrite" placeholder="Enter score">
	                  	</div>
	                  	<div class="form-group col-md-3" id="ieltsRead">
	                    	<label for="exampleInputEnglish">Read</label>
	                    	<input type="text" class="form-control" name="ieltsRead" placeholder="Enter score">
	                  	</div>
	                  	<div class="form-group col-md-3" id="ieltsSpeak">
	                    	<label for="exampleInputEnglish">Speak</label>
	                    	<input type="text" class="form-control" name="ieltsSpeak" placeholder="Enter score">
	                  	</div>
	                  	<div class="form-group col-md-12" id="ieltsBand">
					    	<label for="exampleInputScore">Required Band</label>
					    	<input type="number" class="form-control" id="exampleInputScore" name="ieltsBand" placeholder="Enter Score">
				    	</div>
				    	<div class="form-group col-md-6" id="ielts_test">
			                <label>Required Test</label>
		                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="ielts_test" id="ielts">
			                    <option selected="selected" disabled>Select...</option>
			                    <option value="GT">GT</option>
			                    <option value="academic">Academic</option>
		                    </select>
                  		</div>
              		</div>
              		<!--div class="form-group col-md-6" id="call_manage_by">
		                <label>Call Manage By</label>
	                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="call_manage_by" id="call_manage_by">
		                    <option selected="selected" disabled>Select...</option>
		                    {{-- @foreach($manager as $key=>$val) --}}
		                    <option value="{{-- $val->id --}}">{{-- $val->name --}}</option>
		                    {{-- @endforeach --}}
	                    </select>
                  	</div-->
                  	<div class="form-group col-md-6" id="feed_back">
                        <label>Feed Back</label>
                        <textarea class="form-control" name="feed_back" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="form-group col-md-6" > 
	                    <label>Follow Up</label>
	                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest" id="follow_up">
	                        <input type="date" name="follow_up" class="form-control datetimepicker-input" data-target="#reservationdatetime">
	                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
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
    <div class="se-pre-con"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
    <script type="text/javascript">
        $(window).load(function(){
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
</div> 
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<script src="{{ asset('public/asset/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('public/asset/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function (){
  bsCustomFileInput.init();
});
</script>
<script type="text/javascript">
	$(document).ready(function(){
	    $("#call_purpose").on('change', function(){
		if(this.value == 'visa'){
		$("#visa").show();
		$("#ielts").hide();
		$('.desire_country').attr('required', 'required');
		$("#visa_category input, #score input, #listen input, #write input, #read input, #speak input,#call_manage_by input").prop("required", true);
		$("#ieltsScore input, #ieltsListen input, #ieltsWrite input, #ieltsSpeak input, #ieltsRead input, #ieltsBand input,#ielts select").prop("required", false);
		}else{
			$("#ielts").show();
			$("#visa").hide();
			$("#ieltsScore input, #ieltsListen input, #ieltsWrite input, #ieltsSpeak input, #ieltsRead input, #ieltsBand input,#ielts select").prop("required", true);
			$("#visa_category input, #score input, #listen input, #write input, #read input, #speak input, #desire_country input,#call_manage_by input , #follow_up input").prop("required", false);
		}
	    });
	});
</script>
@if($message = Session::get('success'))
	<script type="text/javascript">
			$(document).ready(function(){
				swal({
			  title: "Success!",
			  text: "Redirecting in 2 seconds.",
			  type: "success",
			  timer: 2000,
			  showConfirmButton: false
			}, function(){
			      window.location.href = "http://localhost/immivoyage_crm/login";
			});
			});
	</script>
@endif

