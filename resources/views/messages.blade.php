@extends('layouts.app')

@section ('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			Messages ({{count ($messages) }})
		</div>
		
		<div class="container-fluid">
			<table width="100%">
			@if (count ($messages) == 0)
				<tr>
					<td>
						You have no new messages.
					</td>
				</tr>
			@endif
			</table>
			<div class="accordion" id="messageAccordion">
			@foreach ($messages as $m)
			
			<div class="card" @if ($m->read == "read") style="background-color:#D8D8D8;" @endif>
				<div class="card-header" id="heading{{$m->id}}">
					<h2 class="mb-0">
					<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$m->id}}" aria-expanded="true" aria-controls="collapse{{$m->id}}">
						<div class="float-left text-dark">Sender: <strong>{{$m->from()->name}}</strong></div>
						<br /><span class="text-dark">{{$m->subject}}</span>
					</button>
					</h2>
				</div>
					
				<div id="collapse{{$m->id}}" class="collapse" aria-labelledby="heading{{$m->id}}" data-parent="#messageAccordion">
					<div class="card-body">
						<p>{{$m->description}}</p>
						{{$m->created_at->format("m/d/Y g:i a")}}<br />
									<hr />
						<span class="float-right p-3">
							<form action="message/{{$m->id}}" method="post">
								@csrf @method('DELETE')
								<button class="btn btn-danger"  type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
							</form>
						</span>
						<span class="float-right p-3">
							<form action="message/{{$m->id}}" method="post">@csrf @method('PATCH')
								<button class="btn btn-primary" type="submit">@if ($m->read == 'read')
									<strong><i class="fas fa-envelope-open-text"></i> Seen @else <i class="fas fa-envelope-square"></i> Unseen @endif</strong></button>
							</form>
						</span>
					</div>
				</div>
			</div>

			@endforeach
			
	@if ($errors->any()) @foreach ($errors->all() as $error)
	{{ $error }}
	@endforeach @endif
			</div>
		</div>
		
		<div class="container-fluid text-right p-4">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
				<i class="fas fa-sticky-note"></i> Create Message
			</button>
		</div>
	@if ($errors->any()) @foreach ($errors->all() as $error)
	{{ $error }}
	@endforeach @endif
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
	  

@csrf

  <div class="form-group">
    <label for="to">To</label>
    <select class="form-control" id="to" name="to" required>
		
      @foreach ($users as $u)
		<option value="{{$u->id}}">{{$u->name}}</option>
	  @endforeach
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
      @include ('errors')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
    </div>
  </div>
</div>
</form>
@endsection