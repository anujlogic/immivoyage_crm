@extends("layouts.app")
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
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
                <h3 class="card-title">Profile</h3>
              </div>
               
               <form role="form" method="post" action="{{ route('management.store') }}" enctype="multipart/form-data">
	              	@csrf
	                <div class="card-body">
	                  	<div class="form-group">
	                    	<label for="exampleInputFname">Name</label>
	                    	<input type="text" class="form-control" id="exampleInputFname" value="{{ $login_user->name}}" readonly>
	                  	</div>
	                  	<div class="form-group">
	                    	<label for="exampleInputEmail">Email</label>
	                    	<input type="email" class="form-control" id="exampleInputEmail" name="email" placeholder="Enter email" value="{{ $login_user->email}}" readonly>
	                    </div>
	                    <!-- <div class="form-group">
	                    	<label for="exampleInputPassword">Password</label>
	                    	<input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Enter password" >
	                    </div>
	                    <div class="form-group">
	                    	<label for="exampleInputEmail1">Cofirm Password</label>
	                    	<input type="password" class="form-control" id="exampleInputEmail1" name="password_confirmation" placeholder="Confirm password">
	                    </div> -->
	                    <div class="form-group">
	                    	<label for="exampleInputAddress">Address</label>
	                    	<input type="text" class="form-control" id="exampleInputAddress" name="address" placeholder="Enter address" value="{{ $login_user->address}}" readonly>
	                    </div>
	                  	<div class="form-group">
	                    	<label for="exampleInputNominee">Mobile No</label>
	                    	<input type="text" class="form-control" id="exampleInputNominee" name="mobile_no" placeholder="Enter mobile no." value="{{ $login_user->mobile_no }}" readonly>
	                  	</div>
	                  	<div class="form-group col-md-6">
	                    <label for="exampleInputFile">Profile Picture</label>
	                    <div class="input-group">
	                    	@if($login_user->image)
	                         <img src="{{ URL::asset('public/image/')}}/{{ $login_user->image }}" alt="Passport Size Image" width="90" height="90" style="border-radius: 25px;">
	                         @else
	                         <img src="{{ URL::asset('public/image/')}}/no_image.png" alt="Passport Size Image" width="90" height="90" style="border-radius: 25px;">
	                         @endif
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('public/asset/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>