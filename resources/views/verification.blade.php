<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #message_error, #message_success {
            margin-bottom: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        .time {
            font-size: 18px;
            margin-bottom: 10px;
        }

        #resendOtpVerification {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <p id="message_error" style="color:red;"></p>
    <p id="message_success" style="color:green;"></p>
    <form method="post" id="verificationForm" action="{{ route('verifiedOtp') }}">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="number" name="otp" placeholder="Enter OTP" required>
        <br><br>
        <button type="submit">Verify</button>
    </form>

    <p class="time"></p>

    <button id="resendOtpVerification">Resend Verification OTP</button>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        // $('#verificationForm').submit(function (e) {
        //     e.preventDefault();

        //     var formData = $(this).serialize();

        //     $.ajax({
        //         url: "{{ route('verifiedOtp') }}",
        //         type: "POST",
        //         data: formData,
        //         success: function (res) {
        //             if (res.success) {
        //                 alert(res.msg);
        //                 window.open("/", "_self");
        //             } else {
        //                 $('#message_error').text(res.msg);
        //                 setTimeout(() => {
        //                     $('#message_error').text('');
        //                 }, 3000);
        //             }
        //         }
        //     });
        // });

        $('#resendOtpVerification').click(function () {
            $(this).text('Wait...');
            var userMail = @json($email);

            $.ajax({
                url: "{{ route('resendOtp') }}",
                type: "GET",
                data: {email: userMail},
                success: function (res) {
                    $('#resendOtpVerification').text('Resend Verification OTP');
                    if (res.success) {
                        timer();
                        $('#message_success').text(res.msg);
                        setTimeout(() => {
                            $('#message_success').text('');
                        }, 3000);
                    } else {
                        $('#message_error').text(res.msg);
                        setTimeout(() => {
                            $('#message_error').text('');
                        }, 3000);
                    }
                }
            });
        });
    });

    function timer() {
        var seconds = 30;
        var minutes = 1;

        var timer = setInterval(() => {
            if (minutes < 0) {
                $('.time').text('');
                clearInterval(timer);
            } else {
                let tempMinutes = minutes.toString().length > 1 ? minutes : '0' + minutes;
                let tempSeconds = seconds.toString().length > 1 ? seconds : '0' + seconds;

                $('.time').text(tempMinutes + ':' + tempSeconds);
            }

            if (seconds <= 0) {
                minutes--;
                seconds = 59;
            }

            seconds--;

        }, 1000);
    }

    timer();
</script>
</body>
</html>
