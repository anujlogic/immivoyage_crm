@extends("layouts.app")
@section("content")
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Caips Note</h1>
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
                <h3 class="card-title">Edit Caips</h3>
              </div>
              <form role="form" method="post" action="{{ route('caips.update') }}" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">
                  	<div class="form-group"  id="first_name">
                    	<label for="exampleInputFname">Name</label>
                    	<input type="text" class="form-control" id="exampleInputFname" name="name" placeholder="Enter name" value="{{ $caipsNote->name }}">
                      <input type="hidden" class="form-control" id="exampleInputFname" name="id" placeholder="Enter name" value="{{ $caipsNote->id }}">
                  	</div>
                  	<div class="form-group">
                    	<label for="exampleInputLname">Email</label>
                    	<input type="Email" class="form-control" id="exampleInputLname" name="email" placeholder="Enter E-mail ID" value="{{ $caipsNote->email }}">
                  	</div>
                  	<div class="form-group">
                    	<label for="exampleInputNominee">Contact No</label>
                    	<input type="number" class="form-control" id="exampleInputNominee" name="contact_no" placeholder="Enter contact no" value="{{ $caipsNote->contact_no }}">
                  	</div>
                  	<div class="form-group">
                    	<label for="exampleInputEmail1">Passport No</label>
                    	<input type="text" class="form-control" id="exampleInputEmail1" name="passport_no" placeholder="Enter passport no" value="{{ $caipsNote->passport_no }}">
                    </div>
                    <div class="form-group">
                    	<label for="exampleInputEmail1">Passport Type</label>
                    	<input type="text" class="form-control" id="exampleInputEmail1" name="birth_place" placeholder="Enter passport no" value="{{ $caipsNote->birth_place }}">
                    </div>
                    <div class="form-group">
	                    <label for="exampleInputEmail1">Gender</label>
	                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="gender" id="gender">
		                    <option selected="selected" disabled>Select...</option>
		                    <option value="male" {{ $caipsNote->gender =='male' ? 'selected' : '' }}>Male</option>
		                    <option value="female" {{ $caipsNote->gender =='female' ? 'selected' : '' }}>Female</option>
	                    </select>
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Date Of Birth</label>
	                    <input type="date" class="form-control" id="exampleInputEmail1" name="dob" placeholder="Enter dob" value="{{ $caipsNote->dob }}">
	                </div>
                    <div class="form-group">
                    	<label for="exampleInputAddress">Date Of Issue</label>
                    	<input type="date" class="form-control" id="exampleInputAddress" name="issue_date" placeholder="Enter issue date" value="{{ $caipsNote->issue_date }}">
                    </div>
                 	<div class="form-group">
                    	<label for="exampleInputAge">Date of Expire</label>
                    	<input type="date" class="form-control" id="exampleInputAge" name="expire_date"  placeholder="Enter expire date" value="{{ $caipsNote->expire_date }}">
                  	</div>
                  	<div class="form-group col-md-6">
                 	    <label for="exampleInputCitizenship">Refusal Letter</label>
	                    <input type="file" class="form-control" id="exampleInputAge" name="note">
                      <label for="exampleInputCitizenship">Current Note</label>
                      <img src="{{ URL::asset('public//image/caips/') }}/{{ $caipsNote->notes_file }}" alt="profile Pic" height="91" width="91" style="border-radius: 47px;">
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