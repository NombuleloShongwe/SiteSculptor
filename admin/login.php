<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>

<body class="hold-transition login-page">
  <script>
    start_loader()
  </script>
  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: "Poppins", sans-serif;
      box-sizing: border-box;
    }

    body {
      left: auto;
      background-image: url("<?php echo validate_image($_settings->info('cover')) ?>");
      background-size: cover;
      background-repeat: no-repeat;
      backdrop-filter: blur(20px);
    }

    .card {
      width: 480px;
      height: max-content;
      position: relative;
      border-radius: 25px;
      margin: 0 -50px;
    }

    .card-body {
      color: black;
      border: 3px solid;
      border-color: #005b80;
      border-radius: 25px;
      background-size: cover;
      background-position: center;
      background: linear-gradient(95deg, #013147, #dfeef5, #dfeef5, #2487b5);
      background-size: 300% 300%;
      backdrop-filter: blur(20px);
      animation: color 24s ease-in-out infinite;
    }

    .card-body .login-box-msg {
      font-size: 24px;
      text-align: center;
      font-weight: 700;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    @keyframes color {
      0% {
        background-position: 0 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0 50%;
      }
    }

    .input-group {
      width: 100%;
      height: 40px;
      border-bottom: 3px solid #005b80;
      border-bottom-left-radius: 15px;
      border-bottom-right-radius: 15px;
      margin: 35px 0;
    }

    .input-group input {
      width: 100%;
      height: 100%;
      background: whitesmoke;
      border-radius: 15px;
      border: none;
      outline: none;
      font-size: 16px;
      color: black;
      padding-left: 10px;
      font-weight: 500;
      padding-right: 28px;
    }

    .input-group label {
      position: absolute;
      top: auto;
      left: 10px;
      transform: translateY(-100%);
      font-size: 16px;
      font-weight: 500;
      pointer-events: none;
    }

    .row button {
      width: 100%;
      margin: 0 10px;
      height: 35px;
      margin-top: 15px;
      font-weight: 700;
      background-color: #03bcff;
      border: 2px solid #005b80;
      cursor: pointer;
      font-size: 14px;
      border-radius: 15px;
      color: black;
      box-shadow: 0 0 10px rgba(241, 238, 238, 0.5);
      transition: .5s ease;
    }

    .row button:hover {
      width: 100%;
      margin: 0 10px;
      height: 35px;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      margin-top: 15px;
      font-weight: 700;
      background-color: #5dcffc;
      border: 2px solid white;
      cursor: pointer;
      font-size: 14px;
      border-radius: 15px;
      color: black;
      box-shadow: 0 0 10px rgba(241, 238, 238, 0.5);
      transition: .5s ease;
    }

    .goto-client {
      font-size: 14.5px;
      font-weight: 600;
      text-align: center;
      margin-top: 25px;
    }

    .goto-client p a {
      text-align: center;
      font-weight: 700;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      color: #013147;
    }

    .goto-client p a:hover {
      text-decoration: underline;
      font-weight: 700;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      color: #03bcff;
    }

    #page-title {
      text-shadow: 6px 4px 7px black;
      font-size: 3.5em;
      color: #fff4f4 !important;
      background: #8080801c;
    }
  </style>
  <h1 class="text-center text-white px-4 py-5" id="page-title"><b><?php echo $_settings->info('name') ?></b></h1>
  <div class="login-box">
    <!-- /.login-logo -->
    <!-- before <div class="card card-primary my-2">-->
    <div class="card">
      <div class="card-body">
        <p class="login-box-msg"> Enter Admin Credentials</p>
        <form id="login-frm" action="" method="post">
          <div class="input-group">
            <input type="text" name="username">
            <label>Email</label>
          </div>
          <div class="input-group">
            <input type="password" name="password">
            <label>Password</label>

          </div>
          <div class="row">
            <button type="submit">Sign In</button>
          </div>
          <div class="goto-client">
            <p>
              Go back to
              <a href="<?php echo base_url ?>">Website</a>
            </p>
          </div>

        </form>
        <!-- /.social-auth-links -->

        <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

  <script>
    $(document).ready(function() {
      end_loader();
    })
  </script>
</body>

</html>