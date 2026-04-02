<?php
/*
 * matches-submit.php
 * Reads the selected user's name, finds that user in singles.txt,
 * then prints everyone who matches based on the assignment rules.
 */

include_once("common.php");

/*
 * Break one line from singles.txt into named values.
 * This makes the later matching code easier to read.
 */
function parse_user(string $line): array {
  $parts = explode(",", trim($line));

  return [
    "name" => $parts[0],
    "gender" => $parts[1],
    "age" => (int) $parts[2],
    "personality" => $parts[3],
    "os" => $parts[4],
    "min" => (int) $parts[5],
    "max" => (int) $parts[6]
  ];
}

/*
 * At least one personality letter has to match
 * in the same position.
 */
function has_personality_match(string $type1, string $type2): bool {
  for ($i = 0; $i < strlen($type1); $i++) {
    if ($type1[$i] === $type2[$i]) {
      return true;
    }
  }

  return false;
}

/*
 * Checks the full match rules from the assignment.
 */
function is_match(array $user, array $candidate): bool {
  if ($user["name"] === $candidate["name"]) {
    return false;
  }

  if ($user["gender"] === $candidate["gender"]) {
    return false;
  }

  if ($candidate["age"] < $user["min"] || $candidate["age"] > $user["max"]) {
    return false;
  }

  if ($user["age"] < $candidate["min"] || $user["age"] > $candidate["max"]) {
    return false;
  }

  if ($user["os"] !== $candidate["os"]) {
    return false;
  }

  if (!has_personality_match($user["personality"], $candidate["personality"])) {
    return false;
  }

  return true;
}

/*
 * Picks the correct profile image from the assets folder.
 * Female users get the female icon. Everyone else uses the default one.
 */
function get_profile_image(array $person): string {
  if ($person["gender"] === "F") {
    return "assets/profile_female.png";
  }

  return "assets/profile.png";
}

/*
 * Prints one match in the page.
 */
function print_match(array $person): void {
  $profile_image = get_profile_image($person);
?>
  <article class="match">
    <img
      src="<?= htmlspecialchars($profile_image) ?>"
      alt="Profile picture for <?= htmlspecialchars($person["name"]) ?>"
      class="profile-pic"
    >

    <p>
      <?= htmlspecialchars($person["name"]) ?>
      (<?= htmlspecialchars($person["gender"]) ?>,
      <?= htmlspecialchars((string) $person["age"]) ?>,
      <?= htmlspecialchars($person["personality"]) ?>,
      <?= htmlspecialchars($person["os"]) ?>)
    </p>
  </article>
<?php
}

$search_name = trim($_GET["name"]);
$lines = file("singles.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$users = [];
$selected_user = null;

foreach ($lines as $line) {
  $person = parse_user($line);
  $users[] = $person;

  if (trim(strtolower($person["name"])) === trim(strtolower($search_name))) {
    $selected_user = $person;
  }
}

render_header("Matches for " . $search_name);
?>

<section class="content-panel">
  <h2>Matches for <?= htmlspecialchars($search_name) ?></h2>

  <?php if ($selected_user === null): ?>
    <div class="result-card">
      <p>User not found. Try signing up first.</p>
    </div>
  <?php else: ?>
    <div class="matches-list">
      <?php foreach ($users as $person): ?>
        <?php if (is_match($selected_user, $person)): ?>
          <?php print_match($person); ?>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</section>

<?php render_footer(); ?>
