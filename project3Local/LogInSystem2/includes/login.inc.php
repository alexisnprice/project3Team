<?php
// Here we check whether the user got to this page by clicking the proper login button.
if (isset($_POST['login-submit'])) {

  //Includes the connection to the database script 
  //So we can use the variables and the connection here
  require 'dbh.inc.php';

  // We grab all the data which we passed from the signup form so we can use it later.
  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];

  // We check for any empty inputs. 
  if (empty($mailuid) || empty($password)) {
    header("Location: ../index.php?error=emptyfields&mailuid=".$mailuid);
    exit();
  }
  else {

    // Next we need to get the password from the user in the database that has the same username as what the user typed in
    // and check if it matches the password the user typed into the login form.

    // We will connect to the database using prepared statements 
    $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
    // Here we initialize a new statement using the connection from the dbh.inc.php file.
    $stmt = mysqli_stmt_init($conn);
    // Then we prepare our SQL statement AND check if there are any errors with it.
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      // If there is an error we send the user back to the signup page.
      header("Location: ../index.php?error=sqlerror");
      exit();
    }
    else {

      // Next we need to put back in the type of parameters we expect to pass into the SQL statementfrom the user.
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      // Then we execute the prepared statement and send it to the database
      mysqli_stmt_execute($stmt);
      // And we get the result from the statement. (should be 1 if repeated or 0 if not)
      $result = mysqli_stmt_get_result($stmt);
      // Then we store the result into a variable.
      if ($row = mysqli_fetch_assoc($result)) {
        // Then we match the password from the database with the password the user submitted. returns a boolean.
        $pwdCheck = password_verify($password, $row['pwdusers']);
        if ($pwdCheck == false) {
          // If there is an error we send the user back to the signup page.
          header("Location: ../index.php?error=wrongpwd");
          exit();
        }
        else if ($pwdCheck == true) {

          // Next we need to create session variables based on the users information from the database. If these session variables exist, then the website will know that the user is logged in.

          // Now that we have the database data, we need to store them in session variables which are like global variables
          session_start();
          $_SESSION['id'] = $row['idUsers'];
          $_SESSION['uid'] = $row['uidUsers'];
          $_SESSION['email'] = $row['emailUsers'];
          // Now the user is registered as logged in and we can now take them back to the front page
          header("Location: ../index.php?login=success");
          exit();
        }
      }
      else {
        header("Location: ../index.php?login=somethingelse"); // anything else goes wrong we send them back to sign up
        exit();
      }
    }
  }
  // Then we close the prepared statement and the database connection
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  // If the user tries to access this page an inproper way, we send them back to the signup page.
  header("Location: ../signup.php");
  exit();
}
