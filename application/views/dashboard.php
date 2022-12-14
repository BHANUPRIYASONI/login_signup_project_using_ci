<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login Page in HTML with CSS Code Example</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/viewProfile.css">
  <!-- <link href= "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
  <link href= "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"  > -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>


</head>


<body>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#" target="_blank">User profile</a>
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="https://demos.creative-tim.com/argon-dashboard/assets-old/img/theme/team-4.jpg" id="upperImage">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold" id="upperName"></span>
                </div>
              </div>
            </a>

          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(https://raw.githubusercontent.com/creativetimofficial/argon-dashboard/gh-pages/assets-old/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white" id="greeting">Hello<span class="subgreeting"></span></h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
            <a href="<?php echo base_url(); ?>editProfile" class="btn btn-info">Edit profile</a>
            <a href="<?php echo base_url(); ?>changePassword" class="btn btn-info">Change Password</a>
            <a href="<?php echo base_url(); ?>logout" class="btn btn-info">Log Out</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <!--<a href="#">  -->
                  <img src="https://demos.creative-tim.com/argon-dashboard/assets-old/img/theme/team-4.jpg" class="rounded-circle" id="userProfilePic">
                  <!--</a>-->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>

              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="userName" class="form-control form-control-alternative" placeholder="Username">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="userEmail">Email address</label>
                        <input type="email" id="userEmail" class="form-control form-control-alternative">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="userFullName">Full name</label>
                        <input type="text" id="userFullName" class="form-control form-control-alternative">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="gender">Gender</label>
                        <input type="text" id="gender" class="form-control form-control-alternative">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control form-control-alternative" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="userCity">City</label>
                        <input type="text" id="userCity" class="form-control form-control-alternative">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="userState">State</label>
                        <input type="text" id="userState" class="form-control form-control-alternative">
                      </div>
                    </div>

                  </div>
                </div>
                <hr class="my-4">

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>

<script>
  getProfile();

  function getProfile() {

    var BASE_URL = "<?php echo base_url(); ?>";
    <?php if (isset($_SESSION['token']) && $_SESSION['token'] != "") { ?>
      var token = '<?php echo $_SESSION["token"]; ?>';
    <?php } else { ?>
      var token = "";
    <?php } ?>

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
        $('#upperName').html(response.user.user_name);
        $('.subgreeting').html(response.user.user_name);
        $("img").attr("src", response.user.profile_picture);
        $('#userName').val(response.user.user_name);
        $('#userEmail').val(response.user.email);
        $('#userFullName').val(response.user.full_name);
        $('#gender').val(response.user.gender);
        $('#input-address').val(response.user.address);
        $('#userCity').val(response.user.city_name);
        $('#userState').val(response.user.state_name);
      },
      error: function(response) {}
    });
  }
</script>