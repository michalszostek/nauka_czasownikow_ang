<?php
include_once('verbs.php');
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
    <h2>Podsumowanie</h2>

    <?php
    $_SESSION['round'] = 0;
    echo '<h3>x/' . $GLOBALS['NUMBER_OF_ROUNDS'] . '</h3>';

    foreach ($round as $verb) {
        foreach ($verb as $form => $value) {
            echo $form . ': ' . $value . '<br>';
        }
        echo '<br>';
    }

    var_dump($given_verb);

    // foreach ($given_verb as $verb) {
    //     foreach ($verb as $form => $value) {
    //         echo $form . ': ' . $value . '<br>';
    //     }
    //     echo '<br>';
    // }


    ?>

    <form action="new_round.php" method="get">
        <input type="submit" value="new round">
    </form>
</body>

</html>