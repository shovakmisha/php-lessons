<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Использование htmlspecialchars()</title>
</head>
<body>
  <?php
    $example = <<<EXAMPLE
<?php
  echo "Hello world!";
?>

<br />

",44'"

EXAMPLE;
    echo htmlspecialchars($example, ENT_COMPAT);
  ?>
</body>
</html>
