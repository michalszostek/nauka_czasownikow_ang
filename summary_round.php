<?php
include_once('verbs.php');
include_once('templates/header.php');
$_SESSION['round'] = 0;
?>
<h2 class="mt-3">Podsumowanie</h2>

<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Pol</th>
            <th scope="col">Infinitive</th>
            <th scope="col">Past tense</th>
            <th scope="col">Past participle</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $points = 0;
        //check
        for ($i = 1; $i <= $GLOBALS['NUMBER_OF_ROUNDS']; $i++) {
            echo '<tr>';
            $sql = 'SELECT * FROM round WHERE id = :id';
            $query = $conn->prepare($sql);
            $query->execute(array(':id' => $i));
            $round_verbs = $query->fetch(PDO::FETCH_NUM);

            $sql = 'SELECT * FROM verbs WHERE id = :id';
            $query = $conn->prepare($sql);
            $query->execute(array(':id' => $round_verbs[1]));
            $verbs = $query->fetch(PDO::FETCH_NUM);

            echo '<th scope="row">';
            echo $round_verbs[1];
            echo '</th>';

            echo '<th scope="row">';
            echo $round_verbs[5];
            echo '</th>';

            if ($round_verbs[2] === $verbs[1]) {
                $points++;
                echo '<td>' . $round_verbs[2] . '</td>';
            } else {
                echo '<td>' . $round_verbs[2] . ' / ' . $verbs[1] . '</td>';
            }

            if ($round_verbs[3] === $verbs[2]) {
                $points++;
                echo '<td>' . $round_verbs[3] . '</td>';
            } else {
                echo '<td>' . $round_verbs[3] . ' / ' . $verbs[2] . '</td>';
            }

            if ($round_verbs[4] === $verbs[3]) {
                $points++;
                echo '<td>' . $round_verbs[4] . '</td>';
            } else {
                echo '<td>' . $round_verbs[4] . ' / ' . $verbs[3] . '</td>';
            }
            echo '</tr>';
        }
        ?>

    </tbody>
</table>

<?= '<h3>You scored: ' . $points . '/' . ($GLOBALS['NUMBER_OF_ROUNDS'] * 3) . ' points</h3>'; ?>

<form action="new_round.php" method="get">
    <input type="submit" value="new round">
</form>
<?php
include_once 'templates/footer.php';
