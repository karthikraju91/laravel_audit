@extends('layouts.app_new')

@section('content')

<style>
.table td, .table th {
     border-top: 0px; 
}
</style>


<center><label>{{Session::get("message")}}</label></center>

<a href="{{asset('students/audits')}}" class='appointment-btn scrollto' style="float:right;">BACK</a>

<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>STUDENT AUDIT DETAILS</b> </p>


<table class="table">
<tr><th>Student Name</th><th>URL</th><th>Date</th></tr>
<tr><td>{{$details->student_name}}</td><td>{{$details->url}}</td><td>{{date("d-m-Y",strtotime($details->created_at))}}</td>
<tr><th>User Type</th><th>Audit Type</th><th>Event</th></tr>
<tr><td>{{$details->user_type}}</td><td>{{$details->auditable_type}}</td><td>{{$details->event}}</td></tr>
<tr><th>URL</th></tr>
<tr><td>{{$details->url}}</td></tr>
</tr>
</table>


<p><b>Input Changed Details</b></p>
<table class="table table-bordered table-striped dataTable">

<tr>
	<th>S.no</th>
	<th>Input Name</th>
	<th>Old Value</th>
	<th>New Value</th>
	</tr>
@php $k=1; $new_values = json_decode($details->new_values);  @endphp
@if(!empty(json_decode($details->old_values)))
@foreach(json_decode($details->old_values) as $key=>$student)
<tr>
	<td>{{$k}}</td>
	<td>{{$key}}</td>
	<td> @if($key=='gender') @if($student==1) Male @else Female @endif  @else {{$student}} @endif</td>
	<td>@if(!empty($new_values))  @if($key=='gender')  @if($new_values->$key==1) Male @else Female @endif    @else {{$new_values->$key}} @endif  @else No Data Found @endif </td>
	</tr>
@php $k++; @endphp
@endforeach
@else
	@foreach(json_decode($details->new_values) as $key=>$student)
<tr>
	<td>{{$k}}</td>
	<td>{{$key}}</td>
	<td></td>
	<td>@if(!empty($new_values))  @if($key=='gender')  @if($new_values->$key==1) Male @else Female @endif    @else {{$new_values->$key}} @endif  @else No Data Found @endif </td>
	</tr>
@php $k++; @endphp
@endforeach
@endif	

</table>



@endsection
