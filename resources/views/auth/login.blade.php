@extends('layout.auth.authLayout')

@section('title')
Kusina Grasya | Login
@endsection

@section('authContent')
    <div class="wrapper">
        <div class="page-wrapper">
            <div class="photo-wrapper">
                <img src="{{ url('/login-logo.jpg') }}" alt="">
            </div>
            <div class="login-wrapper">

                <div class="card" style="height: 350px;">
                    <div class="card-body login-card-body">
                        <h4 class="login-box-msg">Kusina Grasya</h4>

                        @if (session('error'))
                            <div class="alert alert-danger pb-0">
                                <p>Hmmm, credentials not valid!</p>
                            </div>
                        @else
                            <p class="text-center">Sign in to continue</p>
                        @endif
                        @if (session('updatedMsg'))
                            <div class="alert alert-success pb-0">
                                <p>{{ session('updatedMsg') }}</p>
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="input-group mb-3">

                                @if (isset($reservation))
                                    <input type="hidden" name="payment" value="{{ $reservation->id }}">
                                @endif

                                <input type="email" class="form-control" placeholder="Email" name="email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block btn btn-sm">Sign In</button>
                                </div>

                            </div>
                        </form>
                        <p class="mb-0 text-center">
                            <a href="{{ url('/register') }}" class="text-center">Register a new membership</a>
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection


<style>
    .wrapper {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .page-wrapper {
        width: 60%;
        height: 250px;
        display: flex;
    }

    .photo-wrapper img {
        width: 100%;
        height: 350px;
    }

    .photo-wrapper,
    .login-wrapper {
        width: 50%;
    }

    @media (max-width: 1100px) {
        .page-wrapper {
            width: 70%;
        }

    }

    @media (max-width: 900px) {
        .page-wrapper {
            width: 80%;
        }

    }

    @media (max-width: 700px) {
        .page-wrapper {
            width: 90%;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .photo-wrapper,
        .login-wrapper {
            width: 70%;
        }
    }

    @media (max-width: 700px) {
        .page-wrapper {
            width: 100%;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .photo-wrapper,
        .login-wrapper {
            width: 90%;
        }
        .photo-wrapper img {
        width: 100%;
        height: 200px;
    }
    }
</style>
