<?php
//Anyone can try to get to our 'signed-in' part of our website
//This is how we check if they got to it properly with the sign up button
if (isset($_POST['signup-submit'])) {

    //Includes the connection to the database script 
    //So we can use the variables and the connection here
    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

  // This performs error handling to make sure we catch any errors made by the user. 
  // We check for any empty inputs. 
  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
    exit();
  }
  // We check for an invalid username AND invalid e-mail.
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invaliduidmail");
    exit();
  }
  // We check for an invalid username. In this case ONLY letters and numbers.
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invaliduid&mail=".$email);
    exit();
  }
  // We check for an invalid e-mail.
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&uid=".$username);
    exit();
  }
  // We check if the repeated password is NOT the same.
  else if ($password !== $passwordRepeat) {
    header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
    exit();
  }
  else {

    // We include another error handler here that checks whether or the username is already taken.

    // First we create the statement that searches our database table to check for any identical usernames.
    $sql = "SELECT uidUsers FROM users WHERE uidUsers=?;";
    // We create a "prepared" statement. 
    $stmt = mysqli_stmt_init($conn);
    // Then we prepare our SQL statement AND check if there are any errors with it.
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      // If there is an error we send the user back to the signup page.
      header("Location: ../signup.php?error=sqlerror");
      exit();
    }
    else {
      // Next we need to put back in the type of parameters we expect to pass into the SQL statementfrom the user.
      mysqli_stmt_bind_param($stmt, "s", $username);
      // Execute the prepared statement and send it to the database
      mysqli_stmt_execute($stmt);
      // Store the result from the statement.
      mysqli_stmt_store_result($stmt);
      // Then we get the number of result we received from our statement. We only should get 1 if its repeated.
      $resultCount = mysqli_stmt_num_rows($stmt);
      // Closing the statement, might not need to do this but i think its the proper way
      mysqli_stmt_close($stmt);
      // Here we check if the username already exists.
      if ($resultCount > 0) {
        header("Location: ../signup.php?error=usertaken&mail=".$email);
        exit();
      }
      else {
        // If we got to this point, it means the user didn't make an error

        // Prepares the SQL statement that will insert the users info into the database. 
        //Using prepared statements to make this process more secure.
        // We do this for security in case someone can see the database theyll see the passwords and username without prepared stmts.
        // Prepared statements works by us sending SQL to the database first, and then later we fill in the placeholders (?) by sending the users data.

        $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?);";
        // Initializes a new statement using the connection from the dbh.inc.php file.
        $stmt = mysqli_stmt_init($conn);
        // Then we prepare our SQL statement AND check if there are any errors with it.
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          // If there is an error we send the user back to the signup page.
          header("Location: ../signup.php?error=sqlerror");
          exit();
        }
        else {

          // If there is no error then we continue

          // We hash the info for security
          // This is a popular hashing method since it constantly updates which is cool, safer.

          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          // Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.

          mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
          // Then we execute the prepared statement and send it to the database!
          // This means the user is now registered! :)

          mysqli_stmt_execute($stmt);
          // Lastly we send the user back to the signup page with a success message!

          header("Location: ../signup.php?signup=success");
          exit();

        }
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
