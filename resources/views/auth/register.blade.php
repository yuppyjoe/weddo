@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.new') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-8">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control auth-input validate email">
                                <div class="response valid-feedback">
                                    Looks Good!
                                </div>
                            </div>
                            <div class="form-group col-8">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control auth-input validate username">
                                <div class="response valid-feedback">
                                    Looks Good!
                                </div>
                            </div>
                            <div class="form-group col-8">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control auth-input validate password">
                                <div class="response valid-feedback">
                                    Looks Good!
                                </div>
                            </div>
                            <div class="form-group col-8">
                                <label for="password-confirm">Confirm Password</label>
                                <input type="password" id="password-confirm" name="password-confirm" class="form-control auth-input validate password-confirm">
                                <div class="response valid-feedback">
                                    Looks Good!
                                </div>
                            </div>
                            <div class="form-group col-8">
                                <button type="submit" disabled id="register" class="btn btn-primary d-block position-relative">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src={{asset('js/auth/validations.js')}}></script>
<script src={{asset('js/auth/changes.js')}}></script>
<script src={{asset('js/auth/ajaxCalls.js')}}></script>
@endsection
