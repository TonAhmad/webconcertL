@extends('layout/login')

@section('login')
    <section id="signup">
        <div class="signup-container">
            <h2>Sign Up</h2>
            <form>
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your full name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter your password">
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" placeholder="Confirm your password">
                </div>
                <button type="submit" class="btn btn-signup" onclick="window.location.href='/signin'">Sign Up</button>
                <div class="login-link">
                    <p>Already have an account? <a href="/signin">Log In</a></p>
                </div>
            </form>
        </div>
    </section>
@endsection
