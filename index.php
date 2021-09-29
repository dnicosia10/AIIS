<html>
  <head>
      <title>Login Page</title>
      <link rel="stylesheet" type="text/css" href="login/style.css">
  </head>
<body>
  <div class="login-container">
  <center><img src="imgs/Lgo2.png" class="logo-img"></center>
    <form method="POST" >
      Username<input type="text" name="login-name" class="inputs"><br>
      Password<input type="password" name="login-pass" class="inputs">
      <input type="submit" name="submit-but" id="login-btn" value="Login">
    </form>
  </div>
</body>
</html>
<?php
  session_start();
    if(isset($_POST['submit-but'])){
      require 'login/connect.php';
        $login_userName = $_POST['login-name'];
        $login_passWord = $_POST['login-pass'];
        $hashed_pass = md5($login_passWord);
        $result = mysql_query("SELECT * FROM user_login_db WHERE login_username = '$login_userName' AND login_password = '$hashed_pass'");
        if (mysql_num_rows($result) == 1){
          $_SESSION["uName"] = $login_userName;
          $desc = "The admin Log-IN";
          $act = "LOG";

          $audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");
          header('Location:welcome.php');
        }
        else
          $_SESSION["uName"] = $login_userName;
          echo '<center><div style="background-color:rgba(255, 0, 0, 0.4);width:20%;padding:10px;border-radius:5px;font-family:helvetica;color:rgb(208, 12, 0);">Unknown Account</div></center>';
    }
?>
