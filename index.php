<?php
include_once('verbs.php');

if (!isset($_SESSION['round'])) {
    $_SESSION['round'] = 0;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php

    if ($_SESSION['round'] === $GLOBALS['NUMBER_OF_ROUNDS']) {
        header('Location: summary_round.php');
    }

    echo ($round[$_SESSION['round']]['polish']) . '<br>';

    echo $_SESSION['round']++;
    ?>

    <form action="previous.php" method="get">
        <input type="submit" value="previous">
    </form>

    <form action="next.php" method="get">
        <input type="text" name="infinitive">
        <input type="text" name="tense">
        <input type="text" name="participle">
        <input type="submit" value="next">
    </form>

    <form action="new_round.php" method="get">
        <input type="submit" value="new round">
    </form>

</body>

</html>