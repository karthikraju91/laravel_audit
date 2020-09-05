@extends('layouts.app_new')

@section('content')

<center><label style='color:red'>{{Session::get("message")}}</label></center>

<a href="{{asset('students/list')}}" class='appointment-btn scrollto' style="float:right;">All Students</a>

<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>EDIT STUDENT DETAILS</b> </p>
@if (count($errors) > 0)
   <div class = "alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
@endif

<form method="post" action="{{asset('students/edit_data')}}" enctype="multipart/form-data" role="form">

<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="id" value="{{$students->id}}">

          <div class="form-row">
            <div class="col-md-4 form-group">
			<label><b>Name</b></label>
              <input type="text" name="name" class="form-control" style="border-radius:0px" id="name" placeholder="Enter Student Name" value="{{$students->name}}">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
			<label><b>Email</b></label>
              <input type="email" class="form-control" name="email" id="email" style="border-radius:0px" placeholder="Student Email" data-rule="email" data-msg="Please enter a valid email" value="{{$students->email}}">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
			<label><b>Mobile Number</b></label>
              <input type="tel" class="form-control" name="mobile_no" id="phone" style="border-radius:0px" placeholder="Student Phone Number" data-rule="maxlen:10" data-msg="Please enter 10 digits mobile number" maxlength="10" value="{{$students->mobile_no}}" onkeypress="return isNumber(event)">
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 form-group">
			<label><b>Date of Birth</b></label>
              <input type="datetime" name="dob" class="form-control datepicker" style="border-radius:0px" id="date" placeholder="Date of Birth" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="{{date('d-m-Y',strtotime($students->dob))}}" autocomplete="off">
              <div class="validate"></div>
            </div>
			
			<div class="col-sm-4"><label><b>Upload Image</b></label><input type="file" name="upload_file" class="form-control" style="border-radius:0px"><img src="{{asset('students')}}/{{$students->profile_pic}}" width="100" style="margin-top:10px;"></div>
			
          </div>
        <div class="form-row">    
            <div class="col-md-4 form-group">
              <b>Gender</b> : &nbsp;&nbsp;
				male <input type="radio" name="gender" value=1 @if($students->gender==1) checked @endif >
				female <input type="radio" name="gender" value=2 @if($students->gender==2) checked @endif >
            </div>
          </div>

          
          
		  
		  <input type="submit" style="margin-left:0px;" name="submit" value="Edit Student" class="appointment-btn scrollto" style="border-radius:0px">
		  
		  
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
