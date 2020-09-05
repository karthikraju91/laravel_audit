@extends('layouts.app_new')

@section('content')




<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>STUDENTS DETAILS</b> </p>
<center><label style="color:red">{{Session::get("message")}}</label></center>
<a href="{{asset('students/add')}}" class="appointment-btn scrollto" style="float:right;margin-bottom:15px;">Add New Student</a>

<table class="table table-bordered table-striped dataTable">

<tr>
	<th>S.no</th>
	<th>Student Name</th>
	<th>Email</th>
	<th>Mobile No</th>
	<th>Gendet</th>
	<th>Date of Birth</th>
	<th>Actions</th>
</tr>
@php $k=1; @endphp
@if(count($students)>0)
@foreach($students as $student)
<tr>
	<td>{{$k}}</td>
	<td>{{$student->name}}</td>
	<td>{{$student->email}}</td>
	<td>{{$student->mobile_no}}</td>
	<td>@if($student->gender==1) Male @else Female @endif</td>
	<td>{{date("d-m-Y",strtotime($student->dob))}}</td>
	<td><a href="{{asset('students/view')}}/{{$student->id}}">view</a>&nbsp;&nbsp;<a href="{{asset('students/edit/')}}/{{$student->id}}">Edit</a>&nbsp;&nbsp;<a onclick="return confirm('Are you sure?')" href="{{asset('students/delete/')}}/{{$student->id}}">Delete</a></td>
</tr>
@php $k++; @endphp
@endforeach
@else
	<tr><td colspan='7'><center>No Data Found</center></td></tr>
@endif

</table>

@if ($students->lastPage() > 1)
<ul class="pagination">
    <li class="{{ ($students->currentPage() == 1) ? ' disabled' : '' }}">
        <a style="margin-left:0px;" class="appointment-btn scrollto" href="{{ $students->url(1) }}">Previous</a>
    </li>
    @for ($i = 1; $i <= $students->lastPage(); $i++)
        <li class="{{ ($students->currentPage() == $i) ? ' active' : '' }}">
            <a style="margin-left:3px;" class="appointment-btn scrollto" href="{{ $students->url($i) }}">{{ $i }}</a>
        </li>
    @endfor
    <li class="{{ ($students->currentPage() == $students->lastPage()) ? ' disabled' : '' }}">
        <a style="margin-left:3px;" class="appointment-btn scrollto" href="{{ $students->url($students->currentPage()+1) }}" >Next</a>
    </li>
</ul>
@endif

@endsection
