<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{__('Login')}}</title>
    <!--bootstrap-->
    <link rel="stylesheet" href="{{asset('login/bootstrap.min.css')}}" />
    <!--font family-->
    <link href="{{asset('login/ins2wgm.css')}}" rel="stylesheet">
    <!--sweetalert2-->
    <link href="{{asset('master/docs/css/sweetalert2.min.css')}}" rel="stylesheet">
    <!--custom style-->
    <link rel="stylesheet" href="{{asset('login/style.css')}}">
</head>

<body>
    <div class="container">
        <div class="box">
            <input type="checkbox" id="toggle" class="box__toggle" hidden>
            <img src="{{asset('logo/unsplash-bike.jpeg')}}" alt="Picture by Autumn Studio" class="box__image">
            <form class="form form--register" autocomplete="off">
                @if(session('message'))
                <div class="alert alert-danger alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Thông báo !! {{session('message')}}
                </div>
                @endif
                <img src="{{asset('logo/3062634.svg')}}" class="box__image_logo" />
                <div class="form-group">
                    <label class="form__label" for="email">{{__('Email')}}</label>
                    <input type="email" name="email_forgot" id="email-forgot" placeholder="Email" class="form-control" />
                </div>
                <button type="button" class="btn form__button">{{__('Send')}}</button>
                <p class="form__text">{{__('Already')}}? <label for="toggle" onClick="onFocusForgot();"
                        class="form__link">{{__('Here')}}!</label>
            </form>
            <form class="form form--login" action="" method="post" autocomplete="off">
                {{CsrfTokenUtil::csrfToken()}}
                <img src="{{asset('logo/1150626.svg')}}" class="box__image_logo" />
                @if($errors->has('auth-failed'))
                <p class="text-danger error-msg">
                    {{$errors->first('auth-failed')}}
                </p>
                @endif
                <div class="form-group">
                    <label class="form__label" for="user">{{__('Email')}}</label>
                    <input type="text" name="email" id="email" placeholder="Email" class="form-control" />
                    @if($errors->has('email'))
                    <span class="text-danger error-msg">
                        {{$errors->first('email')}}
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="form__label" for="password">{{__('Password')}}</label>
                    <input type="password" name="password" placeholder="Password" class="form-control" />
                    @if($errors->has('password'))
                    <span class="text-danger error-msg">
                        {{$errors->first('password')}}
                    </span>
                    @endif
                </div>
                <button type="submit" class="btn form__button" onclick="return showStuff(event);">{{__('Login')}}</button>
                <p class="form__text">{{__('Forgot password')}}? <label for="toggle" onClick="onFocusLogin();"
                        class="form__link">{{__('Here')}}!</label>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('email').focus()
		function onFocusForgot() {
			document.getElementById('email').focus()
		}
		function onFocusLogin() {
			document.getElementById("email-forgot").focus()
        }
    </script>
    @include('sweet::alert')
</body>

</html>
