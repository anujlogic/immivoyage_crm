@extends("layouts.app")
@section("content")
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>COURSE SELECTED</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Client</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            @if($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }}</strong>
              </d iv>
            @endif
            @if($message = Session::get('error'))
              <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }}</strong>
              </div>
            @endif
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <div class="card-body">
                <div>
                  <button type="submit" class="btn btn-info" style="float:right;"><a href="{!! route('applicant.create') !!}" style="color:#fff;">+ Add</a></button>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                    <th>Country</th>
	                    <th>Institution</th>
	                    <th>Course Name</th>
	                    <th>Scholarship</th>
	                    <th>Tuition Fees</th>
	                    <th>Application Fees</th>
	                    <th>Remove Selected</th>
	                </tr>
                </thead>
                <tbody>
                @foreach($application as $key=>$val)
	                <tr>
	                    <td>{{ $val->getCountry->name }}</td>
	                    <td>{{ $val->getUniversity->name }}</td>
	                    <td>{{ $val->getCourse->name }} <br/><small>Intake: {{ $val->getIntake->month.' '.$val->getIntake->year }}</small> <br/><small>Campus: {{ $val->getCampus->name }}</small></td>
	                    <td>60000</td>
	                    <td>$19,963.00</td>
	                    <td>$40.00</td>
	                    <td> 
	                      <a href="{{-- route('client.delete', $val->id) --}}" class="btn btn-app" onclick="return confirm('Are you sure?')"> <i class="fas fa-trash"></i>Delete</a>
	                    </td>
	                </tr>
                @endforeach
                </tbody>
                <tfoot>
	                <tr>
	                	<th>Country</th>
	                    <th>Institution Name</th>
	                    <th>Course Name</th>
	                    <th>Scholarship</th>
	                    <th>Tuition Fees</th>
	                    <th>Application Fees</th>
	                    <th>Remove Selected</th>
	                </tr>
                </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
    </section>
    <section class="content-header">
  <h1>FILE UPLOAD</h1>
</section>
<section class="content container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <h3 class="jumbotron">PLEASE UPLOAD ONLY COLOR SCAN COPY</h3>
      <form method="post" action="{{ route('gallery')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
      @csrf
      <div class="dz-default dz-message">
      <p>Please Upload only COLOR SCAN COPY <br>
Drag Files & Drop Here</p>
      <button type="button" id="button-upload" class="btn btn-default"><i class="fa fa-upload"></i> Upload Files</button>
      </div>
    </div>
   </div>
</section>
<section>
  <div class="card-body price">
      <table class="table table-bordered table-striped col-md-4 offset-md-8">
      <tbody>
        @foreach($application as $key=>$val)
          <tr style="background-color: #fff;">
              <td>Total Application Fees:</td>
              <td>$40.00</td>
          </tr>
        @endforeach
      </tbody>
      </table>
      <div class="process-pull-left"><a href="{{ route('application.checkout',$id)}}" class="btn"> Process Application</a></div>
  </div>
</section>
</div>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
