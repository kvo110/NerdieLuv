<?php
/*
 * index.php
 * Front page for the project.
 * This just points the user to signup or match lookup.
 */

include_once("common.php");
render_header("Home");
?>

<section class="main-card home-card">
  <h2>Welcome!</h2>

  <div class="home-links">
    <p>
      <img src="assets/signup.png" alt="signup icon" class="home-icon">
      <a href="signup.php">Sign up for a new account</a>
    </p>

    <p>
      <img src="assets/match.png" alt="match icon" class="home-icon">
      <a href="matches.php">View your matches</a>
    </p>
  </div>
</section>

<?php render_footer(); ?>
