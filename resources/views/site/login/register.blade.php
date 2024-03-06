 <!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('global/login/Login_v1')}}/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('global/login/Login_v1')}}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('global/login/Login_v1')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('global/login/Login_v1')}}/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('global/login/Login_v1')}}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('global/login/Login_v1')}}/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('global/login/Login_v1')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('global/login/Login_v1')}}/css/main.css">
<!--===============================================================================================-->
<style>
    .kembali{
        width: 8vh;
        position: absolute;
        left: 390px;
        bottom: 85vh;

    }
</style>
</head>
<body>
    <div class="limiter">
        <div class="container-login100">

               <a href='/login'>
                    <img class="kembali" src="{{asset('global/landingpage/images/kembali.png')}}" alt="">
               </a>

            <div>

            </div>
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('global/login/Login_v1/images/img-01.png') }}" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="POST" action="/sesi/create">
                    @csrf
                    <span class="login100-form-title">
                        Register
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        {{-- name --}}
                        <label for="name"></label>
                        <input class="input100" type="text" name="name" placeholder="Name" value="{{ Session::get('name') }}" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        {{-- email --}}
                        <label for="email"></label>
                        <input class="input100" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Nomor is required">
                        {{-- nomor --}}
                        <label for="nomor"></label>
                        <input id="nomor" class="input100" type="text" name="nomor" placeholder="Nomor" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        {{-- password --}}
                        <label for="password"></label>
                        <input id="password" class="input100" type="password" name="password" placeholder="Password" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Role is required">
                        {{-- role --}}
                        <label for="role"></label>
                        <input id="role" class="input100" type="text" name="role" placeholder="Role" value="user" readonly required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                        <p style="font-size: 14px; margin-top: 10px; color: #777;">ini hanya default user</p>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="submit">
                            Register
                        </button>
                    </div>



                    <div class="text-center p-t-136">
                        <a class="txt2" href="#">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>



<!--===============================================================================================-->
	<script src="{{asset('global/login/Login_v1')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('global/login/Login_v1')}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{asset('global/login/Login_v1')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('global/login/Login_v1')}}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('global/login/Login_v1')}}/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset('global/login/Login_v1')}}/js/main.js"></script>

</body>
</html>
