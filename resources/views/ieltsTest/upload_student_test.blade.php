@extends("layouts.app")
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Test Upload</h1>
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
                  <h3 class="card-title">Upload Your Test</h3>
                </div>
                <form role="form" method="post" action="{{ route('student.test.upload') }}" enctype="multipart/form-data">
	              	@csrf
	                <div class="card-body">
	                  	<div class="form-group col-md-6 offset-md-3">
	                    <label for="exampleInputFile">Test File</label>
	                    <div class="input-group">
	                        <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="assign_id" id="qualification">
                            <option selected="selected" disabled>Select...</option>
                            @foreach($getMyTest as $key=>$val)
                              <option value="{{ $val->id }}">{{ $val->test->name }}</option>
                            @endforeach
                          </select>
	                    </div>
                      <label for="exampleInputFile">Test File</label>
                      <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile"></label>
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
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Test Name</th>
                    <th>Tutor</th>
                    <th>Student</th>
                    <th>Date</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($myUpoadedTest as $key=>$val)
                    <tr>
                      <td>{{ $val->test->name }}</td>
                      <td>{{ $val->tutor->name }}</td>
                      <td>{{ $val->student->name }}</td>
                      <td>{{ date('d-m-Y',strtotime($val->created_at)) }}</td>
                      <td>Upload &nbsp; &nbsp; &nbsp;<i class="fa fa-check-circle" style="font-size:28px;color:#de030a;"></i></td>
                    </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Test Name</th>
                    <th>Tutor</th>
                    <th>Student</th>
                    <th>Date</th>
                    <th>Status</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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