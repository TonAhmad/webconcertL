@extends('layout/login')
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@section('login')
    <section id="signin">
        <div class="container-sm ">
            <div class="logo">
                <h2>Elefthéro</h2><a href="/"><img src="{{ asset('images/Elefthero-bening.png') }}"></a>
            </div>
            <div class="signin-form">
                <form action="/admin/dashboard" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="username">username</label>
                        <input type="text" id="username" name="username" placeholder="Input username" required
                            class="form-control">
                        @error('username')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Input the Password" required
                            class="form-control">
                        @error('password')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success w-100 mt-3">Sign in</button>
                </form>
            </div>
        </div>
    </section>
@endsection