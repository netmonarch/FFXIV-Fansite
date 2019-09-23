<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="card">
		<div class="card-header">
			Messages (<?php echo e(count ($messages)); ?>)
		</div>
		
		<div class="container-fluid">
			<table width="100%">
			<?php if(count ($messages) == 0): ?>
				<tr>
					<td>
						You have no new messages.
					</td>
				</tr>
			<?php endif; ?>
			</table>
			<div class="accordion" id="messageAccordion">
			<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			
			<div class="card" <?php if($m->read == "read"): ?> style="background-color:#D8D8D8;" <?php endif; ?>>
				<div class="card-header" id="heading<?php echo e($m->id); ?>">
					<h2 class="mb-0">
					<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($m->id); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($m->id); ?>">
						<div class="float-left text-dark">Sender: <strong><?php echo e($m->from()->name); ?></strong></div>
						<br /><span class="text-dark"><?php echo e($m->subject); ?></span>
					</button>
					</h2>
				</div>
					
				<div id="collapse<?php echo e($m->id); ?>" class="collapse" aria-labelledby="heading<?php echo e($m->id); ?>" data-parent="#messageAccordion">
					<div class="card-body">
						<p><?php echo e($m->description); ?></p>
						<?php echo e($m->created_at->format("m/d/Y g:i a")); ?><br />
									<hr />
						<span class="float-right p-3">
							<form action="message/<?php echo e($m->id); ?>" method="post">
								<?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
								<button class="btn btn-danger"  type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
							</form>
						</span>
						<span class="float-right p-3">
							<form action="message/<?php echo e($m->id); ?>" method="post"><?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
								<button class="btn btn-primary" type="submit"><?php if($m->read == 'read'): ?>
									<strong><i class="fas fa-envelope-open-text"></i> Seen <?php else: ?> <i class="fas fa-envelope-square"></i> Unseen <?php endif; ?></strong></button>
							</form>
						</span>
					</div>
				</div>
			</div>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
	<?php if($errors->any()): ?> <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php echo e($error); ?>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
			</div>
		</div>
		
		<div class="container-fluid text-right p-4">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
				<i class="fas fa-sticky-note"></i> Create Message
			</button>
		</div>
	<?php if($errors->any()): ?> <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php echo e($error); ?>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
	</div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<form action="message" method="POST">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  

<?php echo csrf_field(); ?>

  <div class="form-group">
    <label for="to">To</label>
    <select class="form-control" id="to" name="to" required>
		
      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<option value="<?php echo e($u->id); ?>"><?php echo e($u->name); ?></option>
	  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>
  <div class="form-group">
    <label for="Subject">Subject</label>
    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
  </div>

  <div class="form-group">
    <label for="desc">Description</label>
    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
  </div>
</form>
      <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\FFXIV-Fansite\resources\views/messages.blade.php ENDPATH**/ ?>