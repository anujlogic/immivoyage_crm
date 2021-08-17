@extends("layouts.app")
@section("content")
<style type="text/css">
.multiselect {
  width: auto;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes label {
  display: block;
}

#checkboxes label:hover {
  background-color: #1e90ff;
}

#checkboxes label{
    margin-left: 10px;
}

.assign-button{
    float: right;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assign Test</h1>
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
                <h3 class="card-title">Create New Test</h3>
              </div>
                <form id="from2" runat="server" role="form" method="post" action="{{ route('assign.test.store') }}" enctype="multipart/form-data">
                    @csrf 
                    <div class="card-body">
                    <label for="exampleInputLname">Student List</label>
                      <div class="form-group multiselect">
                          <div class="selectBox" onclick="showCheckboxes();">
                          <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected disabled>Choose Student ...</option>
                          </select>
                          <div class="overSelect"></div>
                          </div>
                          <div id="checkboxes">
                            @foreach($students as $key=>$val)
                              <label for="one">
                              <input type="checkbox" name="student_list[]" value="{{ $val->id }}"> {{ $val->name }}</label>
                            @endforeach  
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputLname">Test Category</label>
                          <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="test" id="gender">
                              <option selected="selected" disabled>Select...</option>
                              @foreach($tests as $key=>$val)
                                  <option value="{{ $val->id }}">{{ $val->name }} ({{ date('d-m-Y',strtotime($val->created_at)) }})</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                     <div class="form-group col-md-12">
                       <button type="submit" class="btn btn-primary assign-button">Submit</button>
                    </div>
                </form>
            </div>
            </div>
      </div>
      </div>
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
                    <thead style="text-align:center;">
                    <tr>
                      <th>Test Name</th>
                      <th>Tutor</th>
                      <th>Student</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody style="text-align:center;">
                        @foreach($getTest as $key=>$val) 
                        <tr>
                          <td>{{ $val->test->name }}</td>
                          <td>{{ $val->tutor->name }}</td>
                          <td>{{ $val->student->name }}</td>
                          <td>{{ date('d-m-Y',strtotime($val->created_at)) }}</td>
                          <td>
                            @if($val->answer=="")  
                              <p style="color:#28a745;">Test In Process</p>
                            @else
                              <a href="{{ route('edit.test.remarks',$val->id) }}" class="btn btn-app"><i class="fas fa-eye"></i>View Test</a>
                            @endif  
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot style="text-align:center;">
                    <tr>
                      <th>Test Name</th>
                      <th>Tutor</th>
                      <th>Student</th>
                      <th>Date</th>
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
  </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    var expanded = false;
    function showCheckboxes() {
      var checkboxes = document.getElementById("checkboxes");
      if (!expanded) {
        checkboxes.style.display = "block";
        expanded = true;
      } else {
        checkboxes.style.display = "none";
        expanded = false;
      }
    }
</script>