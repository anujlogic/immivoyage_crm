@extends("layouts.app")
@section("content")
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Caips Note</h1>
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
                <h3 class="card-title">Create New Caips</h3>
              </div>
              <form role="form" method="post" action="{{ route('caips.store') }}" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">
                  	<div class="form-group"  id="first_name">
                    	<label for="exampleInputFname">Name</label>
                    	<input type="text" class="form-control" id="exampleInputFname" name="name" placeholder="Enter name">
                  	</div>
                  	<div class="form-group">
                    	<label for="exampleInputLname">Email</label>
                    	<input type="Email" class="form-control" id="exampleInputLname" name="email" placeholder="Enter E-mail ID">
                  	</div>
                  	<div class="form-group">
                    	<label for="exampleInputNominee">Contact No</label>
                    	<input type="number" class="form-control" id="exampleInputNominee" name="contact_no" placeholder="Enter contact no">
                  	</div>
                  	<div class="form-group">
                    	<label for="exampleInputEmail1">Passport No</label>
                    	<input type="text" class="form-control" id="exampleInputEmail1" name="passport_no" placeholder="Enter passport no">
                    </div>
                    <div class="form-group">
                    	<label for="exampleInputEmail1">Birth Place</label>
                    	<input type="text" class="form-control" id="exampleInputEmail1" name="birth_place" placeholder="Enter passport no">
                    </div>
                    <div class="form-group">
	                    <label for="exampleInputEmail1">Gender</label>
	                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="gender" id="gender">
		                    <option selected="selected" disabled>Select...</option>
		                    <option value="male">Male</option>
		                    <option value="female">Female</option>
	                    </select>
	                 </div>
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Date Of Birth</label>
	                    <input type="date" class="form-control" id="exampleInputEmail1" name="dob" placeholder="Enter dob">
	                </div>
                    <div class="form-group">
                    	<label for="exampleInputAddress">Date Of Issue</label>
                    	<input type="date" class="form-control" id="exampleInputAddress" name="issue_date" placeholder="Enter issue date">
                    </div>
                 	<div class="form-group">
                    	<label for="exampleInputAge">Date of Expire</label>
                    	<input type="date" class="form-control" id="exampleInputAge" name="expire_date"  placeholder="Enter expire date">
                  	</div>
                  	<div class="form-group col-md-6">
                 	<label for="exampleInputCitizenship">Refusal Letter</label>
	                 <input type="file" class="form-control" id="exampleInputAge" name="note">
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