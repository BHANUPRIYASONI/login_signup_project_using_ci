<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>small change password form - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/changePassword.css">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <style>
        .error {
            color: red;
        }
    </style>


</head>

<body>
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <span class="glyphicon glyphicon-th"></span>
                            Change password
                        </h3>
                    </div>
                    <form class="changePasswordForm" method="post">
                        <div class="panel-body">

                            <div class="row ">
                                <div class="col-xs-6 col-sm-6 col-md-6 separator social-login-box"> <br>
                                    <img alt="" class="img-thumbnail" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                                </div>
                                <div style="margin-top:80px;" class="col-xs-6 col-sm-6 col-md-6 login-box">
                                    <div class="form-group ">
                                        <div class="input-group">
                                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                            <input class="form-control" type="password" placeholder="Current Password" id="oldPassword" name="oldPassword">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><span class="glyphicon glyphicon-log-in"></span></div>
                                            <input class="form-control" type="password" placeholder="New Password" id="newPassword" name="newPassword">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><span class="glyphicon glyphicon-log-in"></span></div>
                                            <input class="form-control" type="password" placeholder="Confirm Password" id="confirmPassword" name="confirmPassword">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6"></div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <button class="btn icon-btn-save btn-success" type="submit">
                                        <span class="btn-save-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    $(".changePasswordForm").validate({
        rules: {
            oldPassword: {
                required: true,
            },
            newPassword: {
                required: true,
            },
            confirmPassword: {
                required: true,
                equalTo: '#newPassword',
            },
        },
        messages: {
            oldPassword: {
                required: "Please enter old Password",
            },
            newPassword: {
                required: "Please enter new Password",
            },
            confirmPassword: {
                required: "Please confirm the Password",
                equalTo: "confirm password is not matched",
            },
        },
        submitHandler: function(form) {

            var BASE_URL = "<?php echo base_url(); ?>";
            <?php if (isset($_SESSION['token']) && $_SESSION['token'] != "") { ?>
                var token = '<?php echo $_SESSION["token"]; ?>';
            <?php } else { ?>
                var token = "";
            <?php } ?>

            $.ajax({
                url: BASE_URL + "changePasswordApi",
                type: 'post',
                dataType: 'json',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                headers: {
                    Authorization: token,
                },
                data: new FormData($('.changePasswordForm')[0]),
                success: function(response) {
                    $('#btn icon-btn-save btn-success').html();
                    $('.changePasswordForm')[0].reset();
                    window.location.href = BASE_URL + "dashboard";
                },
                error: function(response) {}
            });
        }
    });
</script>