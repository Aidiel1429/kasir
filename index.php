
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <!-- end -->

    <title>Login</title>
    <link rel="stylesheet" href="login/style.css" />
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <h2 class="header">Login Admin</h2>
        <form action="login/login.php" method="post" id="form">
          <input type="text" placeholder="Username" class="user" name="user" required />
          <input type="password" placeholder="Password" class="pw" name="pw" required />
          <input type="submit" value="Login" class="btn" name="submit" id="btn" />
        </form>
      </div>
    </div>
  </body>
</html>
