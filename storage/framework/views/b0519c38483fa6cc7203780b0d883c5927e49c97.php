<?php $__env->startSection('content'); ?>
<div class="container" ng-app="editApp" ng-controller="editControls" >
    <div class="jumbotron">
      
	  <a href="../forum/">Forum Index</a> -> <a href="../forum/<?php echo e($topic->forum()->first()->id); ?>"><?php echo e($topic->forum()->first()->description); ?></a> -> <?php echo e($topic->name); ?>

	  <hr />
      <table cellpadding="3" class="container">
      	<tr>
      		<td colspan="2">
				<fieldset>
					<legend><?php echo e($topic->name); ?></legend>
					<?php echo e($topic->description); ?>

				</fieldset>
      		</td>
      	</tr>

        <?php if(count($topic->comments()) == 0): ?> <tr><td colspan="4">This Topic contains no comments</td></tr> <?php endif; ?>

        <?php $__currentLoopData = $topic->comments(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         
        <tr>
            <td valign="top" class=" border-4 border border-dark " height="100px;" style="border-radius:25px;">
				<div class="float-right border border-left-1 border-bottom-1 p-2 bg-secondary text-white" height="100%">
					Posted by <b><?php echo e($c->owner()->name); ?></b>, <?php echo e($c->created_at->format("m/d/Y g:i a")); ?>

				<div class="text-right">
				<?php if(auth()->id() == $c->owner()->id): ?>
				<form method="POST" action="../comment/<?php echo e($c->id); ?>/destroy"> 
				 <?php echo csrf_field(); ?> 
				 <?php echo method_field('DELETE'); ?>
					<button ng-click="populate('<?php echo e($c->description); ?>', <?php echo e($c->id); ?>)" type="button" class="btn btn-warning" data-toggle="modal" data-target="#commentModal">
						<i class="fas fa-edit"></i> Edit
					</button> &nbsp;&nbsp;<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button></form> <?php endif; ?>
				</div>
				</div>
				<?php echo e($c->description); ?>

            
			</td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		
		<tr><td align="center"><?php echo e($topic->comments()->links()); ?></td></tr>
      </table>
      <hr />

		<?php if(! auth()->id() == NULL): ?>
			<fieldset><legend>Add a comment</legend>
			<div class="container bg-light text-danger">
				<?php if($errors->any()): ?> <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php echo e($error); ?>

				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
			</div>
			<form method="POST" action="<?php echo e($topic->id); ?>/comment">
			<?php echo csrf_field(); ?>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" id="description" name="description" rows="3" required></textarea>
				</div>
				  
				<button class="btn btn-primary"><i class="fas fa-share-square"></i> Submit</button>
				</form>
				
			  </div>

			</form>
			</fieldset>

		<?php endif; ?>
		<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editing Topic</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form name="editForm" method="POST" action="<?php echo e($topic->id); ?>/comment">
				<div class="modal-body">
					<?php echo method_field('PATCH'); ?>
					<?php echo csrf_field(); ?>
						
						<input type="hidden" name="eid" id="eid" />
					<div class="form-group">
						<label for="edesc">Edit Description</label>
						<textarea class="form-control" name="edesc" id="edesc" ng-model="edesc" rows="3" required></textarea>
					</div>
				</div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
					<button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save changes</button>
				  </div>
				</form>
			</div>
		  </div>

		</div>
	<script>
	var app = angular.module('editApp', []);
	app.controller('editControls', function($scope) {
	  $scope.populate = function (desc, id)
	  {
		  
		  $scope.edesc = desc;
		  document.getElementById('eid').value = id;
	  }
	});
	</script>


    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\FFXIV-Fansite\resources\views/thread/t-show.blade.php ENDPATH**/ ?>