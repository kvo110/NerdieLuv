<?php
/*
 * matches.php
 * This page lets an existing user enter their name
 * and view their matches.
 */

include_once("common.php");
render_header("View Matches");
?>

<form action="matches-submit.php" method="get">
  <fieldset>
    <legend>Returning User:</legend>

    <div class="row">
      <label class="label">Name:</label>
      <input type="text" name="name" class="name-box" maxlength="16" required>
    </div>

    <div class="button-row">
      <input type="submit" value="View My Matches">
    </div>
  </fieldset>
</form>

<?php render_footer(); ?>
