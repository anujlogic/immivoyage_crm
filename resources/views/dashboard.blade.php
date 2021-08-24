@extends("layouts.app")
@section("content")
<style type="text/css">
  .module{
    height: 150px;
    background-color: #ececec;
  }
  .info-box .info-box-number{
    margin-top: 1.25rem !important;
  }
  .section{
      background-color: #d8d8d8;
  }
</style>
   <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"> 
              @if(Auth::check() && (Auth::user()->user_type=='admin' || Auth::user()->user_type=='management'))
                <h1 class="m-0 text-dark">{{ ucWords(Auth::user()->user_type) }} Dashboard</h1>
              @elseif(Auth::check() && (Auth::user()->user_type=='tutor'))
                <h1 class="m-0 text-dark">Modules</h1>
              @else
                <h1 class="m-0 text-dark">My Dashboard</h1>
              @endif
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
      </div>
    </div>
    @if(Auth::user()->user_type=="client")
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
             @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
            </div>
            @endif
            @if ($message = Session::get('error'))
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
                  <!-- test  -->
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>image</th>
                    <th>email</th>
                    <th>Mobile No</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if(!empty($client_data))
                  <tr>
                    <td>{{ $client_data->first_name }}</td>
                    <td>
                    @if(!empty($client_data->client_image->passport_size_img)) 
                    <img src="{{URL::asset('public/image/clients/')}}/{{ $client_data->client_image->passport_size_img}}" alt="profile Pic" height="91" width="91" style="border-radius: 47px;">
                    @endif
                    </td>
                    <td> {{ $client_data->email }}  </td>
                    <td> {{ $client_data->client_account->mobile_no }}</td>
                    <td> {{ $client_data->address}} </td>
                    <td> {{ $client_data->status }} </td>
                    <td> 
                      <a href="{{ route('user.edit', $client_data->id) }}" class="btn btn-app"> <i class="fas fa-edit"></i> Edit </a> &nbsp;&nbsp;
                      <a href="  " class="btn btn-app"> <i class="fas fa-eye"></i> View </a>
                    </td>
                  </tr>
                  @else
                  <tr>
                    <td colspan="6" align="center" style="color:red;">{{ Auth::user()->name }} You have not submit form. Please generate from via add Button in right side.</td>
                  </tr>
                  @endif
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>image</th>
                    <th>email</th>
                    <th>Mobile No</th>
                    <th>Address</th>
                    <th>Status</th>
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
    @endif
     @if(Auth::user()->user_type=="management")
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>@if(isset($management_client)){{ $management_client }}@else{{ 0 }}@endif</h3>
                <p>Total Clients</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>@if(isset($management_process)){{ $management_process }}@else{{ 0 }}@endif<sup style="font-size: 20px"></sup></h3>
                <p>In Process Files</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>@if(isset($management_rejected)){{ $management_rejected }}@else{{ 0 }}@endif</h3>
                <p>Rejected Proposal Files</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>@if(isset($management_success)){{ $management_success }}@else{{ 0 }}@endif</h3>
                <p>Success Proposal Files</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
    </section>
    @endif
    @if(Auth::user()->user_type=="admin")  
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>@if(isset($total_client)){{ $total_client }}@else{{ 0 }}@endif</h3>
                <p>Total Clients</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>@if(isset($total_process)){{ $total_process }}@else{{ 0 }}@endif<sup style="font-size: 20px"></sup></h3>
                <p>In Process Files</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>@if(isset($total_rejected)){{ $total_rejected }}@else{{ 0 }}@endif</h3>
                <p>Rejected Proposal Files</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>@if(isset($total_success)){{ $total_success }}@else{{ 0 }}@endif</h3>
                <p>Success Proposal Files</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach($management as $key=>$val)
          <div class="col-lg-3 col-6">
            @if($key==0)<div class="small-box bg-info">@endif
            @if($key==1)<div class="small-box bg-success">@endif
            @if($key==2)<div class="small-box bg-warning">@endif
            @if($key==3)<div class="small-box bg-danger">@endif
            @if($key==3)<div class="small-box bg-danger">@endif
              <div class="inner">
                <h3>{{$val->total}} Client</h3>
                <p>{{ ucwords($val->manager->name) }}</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endforeach
        </div>
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Last Month Client Visits</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0" style="display: block;">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Application ID</th>
                      <th>Client</th>
                      <th>Mobile No</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Update Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($last_month as $key=>$val)
                      <tr>
                        <td><a href="pages/examples/invoice.html">#100{{ $val->id }}</a></td>
                        <td>{{ $val->first_name }} {{ $val->last_name }}</td>
                        <td>{{ $val->client_account->mobile_no }}</td>
                        @if($val->status == 'process')
                          <td><span class="badge badge-info">{{ $val->status }}</span></td>
                        @endif
                        @if($val->status == 'rejected')
                          <td><span class="badge badge-danger">{{ $val->status }}</span></td>
                        @endif
                        @if($val->status == 'success')
                          <td><span class="badge badge-warning">{{ $val->status }}</span></td>
                        @endif
                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20">{{ date('Y-m-d',strtotime($val->created_at)) }}</div>
                        </td>
                          <td>
                            <div class="form-group" id="select_box">
                              <select class="custom-select" name="status_update" id="status_update">
                                <option value="process" selected disabled>Update status here...</option>
                                <option value="process-{{$val->id}}">In Process</option>
                                <option value="rejected-{{$val->id}}">Rejected</option>
                                <option value="success-{{$val->id}}">Success</option>
                              </select>
                            </div>
                          </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </section>
        </div>
    </section>
    @endif
    @if(Auth::user()->user_type=="tutor")
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box module">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-assistive-listening-systems"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Listening</span>
                  <span class="info-box-number">
                     <small><a class="listen" href="#" data-rel="content1">Go to  <i class="fas fa-arrow-right"></i></a></small>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3 module">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-volume-up" aria-hidden="true"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Speaking</span>
                  <span class="info-box-number">
                     <small> <a class="speak" href="#" data-rel="content2">Go to  <i class="fas fa-arrow-right"></i></a></small>
                  </span>
                </div>
              </div>
            </div>
          <!-- /.col -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 module">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book-reader"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Reading </span>
                <span class="info-box-number">
                   <small> <a class="read" href="#" data-rel="content3">Go to  <i class="fas fa-arrow-right"></i></a></small>
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 module">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-pen"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Writing</span>
                <span class="info-box-number">
                   <small> <a class="write" href="#" data-rel="content4">Go to  <i class="fas fa-arrow-right"></i></a></small>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="col-lg-12 listen-section">
       
      <div id="listen" class="content-container">
        @foreach($tutorAssignTest as $key=>$val)
          <div class="card">
            <div class="card-header section" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $val->id }}" aria-expanded="true" aria-controls="collapseOne">
              {{ $val->created_at }}  {{ $val->test->name }}
              </button>
            </h5>
            </div>
            <div id="collapse{{ $val->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#listen">
            <div class="card-body">
                 {{ $val->test->description }} 
            </div>
            </div>
          </div>
        @endforeach  
      </div>
    </section>
    <section class="col-lg-12 speak-section" style="display: none;">
      <div id="speak" class="content-container"> 
          <div class="card">
            <div class="card-header section" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Collapsible Group Item #3
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#speak">
              <div class="card-body">
                Speak Data
              </div>
            </div>
          </div>
      </div>
    </sectoin>
    @endif

    @if(Auth::user()->user_type=="lead")
      <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box module">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-assistive-listening-systems"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Listening</span>
                  <span class="info-box-number">
                     <small><a class="listen" href="#" data-rel="content1">Go to  <i class="fas fa-arrow-right"></i></a></small>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3 module">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-volume-up" aria-hidden="true"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Speaking</span>
                  <span class="info-box-number">
                     <small> <a class="speak" href="#" data-rel="content2">Go to  <i class="fas fa-arrow-right"></i></a></small>
                  </span>
                </div>
              </div>
            </div>
          <!-- /.col -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 module">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book-reader"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Reading </span>
                <span class="info-box-number">
                   <small><a class="read" href="#" data-rel="content3">Go to  <i class="fas fa-arrow-right"></i></a></small>
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 module">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-pen"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Writing</span>
                <span class="info-box-number">
                   <small><a class="write" href="#" data-rel="content4">Go to  <i class="fas fa-arrow-right"></i></a></small>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="col-lg-12 listen-section">
      <div id="listen" class="content-container">
          @foreach($getMyTest as $key=>$val)
            @if($val->test->category=='listen') 
              <div class="card">
                <div class="card-header section" id="{{$val->id}}">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$val->id}}" aria-expanded="true" aria-controls="collapseOne">
                      <p>Date-: {{ date('Y-m-d',strtotime($val->created_at)) }} {{ $val->test->name }}</p>
                    </button>
                  </h5>
                </div>
                <div id="collapse{{$val->id}}" class="collapse" aria-labelledby="{{$val->id}}" data-parent="#listen">
                  <div class="card-body">
                      <p>
                        <h5><b>Detail</b></h5>
                        {{ $val->test->description }}
                        <a href="{{URL::asset('public/image/ielts_test/')}}/{{ $val->test->file}}" class="btn btn-app" download="" onclick="clickAndDisable(this);"><i class="fa fa-download" aria-hidden="true"></i>Download</a>
                      </p>
                      <div class="row">
                        <div class="col-md-6"> 
                        <p><button onclick=" myPopup ('{{ route('test.sheet',$val->id) }}', 'exam', 1024, 768);" {{ $val->answer !='' ? 'disabled' : '' }}>Open Test Screen</button></p>    
                        </div>
                        @if($val->marks=="" && $val->answer =="")
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Marks</label>
                                <textarea class="form-control" rows="3" placeholder="" disabled></textarea>
                              </div>
                            </div>
                        @endif    
                        @if($val->marks=="" &&  $val->answer !="")
                            <div class="col-md-6">
                                <div class="form-group">
                                <h3 style="color:#de020a;">We will update marks very soon...</h3>
                                </div>
                            </div>
                        @endif
                        @if($val->marks!="")
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Marks</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..." disabled>{{ $val->marks }}</textarea>
                              </div>
                            </div>
                        @endif

                      </div>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
      </div>
    </section>
    <section class="col-lg-12 speak-section" style="display: none;">
      <div id="speak" class="content-container">
          @foreach($getMyTest as $key=>$val)
            @if($val->test->category=='speak') 
              <div class="card">
                <div class="card-header section" id="{{$val->id}}">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$val->id}}" aria-expanded="true" aria-controls="collapseOne">
                      <p>Date-: {{ date('Y-m-d',strtotime($val->created_at)) }} {{ $val->test->name }}</p>
                    </button>
                  </h5>
                </div>
                <div id="collapse{{$val->id}}" class="collapse" aria-labelledby="{{$val->id}}" data-parent="#speak">
                  <div class="card-body">
                      <p>
                        <h5><b>Detail</b></h5>
                        {{ $val->test->description }}
                        <a href="{{URL::asset('public/image/ielts_test/')}}/{{ $val->test->file}}" class="btn btn-app" download=""><i class="fa fa-download" aria-hidden="true"></i>Download</a>
                      </p>
                      <p><button onclick=" myPopup ('{{ route('test.sheet',$val->id) }}', 'exam', 1024, 768);" {{ $val->answer !='' ? 'disabled' : '' }}>Open Test Screen</button></p>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
      </div>
    </section>
    <section class="col-lg-12 read-section" style="display: none;">
      <div id="read" class="content-container">
          @foreach($getMyTest as $key=>$val)
            @if($val->test->category=='read') 
              <div class="card">
                <div class="card-header section" id="{{$val->id}}">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$val->id}}" aria-expanded="true" aria-controls="collapseOne">
                      <p>Date-: {{ date('Y-m-d',strtotime($val->created_at)) }} {{ $val->test->name }}</p>
                    </button>
                  </h5>
                </div>
                <div id="collapse{{$val->id}}" class="collapse" aria-labelledby="{{$val->id}}" data-parent="#read">
                  <div class="card-body">
                      <p>
                        <h5><b>Detail</b></h5>
                        {{ $val->test->description }}
                        <a href="{{URL::asset('public/image/ielts_test/')}}/{{ $val->test->file}}" class="btn btn-app" download=""><i class="fa fa-download" aria-hidden="true"></i>Download</a>
                      </p>
                      <p><button onclick=" myPopup ('{{ route('test.sheet',$val->id) }}', 'exam', 1024, 768);" {{ $val->answer !='' ? 'disabled' : '' }}>Open Test Screen</button></p>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
      </div>
    </section>
    <section class="col-lg-12 write-section" style="display: none;">
      <div id="write" class="content-container">
          @foreach($getMyTest as $key=>$val)
            @if($val->test->category=='write') 
              <div class="card">
                <div class="card-header section" id="{{$val->id}}">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$val->id}}" aria-expanded="true" aria-controls="collapseOne">
                      <p>Date-: {{ date('Y-m-d',strtotime($val->created_at)) }} {{ $val->test->name }}</p>
                    </button>
                  </h5>
                </div>
                <div id="collapse{{$val->id}}" class="collapse" aria-labelledby="{{$val->id}}" data-parent="#write">
                  <div class="card-body">
                      <p>
                        <h5><b>Detail</b></h5>
                        {{ $val->test->description }}
                        <a href="{{URL::asset('public/image/ielts_test/')}}/{{ $val->test->file}}" class="btn btn-app" download=""><i class="fa fa-download" aria-hidden="true"></i>Download</a>
                      </p>
                      <p><button onclick=" myPopup ('{{ route('test.sheet',$val->id) }}', 'exam', 1024, 768);" {{ $val->answer !='' ? 'disabled' : '' }}>Open Test Screen</button></p>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
      </div>
    </section>
    @endif
  </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $("select[name='status_update']").change(function(){
      var status = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "{{ route('update.status') }}",
          method: 'POST',
          data: {status:status, _token:token},
          success: function(data) {
            console.log(data);
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
<script>
$(document).ready(function(){
    // LISTEN SECTION
    $(".listen").click(function(){
     
        $(".listen-section").show();
        $(".speak-section").hide();
        $(".read-section").hide();
        $(".write-section").hide();
        /*$("p.fast").hide("fast");
        $("p.slow").hide("slow");
        $("p.very-fast").hide(50);
        $("p.very-slow").hide(2000);*/
    });
    
    // SPEAK SECTION
    $(".speak").click(function(){
        $(".listen-section").hide();
        $(".speak-section").show();
        $(".read-section").hide();
        $(".write-section").hide();
    });

    // READ SECTION
    $(".read").click(function(){
        $(".listen-section").hide();
        $(".speak-section").hide();
        $(".read-section").show();
        $(".write-section").hide();
    });

    // WRITE SECTION
    $(".write").click(function(){
        $(".listen-section").hide();
        $(".speak-section").hide();
        $(".read-section").hide();
        $(".write-section").show();
    });
});
</script>
<script type="text/javascript">
function clickAndDisable(link){
  link.onclick = function(event){
    event.preventDefault();
  }
} 
</script>
<script>
   function myPopup(myURL, title, myWidth, myHeight) {
      var left = (screen.width - myWidth) / 2;
      var top = (screen.height - myHeight) / 4;
      var myWindow = window.open(myURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
   }
</script>
