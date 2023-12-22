@extends('layouts/mainLogin')

@section('container')
<form action="/register" method="post" class="login-email">
    @csrf
    <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
    <div class="input-group">
        <input type="text" placeholder="Name" name="name" value="" required>
    </div>
    <div class="input-group">
        <input type="email" placeholder="Email" name="email" value="" required>
    </div>
    <div class="input-group">
        <input type="password" placeholder="Password" name="password" value="" required>
    </div>
    <div class="input-group">
        <input type="password" placeholder="Confirm Password" name="cpassword" value="" required>
    </div>
    <div class="input-group">
        <button type="submit" class="btn">Register</button>
    </div>
    <p class="login-register-text">Have an account? <a href="/login">Login Here</a>.</p>
</form>
@endsection