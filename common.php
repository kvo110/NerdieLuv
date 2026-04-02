<?php
/*
 * common.php
 * Shared layout pieces for the NerdieLuv pages.
 * I moved the repeated page wrapper here so the other files stay cleaner.
 */

function render_header(string $title = "NerdieLuv"): void {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($title) ?></title>
  <link rel="stylesheet" href="nerdieluv.css">
</head>
<body>
  <div class="page">
    <header class="site-header">
      <div class="banner">
        <img src="assets/luv.gif" alt="NerdLuv logo" class="logo">
        <div class="banner-text">
          <h1>nerdLuv</h1>
          <p>where meek geeks meet</p>
        </div>
      </div>
    </header>
<?php
}

function render_footer(): void {
?>
    <footer class="footer">
      <p>
        This page is for single nerds to meet and date each other! Type in your
        personal information and wait for the nerdly luv to begin!
      </p>

      <p>Thank you for using our site.</p>

      <p>Results and page (C) Copyright NerdieLuv Inc.</p>

      <p>
        <a href="index.php" class="back-link">Back to front page</a>
      </p>
    </footer>
  </div>
</body>
</html>
<?php
}
?>
