<?php
/*
 * signup-submit.php
 * This page receives the signup form data, saves the new user
 * to singles.txt, and then shows a short confirmation message.
 */

include_once("common.php");

// Grab the submitted values from the form
$name = trim($_POST["name"]);
$gender = trim($_POST["gender"]);
$age = trim($_POST["age"]);
$personality = strtoupper(trim($_POST["personality"]));
$os = trim($_POST["os"]);
$min = trim($_POST["min"]);
$max = trim($_POST["max"]);

// Build the line exactly how the assignment file format expects it
$new_user = $name . "," . $gender . "," . $age . "," . $personality . "," .
  $os . "," . $min . "," . $max . "\n";

// Add the new user to the end of singles.txt
file_put_contents("singles.txt", $new_user, FILE_APPEND);

render_header("Sign Up Submitted");
?>

<div class="main-card result-card">
  <h2>Thank you!</h2>

  <p>Welcome to NerdLuv, <?= htmlspecialchars($name) ?>!</p>

  <p>
    Now
    <a href="matches.php">log in to see your matches!</a>
  </p>
</div>

<?php render_footer(); ?>
