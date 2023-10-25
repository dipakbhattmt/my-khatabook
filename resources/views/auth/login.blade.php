@extends('layouts.app')
@section('title')
    {{__('general.login')}}
@endsection
@section('css')
    <style>
        .box {margin-top: 5rem;}  .avatar {margin-top: -70px;padding-bottom: 20px;}  .avatar img {padding: 5px;background: #fff;border-radius: 50%;box-shadow: 0 2px 3px rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.1);}  input {font-weight: 300;}  p {font-weight: 700;}
    </style>
@endsection
@section('content')
    <section class="hero">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="columns is-centered">
                    <div class="column is-4">
                        <div class="box">
                            <figure class="avatar">
                                <img src="{{asset('storage/icons/login.png')}}">
                            </figure>
                            <form class="login-form" method="POST" action="{{ route('login')}}">
                                @csrf
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" type="email" name="email" id="email" placeholder="{{__('general.form-input-email')}}"  value="{{ old('email') }}">
                                    </div>
                                    @if ($errors->has('email'))
                                        <p class="help is-danger">
                                            {{ $errors->first('email') }}
                                        </p>
                                    @endif
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input class="input is-large" type="password" autocomplete="password" placeholder="{{__('general.form-input-password')}}"  name="password">
                                    </div>
                                    @if ($errors->has('password'))
                                        <p class="help is-danger">
                                            {{ $errors->first('password') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="field">
                                    <label class="checkbox">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        {{__('general.remember-me')}}
                                    </label>
                                </div>
                                <button class="button is-block is-info is-large is-fullwidth" type="submit">{{__('general.login')}}</button>
                            </form>
                        </div>
                        <p class="has-text-grey">
                            <a href="{{route('register')}}">{{__('general.register')}}</a>·&nbsp;
                            <a href="{{ route('password.request') }}">{{__('general.forgot-password')}}</a> &nbsp;·&nbsp;
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
