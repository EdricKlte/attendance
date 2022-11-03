<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FORGOT PASSWORD</title>

  <!-- css -->
  <link rel="stylesheet" href="./css/forgot-password.css" />

</head>

<body>
  <div class="main">
    <!-- header -->
    <div class="header">
      <img src="./img/sjc-bg-color.png" alt="Saint Jude College" />
      <div class="header2"></div>
    </div>

    <div class="container">
      <h1>New Password</h1>
      <form action="./passwords/forgot.php" method="post">
        <input type="email" name="email" placeholder="Enter your Phinma Email" />
        <input type="submit" name="reset" value="Reset Password">
      </form>
    </div>

  </div>
</body>

</html>