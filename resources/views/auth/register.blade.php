@extends('layouts.auth')

@section('content')
    <!-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Activity Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="iva" class="col-md-4 col-form-label text-md-right">{{ __('P.Iva') }}</label>

                                <div class="col-md-6">
                                    <input id="iva" type="text" class="form-control @error('iva') is-invalid @enderror"
                                        name="iva" value="{{ old('iva') }}" required autocomplete="iva" autofocus>

                                    @error('iva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <fieldset class="mb-3">
                                <legend>Categories</legend>
                                @foreach ($categories as $category)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $category->id }}"
                                            name="categories[]"
                                            {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </fieldset>
                            <div id="message"></div>
                            @error('categories')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" id="register-button" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="container">
		<div class="my-position">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container d-flex">
						<img src="{{ asset('images/newdeliveboo.png') }}" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="POST" action="{{ route('register') }}">
                        @csrf
                                <div class="row text-center mb-2">
                                    <h3>Registrati all'area ristoratore</h3>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa-solid fa-pizza-slice"></i></span>
                                    </div>
                                     <input placeholder="Nome del Ristorante" id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                                    </div>
                                    <input placeholder="Indirizzo" id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa-solid fa-sack-dollar"></i></span>
                                    </div>
                                    <input placeholder="Partita Iva" id="iva" type="text" class="form-control @error('iva') is-invalid @enderror"
                                        name="iva" value="{{ old('iva') }}" required autocomplete="iva" autofocus>

                                    @error('iva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <fieldset class="mb-3">
                                <h5>Seleziona una o più categorie:</h5>
                                <div class="d-flex">
                                    @foreach ($categories as $category)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $category->id }}"
                                            name="categories[]"
                                            {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $category->name }} &nbsp;
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </fieldset>
                            <div id="message"></div>
                            @error('categories')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa-solid fa-at"></i></span>
                                    </div>
                                    <input placeholder="E-mail" id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input placeholder="Inserisci una password" id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa-solid fa-square-check"></i></span>
                                    </div>
                                    <input placeholder="Conferma password" id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>


                                <!-- btn login_btn -->
                                    <div class="d-flex justify-content-center mt-3 login_container">
                                        <button type="submit" class="btn login_btn">
                                            {{ __('Registrati') }}
                                        </button>
                                    </div>
                                <div class="mt-4 link">
                                    <div class="d-flex justify-content-center links">
                                        Hai già un account? &nbsp;<a href="/login" class="ml-2">Accedi</a>
                                    </div>
				                </div>        
                            </div>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
    <script>
            window.onload = () => {
                let checkboxes = document.querySelectorAll('input[type=checkbox]');
                let message = document.getElementById('message');
                let register = document.getElementById('register-button');
    
                checkboxes.forEach(function (checkbox){
                    checkbox.addEventListener('click', function(){
                        message.innerHTML = ''; 
                    });
                });
                
                register.addEventListener('click', function (){
                    let atLeastOneChecked = false; 
                    checkboxes.forEach(checkbox => {
                        if(checkbox.checked){
                            atLeastOneChecked = true;
                        }
                    })
                    if(!atLeastOneChecked){
                        event.preventDefault();
                        return message.innerHTML = `<div class="alert alert-danger mt-3" role="alert"> Scelgi almeno una categoria </div>`;
                    }
                });
            }
    </script>
@endsection
<style>
    .user_card {
			height: 700px;
			width: 700px;
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
        .my-input{
            width: 450px !important;
        }
        .link a{
            color: #c0392b;
            font-weight: 700;
        }
        .link a:hover,
        .link a:focus {
            color: white;
        }
        .my-position{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
</style>