<?php
session_start();

// Initialize session message
if (!isset($_SESSION['message'])) {
    $_SESSION['message'] = "Choose a level and set your number of guesses to start.";
}

// Initialize statistics
if (!isset($_SESSION['correct_guesses'])) {
    $_SESSION['correct_guesses'] = 0;
}
if (!isset($_SESSION['incorrect_guesses'])) {
    $_SESSION['incorrect_guesses'] = 0;
}

$total_attempts = $_SESSION['correct_guesses'] + $_SESSION['incorrect_guesses'];
$score_percentage = $total_attempts > 0 
    ? round(($_SESSION['correct_guesses'] / $total_attempts) * 100, 2)
    : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess the Number Game - Start</title>
</head>
<body>
    <h1>Guess the Number Game</h1>
    <p><strong><?php echo htmlspecialchars($_SESSION['message']); ?></strong></p>

    <form method="post" action="game.php">
        <label for="level">Choose Level:</label>
        <select name="level" id="level" required>
            <option value="1">Level 1 (1-50)</option>
            <option value="2">Level 2 (1-100)</option>
        </select>
        <br><br>
        <label for="attempts">Number of Guesses:</label>
        <input type="number" name="attempts" id="attempts" min="1" required>
        <br><br>
        <button type="submit">Start Game</button>
    </form>
    <br>
    <h2>Statistics:</h2>
    <p>Correct Guesses: <?php echo $_SESSION['correct_guesses']; ?></p>
    <p>Incorrect Guesses: <?php echo $_SESSION['incorrect_guesses']; ?></p>
    <p>Score Percentage: <?php echo $score_percentage; ?>%</p>
    <br>
    <form method="post" action="reset.php">
        <button type="submit">Reset All</button>
    </form>
</body>
</html>
