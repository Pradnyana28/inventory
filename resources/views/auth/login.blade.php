@extends('layouts.singlepage')

@section('page-title', 'Login')

@section('content')
<div class="container">
    <div class="page-wrapper m-0 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-12">
                <div class="card border-0">
                    <div class="card-body p-0">
                    <form method="POST" class="form bordered-input" action="{{ route('login') }}">
                        @csrf
                    <div class="p-30 pb-0">

                        <div class="form-group m-t-20 row">
                            <div class="col-12">
                                {{ session('status') }}
                                <label for="example-search-input"
                                        class="col-form-label font-12 text-primary">{{ __('E-Mail Address') }}</label>
                                <input class="form-control pl-0 font-12{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        type="email" placeholder="email" name="email" value=""
                                        required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group m-t-20 row">
                            <div class="col-12">
                                <label for="example-search-input"
                                        class="col-form-label font-12 text-primary">{{ __('Password') }}</label>
                                <input class="form-control pl-0 font-12{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        type="password" placeholder="password" name="password" value=""
                                        required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="form-group row m-b-10">
                            <div class="col-12">
                                <button type="submit" class="btn btn-rounded btn-primary m-b-20 waves-effect waves-light btn-block">
                                    Login
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection