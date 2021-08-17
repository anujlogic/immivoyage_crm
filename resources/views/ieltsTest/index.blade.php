@extends("layouts.app")
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>IELTS Test List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">IELTS</li>
              <li class="breadcrumb-item active">Test</li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content --> 
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            @if($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }}</strong> <i class="fas fa-thumbs-up"></i>
              </div>
              @endif
              @if ($message = Session::get('error'))
              <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong> <i class="fas fa-thumbs-down"></i>
              </div>
              @endif                                                                 
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <div class="card-body">
                @if(Auth::user()->user_type=='tutor')
                    <div> 
                      <button type="submit" class="btn btn-info" style="float:right;"><a href="{!! route('ielts.test.create') !!}" style="color:#fff;">+ Add</a></button>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                      <thead style="text-align: center;">
                      <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Test File</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody style="text-align: center;">
                       @foreach($ieltsTest as $key=>$val)
                        <tr>
                          <td>{{ $val->name }}</td>
                          <td>{{ $val->category }}</td>
                          <td><img src="{{ URL::asset('public/image/ielts_test/') }}/{{ $val->file }}" alt="profile Pic" height="61" width="61" style="border-radius: 47px;"></td>
                          <td>{{ $val->description }}</td>
                          <td> 
                            <a href="{{ route('ielts.test.edit', $val->id) }}" class="btn btn-app"> <i class="fas fa-edit"></i> Edit </a> &nbsp;&nbsp;
                            <a href="{{ route('ielts.test.delete', $val->id) }}" class="btn btn-app" onclick="return confirm('Are you sure?')"> <i class="fas fa-trash"></i> Delete </a>
                            <a href="{{ route('ielts.test.assign', $val->id) }}" class="btn btn-app"> <i class="fa fa-share-alt" aria-hidden="true"></i> Assign Test </a>
                            <a href="{{ route('ielts.test.answer', $val->id) }}" class="btn btn-app"> <i class="fa fa-upload" aria-hidden="true"></i> Update Answer </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot style="text-align: center;">
                      <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Test File</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                      </tfoot>
                    </table>
                @endif
                @if(Auth::user()->user_type=='lead')
                    <table id="example1" class="table table-bordered table-striped">
                      <thead style="text-align: center;">
                      <tr>
                        <th>Test Name</th>
                        <th>Tutor Name</th>
                        <th>Student Name</th>
                        <th>File</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody style="text-align: center;">
                        @foreach($getMyTest as $key=>$val)
                        <tr>
                          <td>{{ $val->test->name }}</td>
                          <td>{{ $val->tutor->name }}</td>
                          <td>{{ $val->student->name }}</td>
                          <td>{{ date('d-m-Y',strtotime($val->created_at)) }}</td>
                          <td><img src="{{URL::asset('public/image/ielts_test/')}}/{{ $val->test->file}}" alt="Test File" height="91" width="91" style="border-radius: 47px;"></td>
                          <td><a href="{{URL::asset('public/image/ielts_test/')}}/{{ $val->test->file}}" class="btn btn-app" download> <i class="fa fa-download" aria-hidden="true"></i>Download</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot style="text-align: center;">
                      <tr>
                        <th>Test Name</th>
                        <th>Tutor Name</th>
                        <th>Student Name</th>
                        <th>File</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                      </tfoot>
                    </table>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>	
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(function (){
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
