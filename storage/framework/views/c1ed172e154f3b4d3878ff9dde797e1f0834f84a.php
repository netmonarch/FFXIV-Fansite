		<div>
		
			<ul>
			<?php if($errors->any()): ?>
				
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				
				<li><?php echo e($error); ?></li>
				
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
			<?php endif; ?>
		</div><?php /**PATH C:\wamp64\www\FFXIV-Fansite\resources\views/errors.blade.php ENDPATH**/ ?>