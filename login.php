<?php
  include('app/Controllers/Users.php'); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Surelle Support</title>
    <?php include_once("app/Views/page-header.php"); ?>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0" >
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <?php if(getSystemElementStatus($conn, 'Maintenance')){ ?>
                  <h3 class="card-title text-left mb-3">Maintenance</h3>
                  <code class='p-3'>At the moment, SurelleSupport is undergoing maintenance to enhance its performance and functionality. Users can look forward to exciting new features and improvements once the updates are complete. Stay tuned for the upgraded version of SurelleSupport, which will bring an enhanced user experience and a wider range of capabilities to assist you better.</code>
                <?php }else{ ?>
                  <h3 class="card-title text-left mb-3">Login</h3>
                  <script> var url = new URL(window.location.href); var code = url.searchParams.get("passwordChanged"); if(code == "1"){ document.write('<p style="padding: 10px; background-color: white; color:green;">Password has been changed.</p>') } </script>
                  <script> var url = new URL(window.location.href); var code = url.searchParams.get("succ"); if(code == "501"){ document.write('<p style="padding: 10px; background-color: white; color:green;">Registered. Check your email address to verify your account.</p>') } </script>
                  <script> var url = new URL(window.location.href); var code = url.searchParams.get("err"); if(code == "502"){ document.write('<p style="padding: 10px; background-color: white; color:red;">Account not verified.</p>') } </script>
                  <script> var url = new URL(window.location.href); var code = url.searchParams.get("succ"); if(code == "503"){ document.write('<p style="padding: 10px; background-color: white; color:green;">Account is now verified.</p>') } </script>
                  <script> var url = new URL(window.location.href); var code = url.searchParams.get("err"); if(code == "403"){ document.write('<p style="padding: 10px; background-color: white; color:red;">Incorrect Email or Password</p>') } </script>
                  <script> var url = new URL(window.location.href); var code = url.searchParams.get("err"); if(code == "401"){ document.write('<p style="padding: 10px; background-color: white; color:red;">Server is down.</p>') } </script>
                  <script> var url = new URL(window.location.href); var code = url.searchParams.get("err"); if(code == "404"){ document.write('<p style="padding: 10px; background-color: white; color:red;">Account is blocked.</p>') } </script>
                  <script> var url = new URL(window.location.href); var code = url.searchParams.get("err"); if(code == "333"){ document.write('<p style="padding: 10px; background-color: white; color:red;">Invalid Captcha. Prove you\'re not a robot.</p>') } </script>
                  <script> var url = new URL(window.location.href); var code = url.searchParams.get("maintenance"); if(code == "true"){ document.write('<p style="padding: 10px; background-color: white; color:red;">Portal is currently under maintenance</p>') } </script>
                  
                  <?php if(getSystemElementStatus($conn, 'Login')){ ?>
                  <form method="POST">
                    <div class="form-group">
                      <?php $last = decrypt($_GET['lastuse'], $encryptionKey);?>
                      <label>Username or email *</label>
                      <input type="text" name="email" class="form-control p_input">
                    </div>
                    <div class="form-group">
                      <label>Password *</label>
                      <input type="password" name="password" class="form-control p_input">
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Remember me </label>
                      </div>
                      <a href="#" class="forgot-pass">Forgot password</a>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="login" class="btn btn-primary btn-block enter-btn">Authorize</button>
                    </div>
                    <?php if(getSystemElementStatus($conn, 'Register')){ ?> 
                      <div class="d-flex">
                        <button class="btn btn-facebook mr-2 col">
                          <i class="mdi mdi-facebook"></i> Facebook </button>
                        <button class="btn btn-google col">
                          <i class="mdi mdi-google-plus"></i> Google plus </button>
                      </div>
                      <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p>
                    <?php }else{ ?> 
                      <code>Only authorized users can access the contents. Request access from the <a href="https://www.facebook.com/surellejs" target="_blank">Administrator</a>.</code>
                    <?php } ?>
                  </form>
                  <?php }else{ ?>
                    <code>The login feature has been temporarily disabled by the Administrator, possibly for maintenance or security purposes. If you need assistance, please reach out to the <a href="https://www.facebook.com/surellejs" target="_blank">administrator</a> directly for further instructions or wait for the login functionality to be restored. I apologize for any inconvenience caused and appreciate your patience as we work to resolve this issue.</code>
                  <?php } ?>
                <?php } ?>

              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>