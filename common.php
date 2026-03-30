<?php
/*
 * common.php
 * Shared functions for the NerdieLuv site.
 * I put the repeated page pieces here so the other files stay cleaner.
 */

// Prints the top part of the page used across the site
function render_header(string $title = "NerdieLuv"): void {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="nerdieluv.css">
</head>
<body>
  <div class="page">
    <div class="banner">
      <div class="banner-text">
        <h1>nerdLuv</h1>
        <p>where meek geeks meet</p>
      </div>
    </div>
<?php
}

// Prints the common footer section
function render_footer(): void {
?>
    <div class="footer">
      <p>
        This page is for single nerds to meet and date each other! Type in your
        personal information and wait for the nerdly luv to begin!
      </p>

      <p>Thank you for using our site.</p>

      <p>Results and page (C) Copyright NerdieLuv Inc.</p>

      <p>
        <a href="index.php" class="back-link">Back to front page</a>
      </p>
    </div>
  </div>
</body>
</html>
<?php
}
?>
