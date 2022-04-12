@extends('layouts.auth')

@section('content')
<div class="container">
		<div class="my-position">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container d-flex">
						<img src="{{ asset('images/newdeliveboo.png') }}" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="POST" action="{{ route('login') }}">
                        @csrf
                                <div class="row text-center mb-2">
                                    <h3>Accedi all'area ristoratore</h3>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                     <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror my-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                                </div>
                                
                                <div class="input-group mb-2">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror my-input" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- btn login_btn -->
                                    <div class="d-flex justify-content-center mt-3 login_container">
                                        <button type="submit" class="btn login_btn">
                                            {{ __('Accedi') }}
                                        </button>
                                    </div>
                                <div class="mt-4 link">
                                    <div class="d-flex justify-content-center links">
                                        Non hai un account? &nbsp;<a href="/register" class="ml-2">Registrati</a>
                                    </div>
				                </div>        
                            </div>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
<style>
    .user_card {
        height: 400px;
        width: 650px;
        margin-top: auto;
        margin-bottom: auto;
        background: snow;
        position: relative;
        display: flex;
        justify-content: center;
        flex-direction: column;
        padding: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 5px;

    }

    .brand_logo_container {
        position: absolute;
        height: 170px;
        width: 170px;
        top: -75px;
        border-radius: 50%;
        background: snow;
        padding: 10px;
        text-align: center;
        justify-content: center;
        align-items: center;
        border: 7px solid white;
        flex-direction: column
    }

    .brand_logo {
        width: 61%;
    }

    .form_container {
        margin-top: 100px;
    }

    .login_btn {
        width: 100%;
        background: #c0392b !important;
        color: white !important;
    }

    .login_btn:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }

    .login_container {
        /* padding: 0 2rem; */
    }

    .input-group-text {
        background: #c0392b !important;
        color: white !important;
        border: 0 !important;
        border-radius: 0.25rem 0 0 0.25rem !important;
        height: 100%;
    }

    .input_user,
    .input_pass:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }

    .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
        background-color: #c0392b !important;
    }

    .my-input {
        width: 450px !important;
    }

    .link a {
        color: #c0392b;
        font-weight: 700;
    }

    .link a:hover,
    .link a:focus {
        color: white;
    }

    .my-position {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

</style>
