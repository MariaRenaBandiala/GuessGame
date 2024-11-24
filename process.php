<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guess'])) {
    $guess = intval($_POST['guess']);
    $target = $_SESSION['target_number'];
    $_SESSION['attempts_left']--;

    
    if ($guess > $target) {
        $_SESSION['message'] = "Lower! You have {$_SESSION['attempts_left']} attempts left.";
        $_SESSION['incorrect_guesses']++;
    } elseif ($guess < $target) {
        $_SESSION['message'] = "Higher! You have {$_SESSION['attempts_left']} attempts left.";
        $_SESSION['incorrect_guesses']++;
    } else {
        $_SESSION['message'] = "Congratulations! You guessed the correct number: $target.";
        $_SESSION['correct_guesses']++;
        unset($_SESSION['target_number']); 
    }

    
    if ($_SESSION['attempts_left'] <= 0 && isset($_SESSION['target_number'])) {
        $_SESSION['message'] = "Game Over! The correct number was $target.";
        unset($_SESSION['target_number']); 
    }

    header("Location: game.php");
    exit;
}
