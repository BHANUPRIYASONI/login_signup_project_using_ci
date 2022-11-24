<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page in HTML with CSS Code Example</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/login.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>


</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="box-form">
        <div class="left">
            <div class="overlay">
                <h1>Zorrior Technology</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Curabitur et est sed felis aliquet sollicitudin</p>

            </div>
        </div>


        <div class="right">
            <h5>Login</h5>
            <p>Don't have an account? <a href="<?php echo base_url() ?>registration">Create Your Account</a> it takes less than a minute</p>
            <form class="loginForm" method="post">
                <div class="inputs">
                    <input type="text" placeholder="Email" id="userEmail" name="userEmail">
                    <br>
                    <input type="password" placeholder="password" id="userPassword" name="userPassword">
                </div>
                <br><br><br>
                <button type="submit" id="submit">Login</button>
            </form>

        </div>

    </div>

</body>

</html>

<script>
    $(".loginForm").validate({
        rules: {
            userEmail: {
                required: true,
            },
            userPassword: {
                required: true,
            },
        },
        messages: {
            userEmail: {
                required: "Please Enter Your Email",
            },
            userPassword: {
                required: "Please Enter Password ",
            },
        },
        submitHandler: function(form) {
            $.ajax({
                url: "<?php echo base_url(); ?>userLoginApi",
                type: 'post',
                dataType: 'json',
                processData: false,
                contentType: false,
                data: new FormData($('.loginForm')[0]),
                success: function(response) {
                    $('#submit').html('Login');
                    $('.loginForm')[0].reset();
                    window.location.href = "<?php echo base_url('dashboard'); ?>";
                },
                error: function(response) {}
            });
        }
    });
</script>