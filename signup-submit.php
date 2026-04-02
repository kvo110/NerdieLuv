<?php
/*
 * signup-submit.php
 * Receives the signup form, adds the new user to singles.txt,
 * and shows a confirmation page.
 */

include_once("common.php");

$name = trim($_POST["name"]);
$gender = trim($_POST["gender"]);
$age = trim($_POST["age"]);
$personality = strtoupper(trim($_POST["personality"]));
$os = trim($_POST["os"]);
$min = trim($_POST["min"]);
$max = trim($_POST["max"]);

$new_user_line = $name . "," . $gender . "," . $age . "," . $personality . "," .
  $os . "," . $min . "," . $max;

$current_text = file_get_contents("singles.txt");

if ($current_text === false) {
  $write_result = false;
} else {
  if ($current_text !== "" && substr($current_text, -1) !== "\n") {
    $new_user_line = "\n" . $new_user_line;
  }

  $new_user_line .= "\n";
  $write_result = file_put_contents("singles.txt", $new_user_line, FILE_APPEND);
}

render_header("Sign Up Submitted");
?>

<section class="content-panel">
  <div class="result-card">
    <?php if ($write_result === false): ?>
      <h2>Oops!</h2>
      <p>There was a problem saving your profile.</p>
      <p>Please check the file permissions for singles.txt and try again.</p>
    <?php else: ?>
      <h2>Thank you!</h2>
      <p>Welcome to NerdLuv, <?= htmlspecialchars($name) ?>!</p>
      <p>Now <a href="matches.php">log in to see your matches!</a></p>
    <?php endif; ?>
  </div>
</section>

<?php render_footer(); ?>
