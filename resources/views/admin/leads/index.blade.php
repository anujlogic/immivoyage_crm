@extends("layouts.app")
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Call Lead List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Leads</li>
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
                <div>
                  <button type="submit" class="btn btn-info" style="float:right;"><a href="{!! route('call.create') !!}" style="color:#fff;">+ Add</a></button>
                </div>
                <div id="message" style="text-align:center; margin-bottom: 10px; color:red; display:none;">Enroll Updated Successfully.</div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Lead Category</th>
                    <th>Call Purpose</th>
                    <th>Enrolled</th>
                    <th>Manage By</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($leads as $key=>$val)
                  <tr>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->email }}</td>
                    <td>{{ $val->contact_no }}</td>
                    <td>{{ $val->age }}</td>
                    <td>{{ $val->address }}</td>
                    <td>{{ $val->lead_category }}</td>
                    <td>{{ $val->call_purpose }}</td>
                    <td>
                    <div class="form-group" id="select_box" style="display: flex;">
                    {{ strtoupper($val->enroll) }} 
                      <select class="custom-select" name="enroll_update" style="margin-left: 17px;">
                        <option value="process" selected disabled>Update enroll...</option>
                        <option value="yes-{{$val->id}}" {{ $val->enroll=='yes' ? 'selected' : ''}}>Enrolled</option>
                        <option value="no-{{$val->id}}" {{ $val->enroll=='no' ? 'selected' : ''}}>Disenrolled</option>
                      </select>
                    </div>
                    </td>
                    <td>{{ $val->manage_by }}</td>
                    <td>
                      <a href="{{ route('call.edit', $val->id) }}" class="btn btn-app"> <i class="fas fa-edit"></i> Edit </a> &nbsp;&nbsp;
                      <a href="{{ route('call.detail', $val->id) }}" class="btn btn-app"> <i class="fas fa-eye"></i> View </a> &nbsp;&nbsp;
                      <a href="{{ route('call.delete', $val->id) }}" class="btn btn-app" onclick="return confirm('Are you sure?')"> <i class="fas fa-trash"></i> Delete </a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Lead Category</th>
                    <th>Call Purpose</th>
                    <th>Enrolled</th>
                    <th>Manage By</th>
                    <th>Action</th>
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
    <!-- /.content -->
  </div>	
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $("select[name='enroll_update']").change(function(){
      var enroll = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "{{ route('enroll.update') }}",
          method: 'POST',
          data: {enroll:enroll, _token:token},
          success: function(data){
            console.log(data);
              $('#message').fadeIn('slow', function(){
              $('#message').delay(3000).fadeOut(); 
            });
          }
      });
  });
  });
</script>
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
