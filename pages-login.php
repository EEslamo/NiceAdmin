<?php
include_once './shared/head.php';
include_once './vendor/configDatabase.php';
include_once './vendor/functions.php';


if (isset($_POST['login'])) {
  $email = $_POST['adminemail'];
  $password = $_POST['adminpassword'];
  $hash_password = sha1($password);

  try {

    $check_admin = "SELECT * FROM `admins` WHERE `email`='$email' and `password`='$hash_password'";
    $check = mysqli_query($conn, $check_admin);
    $num_rows = mysqli_num_rows($check);
    $row=mysqli_fetch_assoc($check);
    if ($num_rows == 1) {
      $_SESSION['admin'] = [
        "id"=>$row['id'],
        "name"=>$row['name'],
        "email"=>$row['email'],
        "image"=>$row['image'],
        "theme"=>$row['theme']
      ];
      redirectGeneral("index.php");
    } else {
      getFailedMessage(true, "Email or Password does not exist");
    }

    // redirect("admins/add.php");
    // getMessage($i, "Admin has been added");
  } catch (Exception $e) {
    $e->getMessage();
  }
}






?>
<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.php" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">NiceAdmin</span>
              </a>
              <br>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">
                <?php if (isset($_SESSION['failed_message'])): ?>
                  <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert" id="Added_Message">
                    <?= $_SESSION['failed_message'] ?>
                    <form action="<?php url("vendor/functions.php"); ?>" method="POST">
                      <button type="submit" name="ClearSession" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </form>

                  </div>
                <?php endif; ?>

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login As Admin</h5>
                  <p class="text-center small">Enter your Email & password to login</p>
                </div>

                <form method="POST" class="row g-3 needs-validation" novalidate>

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Email</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="adminemail" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Please enter your email.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="adminpassword" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit" name="login">Login</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Don't have account? <a href="pages-register.php">Create an account</a></p>
                  </div>
                </form>

              </div>
            </div>

            <div class="credits">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->
<?php
include_once "./shared/footer.php";
include_once './shared/script.php';
?>