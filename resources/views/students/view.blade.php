@extends('layouts.app_new')

@section('content')

<style>
.table td, .table th {
     border-top: 0px; 
}
</style>


<center><label>{{Session::get("message")}}</label></center>

<a href="{{asset('students/list')}}" class='appointment-btn scrollto' style="float:right;">BACK</a>

<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>STUDENT DETAILS</b> </p>


<table class="table">
<tr><th>Student Name</th><th>Email</th><th>Date</th></tr>
<tr><td>{{$data->name}}</td><td>{{$data->email}}</td><td>{{date("d-m-Y",strtotime($data->created_at))}}</td>
<tr><th>Mobile No</th><th>Gender</th><th>Date of Birth</th></tr>
<tr><td>{{$data->mobile_no}}</td><td>@if($data->gender==1) Male @else Female @endif</td><td>{{$data->dob}}</td></tr>
<tr><th>Image</th></tr>
<tr><td><img src="{{asset('students')}}/{{$data->profile_pic}}" width="100" style="margin-top:10px;"></td></tr>
</tr>
</table>





@endsection
