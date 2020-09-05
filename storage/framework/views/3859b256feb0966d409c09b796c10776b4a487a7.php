<?php $__env->startSection('content'); ?>

<style>
.table td, .table th {
     border-top: 0px; 
}
</style>


<center><label><?php echo e(Session::get("message")); ?></label></center>

<a href="<?php echo e(asset('students/audits')); ?>" class='appointment-btn scrollto' style="float:right;">BACK</a>

<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>STUDENT AUDIT DETAILS</b> </p>


<table class="table">
<tr><th>Student Name</th><th>URL</th><th>Date</th></tr>
<tr><td><?php echo e($details->student_name); ?></td><td><?php echo e($details->url); ?></td><td><?php echo e(date("d-m-Y",strtotime($details->created_at))); ?></td>
<tr><th>User Type</th><th>Audit Type</th><th>Event</th></tr>
<tr><td><?php echo e($details->user_type); ?></td><td><?php echo e($details->auditable_type); ?></td><td><?php echo e($details->event); ?></td></tr>
<tr><th>URL</th></tr>
<tr><td><?php echo e($details->url); ?></td></tr>
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
<?php $k=1; $new_values = json_decode($details->new_values);  ?>
<?php if(!empty(json_decode($details->old_values))): ?>
<?php $__currentLoopData = json_decode($details->old_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
	<td><?php echo e($k); ?></td>
	<td><?php echo e($key); ?></td>
	<td> <?php if($key=='gender'): ?> <?php if($student==1): ?> Male <?php else: ?> Female <?php endif; ?>  <?php else: ?> <?php echo e($student); ?> <?php endif; ?></td>
	<td><?php if(!empty($new_values)): ?>  <?php if($key=='gender'): ?>  <?php if($new_values->$key==1): ?> Male <?php else: ?> Female <?php endif; ?>    <?php else: ?> <?php echo e($new_values->$key); ?> <?php endif; ?>  <?php else: ?> No Data Found <?php endif; ?> </td>
	</tr>
<?php $k++; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
	<?php $__currentLoopData = json_decode($details->new_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
	<td><?php echo e($k); ?></td>
	<td><?php echo e($key); ?></td>
	<td></td>
	<td><?php if(!empty($new_values)): ?>  <?php if($key=='gender'): ?>  <?php if($new_values->$key==1): ?> Male <?php else: ?> Female <?php endif; ?>    <?php else: ?> <?php echo e($new_values->$key); ?> <?php endif; ?>  <?php else: ?> No Data Found <?php endif; ?> </td>
	</tr>
<?php $k++; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>	

</table>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_audit\resources\views/students/audit_details.blade.php ENDPATH**/ ?>