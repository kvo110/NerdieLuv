<?php
/*
 * index.php
 * Front page for the NerdieLuv site.
 * This page just links to signing up and checking matches.
 */

include_once("common.php");
render_header("NerdieLuv");
?>

<div class="main-card home-card">
  <h2>Welcome!</h2>

  <div class="home-links">
    <p>
      <a href="signup.php">Sign up for a new account</a>
    </p>

    <p>
      <a href="matches.php">Check your matches</a>
    </p>
  </div>
</div>

<?php render_footer(); ?>
