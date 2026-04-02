<?php
/*
 * matches-submit.php
 * This page reads the selected user's name from the query string,
 * finds that person in singles.txt, and then prints everybody who
 * matches based on the assignment rules.
 */

include_once("common.php");

/*
 * Turns one line from singles.txt into an associative array
 * so the rest of the code is easier to read.
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
 * Checks whether two users share at least one personality letter
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
 * Checks whether two users satisfy all matching rules.
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
 * Prints one matching person in the required format.
 */
function print_match(array $person): void {
?>
  <div class="match">
    <p><?= htmlspecialchars($person["name"]) ?></p>

    <img src="user.jpg" alt="User profile picture">

    <ul>
      <li><span class="match-label">gender:</span> <?= htmlspecialchars($person["gender"]) ?></li>
      <li><span class="match-label">age:</span> <?= htmlspecialchars((string) $person["age"]) ?></li>
      <li><span class="match-label">type:</span> <?= htmlspecialchars($person["personality"]) ?></li>
      <li><span class="match-label">OS:</span> <?= htmlspecialchars($person["os"]) ?></li>
    </ul>
  </div>
<?php
}

$search_name = trim($_GET["name"]);
$lines = file("singles.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$users = [];
$selected_user = null;

// Read everybody from the file first
foreach ($lines as $line) {
  $person = parse_user($line);
  $users[] = $person;

  if ($person["name"] === $search_name) {
    $selected_user = $person;
  }
}

render_header("Matches");
?>

<div class="matches-area">
  <h2>Matches for <?= htmlspecialchars($search_name) ?></h2>

  <?php foreach ($users as $person): ?>
    <?php if (is_match($selected_user, $person)): ?>
      <?php print_match($person); ?>
    <?php endif; ?>
  <?php endforeach; ?>
</div>

<?php render_footer(); ?>
