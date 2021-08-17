@extends("layouts.app")
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Caips Notes List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Caips</li>
              <li class="breadcrumb-item active">list</li>
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
                <div>
                  <button type="submit" class="btn btn-info" style="float:right;"><a href="{!! route('caips.create') !!}" style="color:#fff;">+ Add</a></button>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Note</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Date Of Birth</th>
                    <th>Gender</th>
                    <th>Passport No</th>
                    <th>Birth Place</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($caips as $key=>$val)
                  <tr>
                    <td>{{ $val->name }}</td>
                    <td><img src="{{ URL::asset('public/image/caips/') }}/{{ $val->notes_file }}" alt="profile Pic" height="91" width="91" style="border-radius: 47px;"></td>
                    <td>{{ $val->email }}</td>
                    <td>{{ $val->contact_no }}</td>
                    <td>{{ $val->dob }}</td>
                    <td>{{ $val->gender }}</td>
                    <td>{{ $val->passport_no }}</td>
                    <td>{{ $val->birth_place }}</td>
                    <td> 
                      <a href="{{ route('caips.edit', $val->id) }}" class="btn btn-app"> <i class="fas fa-edit"></i> Edit </a> &nbsp;&nbsp;
                      <a href="{{ route('caips.delete', $val->id) }}" class="btn btn-app" onclick="return confirm('Are you sure?')"> <i class="fas fa-trash"></i> Delete </a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Note</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Date Of Birth</th>
                    <th>Gender</th>
                    <th>Passport No</th>
                    <th>Birth Place</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
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
