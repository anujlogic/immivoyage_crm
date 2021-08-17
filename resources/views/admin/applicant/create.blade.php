@extends("layouts.app")
@section("content")
<div class="content-wrapper" style="min-height: 1000px;">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>APPLY FOR NEW COURSE</h1>
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
                <h3 class="card-title">Note: Please select University first, then Select Course Type, then Select Course Name Next click on Apply New Course Button for Apply New Course</h3>
              </div>
              <form class="form-horizontal" method="post" action={{ route('store.application') }}>
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Select Country</label>
                    <div class="col-sm-10">
                      <select class="custom-select" id="country-dropdown" name="country_id">
                      	<option selected disabled>Select Country</option>
                      	@foreach($country as $key=>$val)
                          <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Select University</label>
                    <div class="col-sm-10">
                      <select class="custom-select" id="university-dropdown" name="university_id">
                        <option selected disabled>Select University</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Course Type</label>
                    <div class="col-sm-10">
                      <select class="custom-select" id="courseType-dropdown" name="coursetype_id">
                          <option selected disabled>Select Course Type</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Select Course</label>
                    <div class="col-sm-10">
                      <select class="custom-select" id="couses-dropdown" name="courses_id">
                        <option selected disabled>Select Courses</option>
                        </select>
                    </div>
                  </div>
                </div>
                <div class="card-footer" style="text-align: center;">
                  <button type="submit" class="btn btn-info">Apply New Course</button>
                </div>
              </form>
            </div>
            @if(!empty($applied_university))
            <div class="col-lg-4 col-6">
            <div class="small-box bg-info univ_widget_box">
              <div class="inner univ_widget">
                 <img src="{{URL::asset('public/image/univ_logo')}}/{{ $applied_university->getUniversity->logo }}" alt="profile Pic" height="171" width="171" style="margin-left: 107px;">
              </div>
               <h5 style="text-align: center;">{{ $applied_university->getCourse->name }}</h5>
              <a href="{{ url('/apply/intake/')}}/{{ $applied_university->id }}" class="small-box-footer apply_now">
                Apply Now <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
            </div>
            @endif
        </div>
      </div>
      </div>
    </section>
 </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $('#country-dropdown').on('change', function() {
    var country_id = this.value;
    $("#university-dropdown").html('');
    $.ajax({
    url:"{{route('country.university')}}",
    type: "POST",
    data: {
    country_id: country_id,
    _token: '{{csrf_token()}}'
    },
    dataType : 'json',
    success: function(result){
    $.each(result.university,function(key,value){
    $("#university-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
    });
    $('#courseType-dropdown').html('<option value="">Select State First</option>'); 
    }
    });
  });    
  $('#university-dropdown').on('change', function(){
    var university_id = this.value;
    $("#courseType-dropdown").html('');
    $.ajax({
    url:"{{route('university.coursetype')}}",
    type: "POST",
    data: {
    university_id: university_id,
    _token: '{{csrf_token()}}'
    },
    dataType : 'json',
    success: function(result){
    $.each(result.courseType,function(key,value){
    $("#courseType-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
    });
    }
    });
  });
  $('#courseType-dropdown').on('change', function(){
    var course_type_id = this.value;
    $("#couses-dropdown").html('');
    $.ajax({
    url:"{{route('coursetype.courses')}}",
    type: "POST",
    data: {
    course_type_id: course_type_id,
    _token: '{{csrf_token()}}'
    },
    dataType : 'json',
    success: function(result){
    $.each(result.courses,function(key,value){
      $("#couses-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
    });
    }
    });
  });
});
</script>