<?php 
   require("header.php");
?>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <!-- <div><span><img src="<?php echo base_url('Vanavil/images/bannerlogo.jpg')?>" width="160" heigth="29.24"></img></span></div> -->
            <div class="logo text-uppercase"><strong class="text-primary">Login</strong></div>
            <p style="visibility:hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
            <form action="#" method="POST" id="form_login" class="text-left form-validate">
              <div class="form-group-material">
                <input id="login-username" type="text" name="loginUsername" required data-msg="Please enter your username" class="input-material">
                <label for="login-username" class="label-material">Username</label>
              </div>
              <div class="form-group-material">
                <input id="login-password" type="password" name="loginPassword" required data-msg="Please enter your password" class="input-material">
                <label for="login-password" class="label-material">Password</label>
              </div>
              <div class="form-group text-center"><button id="btnLogin" class="btn btn-primary">Login</button>
                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
              </div>
            </form>
            <!-- <a href="#" class="forgot-pass">Forgot Password?</a><small>Do not have an account? </small><a href="register.html" class="signup">Signup</a> -->
          </div>
          <div class="copyrights text-center">
            
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script> -->
    <script src="<?php echo base_url('vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?php echo base_url('js/grasp_mobile_progress_circle-1.0.0.min.js')?>"></script>
    <script src="<?php echo base_url('vendor/jquery.cookie/jquery.cookie.js')?>"></script>
    <script src="<?php echo base_url('vendor/chart.js/Chart.min.js')?>"></script>
    <script src="<?php echo base_url('vendor/jquery-validation/jquery.validate.min.js')?>"></script>
    <script src="<?php echo base_url('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')?>"></script>
    <!-- Main File-->
    <script src="<?php echo base_url('js/front.js')?>"></script>
    <script>
      $("#btnLogin").click(function(e) {
       e.preventDefault(); // avoid to execute the actual submit of the form.
       if($("#form_login").validate().form()) {
          path = '<?php echo base_url('/getLoginDetails')?>';
          var form = $('#form_login');
          var formData = new FormData(form[0]);
          $.ajax({
            type: "POST",
            url: path,
            data: formData,
            beforeSend: function() {
              
            },
            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData: false, // NEEDED, DON'T OMIT THIS
            success: function(data)
            { 
              if(data == "success") {
                window.location.href = "<?php echo base_url('/category')?>";
              } else {
                hidePreloader();
                alert("Invalid Username/Password");
              }
            },
            error: function (jqXHR, textStatus, errorMessage, exception) {
              console.log(errorMessage);
            }
          });
       }
      });
    </script>
  </body>
</html>