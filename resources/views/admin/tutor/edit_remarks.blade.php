@extends("layouts.app")
@section("content")
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Tutor</h1>
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
                  <h3 class="card-title">Edit Tutor</h3>
                </div>

                <div class="card-body">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Candidate Answer Sheet</label>
                        <button onclick=" myPopup ('{{ route('answer.sheet',$assignTest->id) }}', 'exam', 1024, 768);" {{-- $assignTest->answer !='' ? 'disabled' : '' --}}>Open Answer Screen</button>
                      </div>
                    </div>
                </div>
                <form id="form1" runat="server" role="form" method="post" action="{{ route('tutor.update.marks') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Remarks</label>
                          <textarea class="form-control" name="remark" rows="3" placeholder="Enter ...">{{ $assignTest->marks }}
                          </textarea>
                        </div>
                      </div>
                  </div> 
                  <input type="hidden" name="id" value="{{ $id }}">
                  <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
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
function readURL(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script>
    function myPopup(myURL, title, myWidth, myHeight){
      var left = (screen.width - myWidth) / 2;
      var top = (screen.height - myHeight) / 4;
      var myWindow = window.open(myURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
    }
</script>

 