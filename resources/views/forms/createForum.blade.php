@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Forum Creation</div>
				<p >
					<form method="POST" action="{{route ('forum.store')}}">
					{{ csrf_field() }}

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

@if ($errors->any()) @foreach ($errors->all() as $error)
{{ $error }}
@endforeach @endif

@endsection