@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="justify-content-center">
        <div class="container-fluid">
            <div class="col">
                @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="text-md-right">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection
