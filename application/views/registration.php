<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <!---<title> Responsive Registration Form | CodingLab </title>--->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/registration.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/common.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    .error {
      color: red;
    }
  </style>


</head>

<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form class="registrationForm" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="userFullName" id="userFullName" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="userName" id="userName" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="userEmail" id="userEmail" required>
          </div>
          <div class="input-box">
            <span class="details">City Name</span>
            <input type="text" placeholder="Enter your City" name="userCity" id="userCity" required>
          </div>
          <div class="input-box">
            <span class="details">State Name</span>
            <input type="text" placeholder="Enter your State" name="userState" id="userState" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" placeholder="Enter your Address" name="userAddress" id="userAddress">
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="userPassword" id="userPassword" required>
          </div>

          <div class="input-box">
            <span class="details">Profile Picture</span>
            <input class="file-upload-input" type='file' accept="image/*" id="userProfilePic" name="userProfilePic" />
          </div>
          <!-- <button class="btn btn-primary" type="button"></button> -->
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="Male">
          <input type="radio" name="gender" id="dot-2" checked="checked" value="Female">
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
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>

</html>

<script>

  $(".registrationForm").validate({
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
      userPassword: {
        required: true,
      },
      userProfilePic: {
        required: true,
        fileType: true,
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
      userPassword: {
        required: "Please enter User Password",
      },
      userProfilePic: {
        required: "Please enter User Profile Picture",
        fileType:"Only jpg,jpeg,png files allowed",
      },
      gender: {
        required: "Please enter User Gender",
      },
    },
    submitHandler: function(form) {
      $.ajax({
        url: "<?php echo base_url(); ?>userRegisterApi",
        type: 'post',
        dataType: 'json',
        processData: false,
        contentType: false,
        data: new FormData($('.registrationForm')[0]),
        success: function(response) {
          $('#submit').html('Login');
          $('.registrationForm')[0].reset();
          window.location.href = "<?php echo base_url(); ?>";
        },
        error: function(response) {}
      });
    }
  });
</script>