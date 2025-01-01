@extends('layout/login')

@section('login')
    <section id="signin">
        <div class="container-sm ">
            <div class="logo">
                <h2>Elefthéro</h2><a href="/"><img src="{{ asset('images/Elefthero-bening.png') }}"></a>
            </div>
            <div class="signin-form">
                <form action="/ticket" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Input the e-mail" required
                            class="form-control">
                        @error('email')
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
                    <div class="input-group d-flex justify-content-between">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-me" name="remember-me">
                            <label class="form-check-label" for="remember-me">Remember me!</label>
                        </div>
                        <div>
                            <a href="/admin" class="text-danger">admin click here</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success w-100 mt-3">Sign in</button>
                    <button type="button" class="btn btn-danger w-100 mt-2"
                        onclick="window.location.href='/signin/signup'">Create an account?</button>
                </form>
            </div>
        </div>
    </section>
@endsection
