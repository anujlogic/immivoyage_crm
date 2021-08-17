@extends("layouts.app")
@section("content")
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Tutor</h1>
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
                <h3 class="card-title">Edit Tutor</h3>
              </div>
              <form id="form1" runat="server" role="form" method="post" action="{{ route('tutor.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group" id="first_name">
                      <label for="exampleInputFname">Tutor Name</label>
                      <input type="text" class="form-control" id="exampleInputFname" name="name" placeholder="Enter name" value="{{ $tutor->name }}">
                       <input type="hidden" name="id" value="{{ $tutor->id }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputLname">Email</label>
                      <input type="Email" class="form-control" id="exampleInputLname" name="email" placeholder="Enter E-mail ID" value="{{ $tutor->email }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputNominee">Contact No</label>
                      <input type="number" class="form-control" id="exampleInputNominee" name="contact_no" placeholder="Enter contact no" value="{{ $tutor->mobile_no }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputAddress">Address</label>
                      <input type="text" class="form-control" id="exampleInputAddress" name="address" placeholder="Enter address no" value="{{ $tutor->address }}">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputCitizenship">Profile Pic</label>
                      <input type="file" class="form-control" id="exampleInputAge" name="image" onchange="readURL(this);">
                      <img src="{{ URL::asset('public/image/tutor/') }}/{{ $tutor->image }}" alt="profile Pic" height="91" width="91" style="border-radius: 47px;" id="blah">
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
<script type="text/javascript">
    function readURL(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

 