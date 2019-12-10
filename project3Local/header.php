<<<<<<< HEAD
<?php
  // First we start a session which allow for us to store information as SESSION variables.
  session_start();
  // "require" creates an error message and stops the script. "include" creates an error and continues the script.
  require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>

    <!-- Here is the header where I decided to include the login form for this tutorial. -->
    <header>
      <nav class="nav-header-main">
        <a class="header-logo" href="index.php">
          <img src="imgs/download.png" alt="DOA">
        </a>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="addReview.php">Add Review</a></li>
          <li><a href="viewAllReviews.php">View All</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
      <div class="header-login">
        <!--
        Here is the HTML login form.
        Notice that the "method" is set to "post" because the data we send is sensitive data.
        The "inputs" I decided to have in the form include username/e-mail and password. The user will be able to choose whether to login using e-mail or username.

        Also notice that using PHP, we can choose whether or not to show the login/signup form, or to show the logout form, if we are logged in or not. We do this based on SESSION variables which I explain in more detail in the login.inc.php file!
        -->
        <?php
        if (!isset($_SESSION['id'])) {
          echo '<form action="includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="E-mail/Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="login-submit">Login</button>
          </form>
          <a href="signup.php" class="header-signup">Signup</a>';
        }
        else if (isset($_SESSION['id'])) {
          echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="login-submit">Logout</button>
          </form>';
        }
        ?>
      </div>
    </header>
=======
<?php
  // First we start a session which allow for us to store information as SESSION variables.
  session_start();
  // "require" creates an error message and stops the script. "include" creates an error and continues the script.
  require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>NovaEats</title>
    <link rel="stylesheet" href="styles.css">
    
  </head>
  <body>

    <!-- Here is the header where I decided to include the login form for this tutorial. -->
    <header>
      <nav class="nav-header-main">
        <a class="header-logo" href="index.php">
          <img src="imgs/download.png" alt="DOA">
        </a>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="viewAllReviews.php">View All Options</a></li>
          <li><a href="addReview.php">Leave a Review</a></li>
          <li><a href="contact.php">Contact</a></li>

        </ul>
      </nav>
      <div class="header-login">
        <!--
        Here is the HTML login form.
        Notice that the "method" is set to "post" because the data we send is sensitive data.
        The "inputs" I decided to have in the form include username/e-mail and password. The user will be able to choose whether to login using e-mail or username.

        Also notice that using PHP, we can choose whether or not to show the login/signup form, or to show the logout form, if we are logged in or not. We do this based on SESSION variables which I explain in more detail in the login.inc.php file!
        -->
        <?php
        if (!isset($_SESSION['id'])) {
          echo '<form action="includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="E-mail/Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="login-submit">Login</button>
          </form>
          <a href="signup.php" class="header-signup">Signup</a>';
        }
        else if (isset($_SESSION['id'])) {
          echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="login-submit">Logout</button>
          </form>';
        }
        ?>
      </div>
    </header>
>>>>>>> fbec53b0fcc3b746a1b99b738f45436acdb6e258
