<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Forum Creation</div>
				<p >
					<form method="POST" action="<?php echo e(route ('forum.store')); ?>">
					<?php echo e(csrf_field()); ?>


						<div>
							<div style="margin-right: 10px;">
								<label>&nbsp;&nbsp;&nbsp;Forum Title: </label>
								<input type="text" name="description" placeholder="Description">
							

								<button type="submit">Submit</button>
							</div>
						</div>
					</form>
				</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($errors->any()): ?> <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($error); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\FFXIV-Fansite\resources\views/forms/createForum.blade.php ENDPATH**/ ?>