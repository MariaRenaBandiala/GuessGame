<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['level']) && isset($_POST['attempts'])) {
    
    $level = intval($_POST['level']);
    $_SESSION['attempts_left'] = intval($_POST['attempts']);

    if ($level === 1) {
        $_SESSION['max_number'] = 50;
    } elseif ($level === 2) {
        $_SESSION['max_number'] = 100;
    }

    $_SESSION['target_number'] = rand(1, $_SESSION['max_number']);
    $_SESSION['message'] = "Game started! Guess a number between 1 and {$_SESSION['max_number']}.";
}


if (!isset($_SESSION['target_number'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess the Number Game - Play</title>
</head>
<body>
    <h1>Guess the Number Game</h1>
    <p><strong><?php echo htmlspecialchars($_SESSION['message']); ?></strong></p>

    <form method="post" action="process.php">
        <label for="guess">Enter your guess:</label>
        <input type="number" name="guess" id="guess" min="1" max="<?php echo $_SESSION['max_number']; ?>" required>
        <button type="submit">Submit Guess</button>
    </form>

    <form method="post" action="reset.php">
        <button type="submit">Reset Game</button>
    </form>

    <h2>Statistics:</h2>
    <p>Attempts Left: <?php echo $_SESSION['attempts_left']; ?></p>
    <p>Correct Guesses: <?php echo $_SESSION['correct_guesses'] ?? 0; ?></p>
    <p>Incorrect Guesses: <?php echo $_SESSION['incorrect_guesses'] ?? 0; ?></p>
</body>
</html>
