<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Edit profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/editProfile.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/registration.css">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <style>
        .error {
            color: red;
        }
    </style>

</head>

<body>
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="" id="previewProfilePic">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG not larger than 5 MB</div>
                        <!-- Profile picture upload button-->

                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form class="editProfileForm" method="post">
                            <button class="btn btn-primary" type="button">
                                <input class="file-upload-input error-replace" type='file' onclick="getImage()" accept="image/*" id="userProfilePic" name="userProfilePic" />
                            </button>
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="userName">Username (how your name will appear to other users on the site)</label>
                                <input class="form-control" id="userName" type="text" placeholder="Enter your username" name="userName">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="userFullName">Full name</label>
                                    <input class="form-control" id="userFullName" name="userFullName" type="text" placeholder="Enter your full name">
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="userEmail">Email</label>
                                    <input class="form-control" id="userEmail" name="userEmail" type="email" placeholder="Enter your email">
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="userCity">City</label>
                                    <input class="form-control" id="userCity" name="userCity" type="text" placeholder="Enter your city">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="userState">State</label>
                                    <input class="form-control" id="userState" name="userState" type="text">
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="userAddress">Address</label>
                                <input class="form-control" id="userAddress" name="userAddress" type="text">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <div class="gender-details">
                                    <input type="radio" name="gender" id="dot-1" value="Male">
                                    <input type="radio" name="gender" id="dot-2" value="Female">
                                    <input type="radio" name="gender" id="dot-3" value="no">
                                    <span class="gender-title">Gender</span>
                                    <div class="category">
                                        <label for="dot-1">
                                            <span class="dot one"></span>
                                            <span class="gender">Male</span>
                                        </label>
                                        <label for="dot-2">
                                            <span class="dot two"></span>
                                            <span class="gender">Female</span>
                                        </label>
                                        <label for="dot-3">
                                            <span class="dot three"></span>
                                            <span class="gender">Prefer not to say</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>

var BASE_URL = "<?php echo base_url(); ?>";
            <?php if (isset($_SESSION['token']) && $_SESSION['token'] != "") { ?>
                var token = '<?php echo $_SESSION["token"]; ?>';
            <?php } else { ?>
                var token = "";
            <?php } ?>


getProfile();

    function getProfile()
    {
        $.ajax({
        url: BASE_URL + "getProfileApi",
        type: 'get',
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        headers: {
            Authorization: token,
        },
        success: function(response) {
            $("img").attr("src", response.user.profile_picture);
            $('#userName').val(response.user.user_name);
            $('#userEmail').val(response.user.email);
            $('#userFullName').val(response.user.full_name);
            if(response.user.gender == "Male"){
            $("#dot-1").prop("checked", true);
            }
            else if(response.user.gender == "Female"){
            $("#dot-2").prop("checked", true);
            }
            else{
            $("#dot-3").prop("checked", true);
            }
            $('#userAddress').val(response.user.address);
            $('#userCity').val(response.user.city_name);
            $('#userState').val(response.user.state_name);
        },
        error: function(response) {}
        });
    }



    $(".editProfileForm").validate({
        rules: {
            userFullName: {
                required: true,
            },
            userName: {
                required: true,
                remote: {          // -------- Name Remote Validation --------  //
                url: "<?php echo base_url(); ?>nameValidationApi",
                type: "post",
                userName: function() {
                    return $("#userName").val();
                },
              },
            },
            userEmail: {
                required: true,
                remote: {        // -------- Email Remote Validation --------  //
                url: "<?php echo base_url(); ?>emailValidationApi",
                type: "post",
                userEmail: function() {
                    return $("#userEmail").val();
                },
              },
            },
            userCity: {
                required: true,
            },
            userState: {
                required: true,
            },
            userAddress: {
                required: true,
            },
            userProfilePic: {
                required: true,
            },
            gender: {
                required: true,
            },
        },
        messages: {
            userFullName: {
                required: "Please enter Full Name",
            },
            userName: {
                required: "Please enter User Name",
                remote: "This user is already exist.",
            },
            userEmail: {
                required: "Please enter User Email",
                remote: "This email is already exist.",
            },
            userCity: {
                required: "Please enter User City",
            },
            userState: {
                required: "Please enter User State",
            },
            userAddress: {
                required: "Please enter User Address",
            },
            userProfilePic: {
                required: "Please enter User Profile Picture",
            },
            gender: {
                required: "Please enter User Gender",
            },
        },
        submitHandler: function(form) {
            $.ajax({
                url: BASE_URL + "userEditProfileApi",
                type: 'post',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                headers: {
                    Authorization: token,
                },
                data: new FormData($('.editProfileForm')[0]),
                success: function(response) {
                    $('#btn btn-primary').html();
                    $('.editProfileForm')[0].reset();
                    window.location.href = BASE_URL + "dashboard";
                },
                error: function(response) {}
            });
        }
    });


    function getImage()
    {
    $('#userProfilePic').change(function(){
        const file = this.files[0];
        console.log(file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('#previewProfilePic').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
    }
    


</script>