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

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<script>
function changes(v1,v2){
	
	alert(v1);
	alert(v2);
	$("#myModal").modal("show");
	
}
</script>

@endsection
