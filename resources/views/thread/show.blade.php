@extends('layouts.app')

@section('content')
<div class="container"  ng-app="editApp" ng-controller="editControls" >
    <div class="jumbotron">
      
	  
	  <a href="../forum/">Forum Index</a> -> {{$forum->description}}
	  <hr />
	  <div class="float-right">Results: {{ count($forum->topics()) }}</div>
      <table class="container" cellpadding="3px">
      	<tr>
      		<td colspan="4">
      			<h3><u>{{$forum->description}}</u></h3>
      		</td>
      	</tr>
		<tr>
			<td>
				<strong>Description</strong>
			</td>
			<td align="center">
				<strong><i class="fas fa-user"></i></strong>
			</td>
			<td align="center">
				<strong><i class="fas fa-calendar-alt"></i></strong>
			</td>
		</tr>
        @if (count($forum->topics()) == 0) <tr><td colspan="4">This Forum contains no topics</td></tr> @endif

        @foreach ($forum->topics() as $i => $t)
		
         @php $class = $i % 2 === 0 ? 'evenrow' : 'oddrow'; @endphp
        <tr class="{{ $class }}">
            <td width="50%">
              <a href="../topic/{{$t->id}}">{{$t->name }}</a><br />
			  <span style="font-size:12px;">
			  {{$t->commentCount()}} Comments
			  </span>
            </td>
			<td align="center">
				 {{ $t->owner()->name }}
			</td>
			<td style="border-left:1px solid black; text-align:center;">
			{{$t->created_at->format("m/d/Y g:i a")}}
			</td>
			
			<td align="center">
				@if (auth()->id() == $t->owner()->id)
					<form method="POST" action="../topic/{{$t->id}}/destroy">
					@csrf
					@method('DELETE')
					<button ng-click='populate ("{{$t->name}}", "{{$t->description}}", "{{ $t->id }}")' type="button" class="btn btn-warning" data-toggle="modal" data-target="#commentModal">
						<i class="fas fa-edit"></i> Edit
					</button> &nbsp; <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button></form>
					@endif
			</td>
        </tr>
        @endforeach
		
		<tr>
			<td>
			{{$forum->topics()->links()}}
			</td>
		</tr>
      </table>
      <hr />


		<!-- Topic Modal -->
		<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editing Topic</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form name="editForm" method="POST" action="{{$forum->id}}/topic">
				<div class="modal-body">
					@method('PATCH')
					@csrf
					
					<div class="form-group">
						
						<input type="hidden" name="eid" id="eid" />
						
						<label for="etitle">Edit Title</label>
						<input type="text" class="form-control" name='etitle' id="etitle" ng-model="etitle" placeholder="" required>
					</div>
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



@if (!auth()->id() == NULL )
		<fieldset><legend>Add a Topic</legend>
		<form method="POST" action="{{$forum->id}}/topic">
		@csrf
			<div class="container bg-light text-danger">
			@if ($errors->any()) @foreach ($errors->all() as $error)
			{{ $error }}<br />
			@endforeach @endif
			</div>
		  <div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="title" name="name" placeholder="Something pertaining to the current forum..." required>
		  </div>


		  <div class="form-group">
			<label for="description">Description</label>
			<textarea class="form-control" id="description" name="description" rows="3" required></textarea>
		  </div>
		  
		  <button class="btn btn-primary"><i class="fas fa-share-square"></i> Submit</button>
		</form>
		</fieldset>
@endif
		<script>
		var app = angular.module('editApp', []);
		app.controller('editControls', function($scope) {
		  $scope.populate = function (name, desc, id)
		  {
			  
			  $scope.etitle = name;
			  $scope.edesc = desc;
			  document.getElementById('eid').value = id;
		  }
		});
		</script>

    </div>

</div>

@endsection