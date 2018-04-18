@extends('layouts.app')

@section('content')
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
				<a href="/home">See all routines</a>
			</div>
		</div>
	</div>

	<routine-detail :routine-id="{{$routineId}}"></routine-detail>
@endsection