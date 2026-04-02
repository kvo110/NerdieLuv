<?php
/*
 * signup.php
 * Form page for adding a new user to the singles list.
 * I kept the fields matching the assignment spec.
 */

include_once("common.php");
render_header("Sign Up");
?>

<section class="content-panel">
  <form action="signup-submit.php" method="post" class="simple-form">
    <fieldset>
      <legend>New User Signup</legend>

      <div class="form-row">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" id="name" class="name-box" maxlength="16" required>
      </div>

      <div class="form-row">
        <span class="form-label">Gender:</span>

        <label class="inline-option">
          <input type="radio" name="gender" value="M"> Male
        </label>

        <label class="inline-option">
          <input type="radio" name="gender" value="F" checked> Female
        </label>
      </div>

      <div class="form-row">
        <label for="age" class="form-label">Age:</label>
        <input type="text" name="age" id="age" class="small-text" maxlength="2" required>
      </div>

      <div class="form-row">
        <label for="personality" class="form-label">Personality type:</label>
        <input type="text" name="personality" id="personality" class="small-text" maxlength="4" required>
        <a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp" target="_blank">
          (Don't know your type?)
        </a>
      </div>

      <div class="form-row">
        <label for="os" class="form-label">Favorite OS:</label>
        <select name="os" id="os">
          <option>Windows</option>
          <option>Mac OS X</option>
          <option>Linux</option>
        </select>
      </div>

      <div class="form-row">
        <span class="form-label">Seeking age:</span>
        <input type="text" name="min" class="age-range" placeholder="min" maxlength="2" required>
        <span class="range-separator">to</span>
        <input type="text" name="max" class="age-range" placeholder="max" maxlength="2" required>
      </div>

      <div class="button-row">
        <input type="submit" value="Sign Up">
      </div>
    </fieldset>
  </form>
</section>

<?php render_footer(); ?>
