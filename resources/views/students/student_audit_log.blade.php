@extends('layouts.app_new')

@section('content')




<center><label>{{Session::get("message")}}</label></center>

<a href="{{asset('students/list')}}" class='appointment-btn scrollto' style="float:right;">All Students</a>

<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>STUDENT AUDIT DETAILS</b> </p>

    <table class="table table-striped">
        <thead>
            <tr>
				<th>Student Name</th>
                <th>User Type</th>
                <th>Event</th>
                <th>Audit Type</th>
                <th>URL</th>
                <th>Created Date</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
		@if(count($data)>0)
		@foreach($data as $single)
            <tr>
                <td>{{$single->student_name}}</td>
                <td>{{$single->user_type}}</td>
                <td>{{$single->event}}</td>
                <td>{{$single->auditable_type}}</td>
                <td>{{$single->url}}</td>
                <td>{{date("Y-m-d",strtotime($single->created_at))}}</td>
				<td><a href="{{asset('students/audit_full_view')}}/{{$single->id}}">View</a></td>
            </tr>
		@endforeach	
		@else
		<tr><td colspan="6">NO DATA FOUND</td></tr>
		@endif
        </tbody>
    </table>

@if ($data->lastPage() > 1)
<ul class="pagination">
    <li class="{{ ($data->currentPage() == 1) ? ' disabled' : '' }}">
        <a style="margin-left:0px;" class="appointment-btn scrollto" href="{{ $data->url(1) }}">Previous</a>
    </li>
    @for ($i = 1; $i <= $data->lastPage(); $i++)
        <li class="{{ ($data->currentPage() == $i) ? ' active' : '' }}">
            <a style="margin-left:3px;" class="appointment-btn scrollto" href="{{ $data->url($i) }}">{{ $i }}</a>
        </li>
    @endfor
    <li class="{{ ($data->currentPage() == $data->lastPage()) ? ' disabled' : '' }}">
        <a style="margin-left:3px;" class="appointment-btn scrollto" href="{{ $data->url($data->currentPage()+1) }}" >Next</a>
    </li>
</ul>
@endif

@endsection
