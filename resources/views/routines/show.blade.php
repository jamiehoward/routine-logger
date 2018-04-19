@extends('layouts.blank')

@section('nav')
	<a href="/home" class="back-link">Back</a>
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<routine-detail :routine-id="{{$routineId}}"></routine-detail>
	</div>
</div>
@endsection