<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="jumbotron">
      
      <p class="lead"><h3>Choose a Category and start discussing!</h3></p>
      <hr class="my-4">
      <table class="container">
      	<tr>
      		<td>
      			<strong>Click Below to Select a Forum Subject</strong>
      		</td>
      	</tr>
		
        <?php $__currentLoopData = $forums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		
		<?php $class = $i % 2 === 0 ? 'evenrow' : 'oddrow'; ?>
          <tr class="<?php echo e($class); ?>">
            <td>
				<div class="float-right text-sm">
					 <h6>
						<span class="badge badge-secondary text-left p-2">
							Topics: <?php echo e(count ($f->topicCount()->get() )); ?><br />
							Comments: 
							<?php
								$cCount = 0;
								foreach ($f->topicCount()->get() as $topic)
								{
									$cCount += $topic->commentCount();
								}
								echo $cCount;
							?>
						</span>
					 </h6>	
				</div>
              <a href="forum/<?php echo e($f->id); ?>"><?php echo e($f->description); ?></a>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
		
        </tr>

      </table>
      

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\FFXIV-Fansite\resources\views/forum.blade.php ENDPATH**/ ?>