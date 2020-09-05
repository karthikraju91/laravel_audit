@extends('layouts.app_new')

@section('content')

<center><label style="color:red"><b>{{Session::get("message")}}</b></label></center>

<a href="{{asset('students/list')}}" class='appointment-btn scrollto' style="float:right;">All Students</a>

<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>SEND MAIL</b> </p>
@if (count($errors) > 0)
   <div class = "alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
@endif

<form method="post" action="{{asset('students/send_mail')}}" enctype="multipart/form-data" role="form">

<input type="hidden" name="_token" value="{{csrf_token()}}">

          <div class="form-row">
            <div class="col-md-4 form-group">
			<label><b>Send To</b></label>
              <input type="text" name="email" class="form-control" style="border-radius:0px" id="name" placeholder="Enter Student Name" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
			<label><b>Subject</b></label>
              <input type="text" class="form-control" name="subject" id="subject" style="border-radius:0px" placeholder="Enter Subject" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
			<label><b>Content</b></label>
              <textarea  class="form-control" name="content" id="content" style="border-radius:0px" placeholder="Sample Content" placeholder="Please enter content" required></textarea>
              <div class="validate"></div>
            </div>
          </div>
          		  
		  <input type="submit" style="margin-left:0px;" name="submit" value="Send Mail" class="appointment-btn scrollto" style="border-radius:0px">
		  
		  
        </form>


<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>

		
@endsection
