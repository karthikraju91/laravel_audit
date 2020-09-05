<?php $__env->startSection('content'); ?>




<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>STUDENTS DETAILS</b> </p>
<center><label style="color:red"><?php echo e(Session::get("message")); ?></label></center>
<a href="<?php echo e(asset('students/add')); ?>" class="appointment-btn scrollto" style="float:right;margin-bottom:15px;">Add New Student</a>

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
<?php $k=1; ?>
<?php if(count($students)>0): ?>
<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
	<td><?php echo e($k); ?></td>
	<td><?php echo e($student->name); ?></td>
	<td><?php echo e($student->email); ?></td>
	<td><?php echo e($student->mobile_no); ?></td>
	<td><?php if($student->gender==1): ?> Male <?php else: ?> Female <?php endif; ?></td>
	<td><?php echo e(date("d-m-Y",strtotime($student->dob))); ?></td>
	<td><a href="<?php echo e(asset('students/view')); ?>/<?php echo e($student->id); ?>">view</a>&nbsp;&nbsp;<a href="<?php echo e(asset('students/edit/')); ?>/<?php echo e($student->id); ?>">Edit</a>&nbsp;&nbsp;<a onclick="return confirm('Are you sure?')" href="<?php echo e(asset('students/delete/')); ?>/<?php echo e($student->id); ?>">Delete</a></td>
</tr>
<?php $k++; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
	<tr><td colspan='7'><center>No Data Found</center></td></tr>
<?php endif; ?>

</table>

<?php if($students->lastPage() > 1): ?>
<ul class="pagination">
    <li class="<?php echo e(($students->currentPage() == 1) ? ' disabled' : ''); ?>">
        <a style="margin-left:0px;" class="appointment-btn scrollto" href="<?php echo e($students->url(1)); ?>">Previous</a>
    </li>
    <?php for($i = 1; $i <= $students->lastPage(); $i++): ?>
        <li class="<?php echo e(($students->currentPage() == $i) ? ' active' : ''); ?>">
            <a style="margin-left:3px;" class="appointment-btn scrollto" href="<?php echo e($students->url($i)); ?>"><?php echo e($i); ?></a>
        </li>
    <?php endfor; ?>
    <li class="<?php echo e(($students->currentPage() == $students->lastPage()) ? ' disabled' : ''); ?>">
        <a style="margin-left:3px;" class="appointment-btn scrollto" href="<?php echo e($students->url($students->currentPage()+1)); ?>" >Next</a>
    </li>
</ul>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_audit\resources\views/students/list.blade.php ENDPATH**/ ?>