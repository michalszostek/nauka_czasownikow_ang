<?php
require_once 'app.php'
?>
<!DOCTYPE html>
<html lang="pol">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>czasowniki nieregularne app</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?= $verb[4] ?>
    <form action="test.php" method="post" autocomplete="off">
        <input type="text" name="infinitive">
        <input type="text" name="tense">
        <input type="text" name="participle">
        <input type="submit">
    </form>
</body>

</html>