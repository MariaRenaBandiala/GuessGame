<?php
session_start();


if (!isset($_SESSION['target_number'])) {
    $_SESSION['target_number'] = rand(1, 100);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guess'])) {
    $guess = intval($_POST['guess']);
    $target = $_SESSION['target_number'];

    if ($guess > $target) {
        $_SESSION['message'] = "Lower! Try again.";
    } elseif ($guess < $target) {
        $_SESSION['message'] = "Higher! Try again.";
    } else {
        $_SESSION['message'] = "Congratulations! You guessed the correct number: $target.";
        unset($_SESSION['target_number']); 
    }
}

header("Location: index.php");
exit;
?>


