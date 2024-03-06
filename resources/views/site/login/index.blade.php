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
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f4f4f4;
}

.alert-container {
  position: relative;
  max-width: 400px;
  width: 100%;
  padding: 20px;
  background-color: #ff7f7f;
  border: 1px solid #ff4c4c;
  border-radius: 8px;
  color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.close-btn {
  position: absolute;
  top: 10px;
  right: 10px;
  cursor: pointer;
}
</style>
</head>
<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    @if($errors->any())
                    <div class="alert-container" id="danger-alert">
                        <span class="close-btn" onclick="closeAlert()">&times;</span>
                        @foreach($errors->all() as $item)
                        <h5>Error:{{$item}}</h5>
                        @endforeach
                    </div>
                    @endif
                    <img src="{{ asset('global/login/Login_v1/images/img-01.png') }}" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="POST" action="/sesi/login">
                    @csrf
                    <span class="login100-form-title">
                        Member Login
                    </span>


                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        {{-- email --}}
                        <label for="email"> </label>
                        <input class="input100" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>

                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        {{-- password --}}
                        <label for="password"> </label>
                        <input id="password" class="input100" type="password" name="password" placeholder="Password" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="submit">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="#">
                            Username / Password?
                        </a>
                    </div>
                    <div class="text-center p-t-10">
                        <a class="txt5" href="/admin">
                            Admin Panel
                            <i class="fa fa-long-arrow-right m-l-2" aria-hidden="true"></i>
                        </a>
                        <p style="font-size: 14px; margin-top: 10px; color: #777;">ketika klik admin panel: jika sesudah memasukan username dan password admin diarahkan kembali ke halaman users login, maka klik kembali Halaman  Admin Panel</p>
                    </div>
                    <br>
                    <div class="text-center p-t-10">
                        <a class="txt5" href="/home">
                            Login Sebagai Tamu
                            <i class="fa fa-long-arrow-right m-l-2" aria-hidden="true"></i>
                        </a>
                    </div>

                    <div class="text-center p-t-10">
                        <a class="txt2" href="/sesi/register">
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

    <script>
        function closeAlert() {
  var alertContainer = document.getElementById('danger-alert');
  alertContainer.style.display = 'none';
}
    </script>

</body>
</html>
