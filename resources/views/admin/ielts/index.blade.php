@extends("layouts.app")
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>IELTS Students</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ielts</li>
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
                  <strong>{{ $message }}</strong><i class="fas fa-thumbs-up"></i>
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
                  <button type="submit" class="btn btn-info" style="float:right;"><a href="{!! route('ilets.create') !!}" style="color:#fff;">+ Add</a></button>
                </div>
                 <button onclick="exportexcel()" class="btn btn-info" style="margin-bottom: 26px;">Export to Excel</button>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Age</th>
                    <th>Test Purpose</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($ielts as $key=>$val)  
                  <tr>
                    <td>{{ $val->first_name }} {{ $val->last_name }}</td>
                    <td>{{ $val->mobile_no }}</td>
                    <td>{{ $val->email }}</td>
                    <td>{{ $val->city }}</td>
                    <td>@if(!empty($val->age)) {{ $val->age }} @else {{ 'N/A' }} @endif</td>
                    <td>@if(!empty($val->test_purpose)){{ $val->test_purpose }}  @else {{ 'N/A' }} @endif</td>
                    <td>@if(!empty($val->status==0)){{ 'Not Interested' }} @else {{ 'Interested' }} @endif</td>
                    <td>
                      <a href="{{ route('ielts.edit', $val->id) }}" class="btn btn-app"> <i class="fas fa-edit"></i> Edit </a> &nbsp;&nbsp;
                      <a href="{{ route('ielts.delete', $val->id) }}" class="btn btn-app" onclick="return confirm('Are you sure?')"> <i class="fas fa-trash"></i> Delete</a>
                    </td>
                  </tr>
                  @endforeach 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name </th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Age</th>
                    <th>Test Purpose</th>
                    <th>Status</th>
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
<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
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


<script type="text/javascript">
  function exportexcel(){
  var $j = jQuery.noConflict();    
      $j("#example1").table2excel({  
          name: "Table2Excel",  
          filename: "myFileName",  
          fileext: ".xls"  
      });  
  }
</script>
