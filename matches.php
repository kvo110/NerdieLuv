<?php
/*
 * matches.php
 * Simple search form for looking up a user's matches.
 */

include_once("common.php");
render_header("Matches");
?>

<section class="content-panel">
  <form action="matches-submit.php" method="get" class="simple-form">
    <fieldset>
      <legend>Returning User</legend>

      <div class="form-row form-row-center">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" id="name" class="name-box" maxlength="16" required>
      </div>

      <div class="button-row">
        <input type="submit" value="View My Matches">
      </div>
    </fieldset>
  </form>
</section>

<?php render_footer(); ?>
