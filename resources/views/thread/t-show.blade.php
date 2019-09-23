@extends('layouts.app')

@section('content')
<div class="container" ng-app="editApp" ng-controller="editControls" >
    <div class="jumbotron">
      
	  <a href="../forum/">Forum Index</a> -> <a href="../forum/{{ $topic->forum()->first()->id }}">{{$topic->forum()->first()->description}}</a> -> {{$topic->name}}
	  <hr />
      <table cellpadding="3" class="container">
      	<tr>
      		<td colspan="2">
				<fieldset>
					<legend>{{$topic->name}}</legend>
					{{$topic->description}}
				</fieldset>
      		</td>
      	</tr>

        @if (count($topic->comments()) == 0) <tr><td colspan="4">This Topic contains no comments</td></tr> @endif

        @foreach ($topic->comments() as $c)
         
        <tr>
            <td valign="top" class=" border-4 border border-dark " height="100px;" style="border-radius:25px;">
				<div class="float-right border border-left-1 border-bottom-1 p-2 bg-secondary text-white" height="100%">
					Posted by <b>{{$c->owner()->name}}</b>, {{$c->created_at->format("m/d/Y g:i a")}}
				<div class="text-right">
				@if (auth()->id() == $c->owner()->id)
				<form method="POST" action="../comment/{{$c->id}}/destroy"> 
				 @csrf 
				 @method('DELETE')
					<button ng-click="populate('{{$c->description}}', {{$c->id}})" type="button" class="btn btn-warning" data-toggle="modal" data-target="#commentModal">
						<i class="fas fa-edit"></i> Edit
					</button> &nbsp;&nbsp;<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button></form> @endif
				</div>
				</div>
				{{$c->description}}
            
			</td>

        </tr>
        @endforeach
		
		<tr><td align="center">{{$topic->comments()->links()}}</td></tr>
      </table>
      <hr />

		@if (! auth()->id() == NULL)
			<fieldset><legend>Add a comment</legend>
			<div class="container bg-light text-danger">
				@if ($errors->any()) @foreach ($errors->all() as $error)
				{{ $error }}
				@endforeach @endif
			</div>
			<form method="POST" action="{{$topic->id}}/comment">
			@csrf
				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" id="description" name="description" rows="3" required></textarea>
				</div>
				  
				<button class="btn btn-primary"><i class="fas fa-share-square"></i> Submit</button>
				</form>
				
			  </div>

			</form>
			</fieldset>

		@endif
		<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editing Topic</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form name="editForm" method="POST" action="{{$topic->id}}/comment">
				<div class="modal-body">
					@method('PATCH')
					@csrf
						
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

@endsection