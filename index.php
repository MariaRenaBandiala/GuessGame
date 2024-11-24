<?php
session_start();


if (!isset($_SESSION['message'])) {
    $_SESSION['message'] = "Choose a level and set your number of guesses to start.";
}
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
        <br>
        <label for="attempts">Number of Guesses:</label>
        <input type="number" name="attempts" id="attempts" min="1" required>
        <br>
        <button type="submit">Start Game</button>
    </form>
</body>
</html>
