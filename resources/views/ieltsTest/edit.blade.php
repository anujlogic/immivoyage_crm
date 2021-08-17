@extends("layouts.app")
@section("content")
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Test</h1>
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
                <h3 class="card-title">Edit Test</h3>
              </div>
              <form id="from3" runat="server" role="form" method="post" action="{{ route('ielts.test.update') }}" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">
                  	<div class="form-group" id="first_name">
                    	<label for="exampleInputFname">Test Name</label>
                    	<input type="text" class="form-control" id="exampleInputFname" name="name" placeholder="Enter test name" value="{{ $ieltsTest->name }}">
                      <input type="hidden" name="id" value="{{ $ieltsTest->id }}">
                  	</div>
                  	<div class="form-group">
                    	<label for="exampleInputLname">Test Category</label>
                    	<select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="category" id="gender">
                        <option selected="selected" disabled>Select...</option>
                        <option value="read" {{ $ieltsTest->category =='read' ? 'selected' : '' }}>Reading</option>
                        <option value="right" {{ $ieltsTest->category=='right' ? 'selected' : '' }}>Righting</option>
                        <option value="speak" {{ $ieltsTest->category=='speak' ? 'selected' : '' }}>Speaking</option>
                        <option value="listen" {{ $ieltsTest->category=='listen' ? 'selected' : '' }}>Listening</option>
                      </select>
                  	</div>
                  	<div class="form-group">
                    	<label for="exampleInputNominee">Description</label>
                    	<textarea name="description" class="form-control" rows="3" placeholder="Enter test detail...">{{ $ieltsTest->description }}</textarea>
                  	</div>
                    <div class="form-group">
                      <label for="exampleInputNominee">Upload File</label>
                      <input type="file" class="form-control" id="exampleInputNominee" name="file" onchange="readURL(this);"> 
                       <img src="{{ URL::asset('public/image/ielts_test/') }}/{{ $ieltsTest->file }}" alt="profile Pic" height="91" width="91" style="border-radius: 47px;margin-top: 10;" id="test_file">
                    </div>
                    <div class="form-group col-md-12">
                       <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
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
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#test_file').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>