@extends('templates.page')


@section('title')
<title>Login - Address Book</title>
@stop


@section('header')
<div  class="col-lg-12">
    <h3 class="welcome text-center"><strong>Welcome Admin</strong></h3>
</div>
@stop


@section('content')

<section class="text-center mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title text-center">Address Book Admin Login</div>
        </div>
        <div class="panel-body">
            {{ Form::open(array(
		'url'	 => 'login',
		'action' => 'post',
		'class'	 => 'auth-form form-horizontal',
                'id'     => 'login-form'
	)) }}

            <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-user fa-fw"></span></span>
                {{ Form::input('text', 'username', '', array('required' => true, 'tabindex' => 1, 'class' => 'form-control', 'placeholder' => 'Username')) }}
            </div>

            <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-lock fa-fw"></span></span>
                {{ Form::input('password', 'password', '', array('required' => true, 'tabindex' => 2, 'class' => 'form-control', 'placeholder' => 'Password')) }}
            </div>

            <div class="form-group">
                <div class="col-sm-12 controls">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</section>

@stop


@section('style')
<style>
    body{
        margin-top:5%;
    }
</style>
@stop
