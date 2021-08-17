@extends("layouts.app")
@section("content")
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add IELTS</h1>
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
                <h3 class="card-title">Create New IELTS</h3>
              </div>
              <form role="form" method="post" action="{{ route('ielts.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputFname">First Name</label>
                      <input type="text" class="form-control" id="exampleInputFname" name="fname" placeholder="Enter first name" value="{{ $ielts->first_name }}">
                      <input type="hidden" name="id" value="{{ $ielts->id }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputLname">Last Name</label>
                      <input type="text" class="form-control" id="exampleInputLname" name="lname" placeholder="Enter last name" value="{{ $ielts->last_name }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" value="{{ $ielts->email }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Contact No</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" name="mobile_no" placeholder="Enter contact no." value="{{ $ielts->mobile_no }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputNominee">City</label>
                      <input type="text" class="form-control" id="exampleInputNominee" name="city" placeholder="Enter city" value="{{ $ielts->city }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputNominee">Address</label>
                      <input type="text" class="form-control" id="exampleInputNominee" name="address" placeholder="Enter address" value="{{ $ielts->address }}">
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                      <label>Interest Status</label>
                        <select id="interest_status" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="interest_status">
                          <option value="0" {{ $ielts->status == 0 ? 'selected="selected"' : '' }}>Not Interested</option>
                          <option value="1" {{ $ielts->status == 1 ? 'selected="selected"' : '' }}>Interested</option>
                        </select>
                      </div>
                    </div>
                    @if($ielts->status==1)
                    <div id="interest_field">
                      <div class="form-group" id="purpose">
                        <label for="exampleInputNominee">Test Purpose</label>
                        <input type="text" class="form-control" id="exampleInputNominee" name="test_purpose" placeholder="Enter purpose" value="@if(!empty($ielts->test_purpose)){{ $ielts->test_purpose }}@endif">
                      </div>
                      <div class="form-group" id="education">
                        <label for="exampleInputNominee">Education</label>
                        <input type="text" class="form-control" id="exampleInputNominee" name="education" placeholder="Enter qualification" value="@if(!empty($ielts->education)){{ $ielts->education }}@endif">
                      </div>
                      <div class="form-group" id="age">
                        <label for="exampleInputNominee">Age</label>
                        <input type="number" class="form-control" id="exampleInputNominee" name="age" placeholder="Enter age" value="@if(!empty($ielts->age)){{ $ielts->age }}@endif">
                      </div>
                      <div class="form-group" id="work_exp">
                        <label for="exampleInputNominee">Work Experience</label>
                        <input type="text" class="form-control" id="exampleInputNominee" name="work_exp" placeholder="Enter experience" value="@if(!empty($ielts->work_exp)){{ $ielts->work_exp }}@endif">
                      </div>
                      <div class="form-group" id="travel_histroy">
                        <label for="exampleInputNominee">Travel History</label>
                        <input type="text" class="form-control" id="exampleInputNominee" name="travel_history" placeholder="Enter travel history" value="@if(!empty($ielts->travel_history)){{ $ielts->travel_history }}@endif">
                      </div>
                      <div class="form-group" id="refusal">
                      <label>Any Refusal</label>
                        <select id="interest_status" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="refusal_before">
                          <option value="yes" {{ $ielts->refusal_before == 'yes' ? 'selected="selected"' : '' }}>Yes</option>
                          <option value="no" {{ $ielts->refusal_before == 'no' ? 'selected="selected"' : '' }}>Not</option>
                        </select>
                      </div>
                    </div>
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
<script src="{{ asset('public/asset/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('public/asset/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>