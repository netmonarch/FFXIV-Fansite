@extends('layouts.app')

@section('content')
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
		
        @foreach ($forums as $i => $f)
		
		@php $class = $i % 2 === 0 ? 'evenrow' : 'oddrow'; @endphp
          <tr class="{{ $class }}">
            <td>
				<div class="float-right text-sm">
					 <h6>
						<span class="badge badge-secondary text-left p-2">
							Topics: {{ count ($f->topicCount()->get() ) }}<br />
							Comments: 
							@php
								$cCount = 0;
								foreach ($f->topicCount()->get() as $topic)
								{
									$cCount += $topic->commentCount();
								}
								echo $cCount;
							@endphp
						</span>
					 </h6>	
				</div>
              <a href="forum/{{$f->id}}">{{ $f->description }}</a>
            </td>
          </tr>
        @endforeach
        <tr>
		
        </tr>

      </table>
      

    </div>

</div>

@endsection
