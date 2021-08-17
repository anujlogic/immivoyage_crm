@extends("layouts.app")
@section("content")
<div class="content-wrapper" style="min-height: 1000px;">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @foreach($intake as $key=>$val)
            <h1>{{ $val->intakeCourse->name}}</h1>
            @break
                @endforeach
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ URL::previous() }}"><button type="button" class="btn btn-block btn-primary btn-sm"><i class="fas fa-arrow-left"></i>Back</button></a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10 offset-md-1">
            <div class="card card-info">  
					@if($errors->any())
  					<div class="alert alert-danger">
    					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     					@foreach ($errors->all() as $error)
				            <li>{{ $error }}</li>
				        @endforeach
  					</div>
					@endif
              <div class="card-header application-form">
                <h3 class="card-title"></h3>
              </div>
              <form class="form-horizontal" method="post" action={{ route('intake.update') }}>
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                        <div>
                          @foreach($intake as $key=>$val)
                          <img src="{{URL::asset('public/image/univ_logo')}}/{{ $val->intakeUniversity->logo}}" alt="profile Pic" height="171" width="171" style="margin-left: 185px;">
                        </div>
                       @break
                       @endforeach
                    </div>
                    <div class="col-6 intake_dorpdown">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Select Intake</label>
                      <select class="custom-select" id="intake-dropdown" name="intake">
                          <option selected disabled>Select Intake</option>
                          @foreach($intake as $key=>$val)
                            <option value="{{ $val->id }}">{{ $val->month}} {{ $val->year}}</option>
                          @endforeach
                      </select>
                      <input type="hidden" name="application_id" value="{{ $id }}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6 offset-md-6 campus_dorpdown">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Select Campus</label>
                      <select class="custom-select" id="campus-dropdown" name="campus">
                          <option selected disabled>--Select--</option>
                      </select>
                    </div>
                  </div>
              </div>
                <div class="card-footer" style="text-align: center;">
                  <button type="submit" class="btn btn-danger" style="border-radius: 26px;width: 120px;
">APPLY NOW</button>
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
<script>
$(document).ready(function(){
  $('#intake-dropdown').on('change', function(){
    var intake_id = this.value;
    $("#campus-dropdown").html('');
    $.ajax({
    url:"{{route('course.campus')}}",
    type: "POST",
    data: {
    intake_id: intake_id,
    _token: '{{csrf_token()}}'
    },
    dataType : 'json',
    success: function(result){
      $.each(result.campus,function(key,value){
      $("#campus-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
      });
    }
    });
  });
});
</script>