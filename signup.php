<?php
/*
 * signup.php
 * Form page where a new user can create an account.
 * I followed the spec fields and matched the layout using CSS.
 */

include_once("common.php");
render_header("Sign Up");
?>

<form action="signup-submit.php" method="post">
  <fieldset>
    <legend>New User Signup:</legend>

    <div class="row">
      <label class="label">Name:</label>
      <input type="text" name="name" class="name-box" maxlength="16" required>
    </div>

    <div class="row">
      <label class="label">Gender:</label>

      <label>
        <input type="radio" name="gender" value="M"> Male
      </label>

      <label>
        <input type="radio" name="gender" value="F" checked> Female
      </label>
    </div>

    <div class="row">
      <label class="label">Age:</label>
      <input type="text" name="age" class="small-text" maxlength="2" required>
    </div>

    <div class="row">
      <label class="label">Personality type:</label>
      <input type="text" name="personality" class="small-text" maxlength="4" required>

      <a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp" target="_blank">
        (Don't know your type?)
      </a>
    </div>

    <div class="row">
      <label class="label">Favorite OS:</label>
      <select name="os">
        <option>Windows</option>
        <option>Mac OS X</option>
        <option>Linux</option>
      </select>
    </div>

    <div class="row">
      <label class="label">Seeking age:</label>

      <input type="text" name="min" class="age-range" placeholder="min" maxlength="2" required>
      to
      <input type="text" name="max" class="age-range" placeholder="max" maxlength="2" required>
    </div>

    <div class="button-row">
      <input type="submit" value="Sign Up">
    </div>
  </fieldset>
</form>

<?php render_footer(); ?>
