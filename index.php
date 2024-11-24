<?php
session_start();
if (!isset($_SESSION['message'])) {
    $_SESSION['message'] = "Guess a number between 1 and 100.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess the Number Game</title>
</head>
<body>
    <h1>Guess the Number Game</h1>
    <p><strong><?php echo $_SESSION['message']; ?></strong></p>

    <form method="post" action="process.php">
        <input type="number" name="guess" min="1" max="100" required>
        <button type="submit">Submit Guess</button>
    </form>

    <form method="post" action="reset.php">
        <button type="submit">Reset Game</button>
    </form>
</body>
</html>


