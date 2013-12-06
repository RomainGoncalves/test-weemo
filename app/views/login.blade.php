@extends('master')
<h1>Login</h1>
{{ Form::open() }}

	{{ Form::input('text', 'username', '');}}

	{{ Form::button('Login', array('class' => 'btn btn-primary')); }}

{{ Form::close() }}