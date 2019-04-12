<?php
require_once 'index.php';

if ($_POST['infinitive'] && $_POST['tense'] && $_POST['participle']) {

    echo $verb[4] . '<br>';

    if( $_POST['infinitive'] == $verb[1]) {
        echo 'Dobrze! ' .  $_POST['infinitive'] .' '. $verb[1] . '<br>';
    } else {
        echo 'Źle! Podałeś:' . $_POST['infinitive'] . ' zamiast: ' . $verb[1] . '<br>';
    }

    if( $_POST['tense'] == $verb[2]) {
        echo 'Dobrze! ' .  $_POST['tense'] .' '. $verb[2] . '<br>';
    } else {
        echo 'Źle! Podałeś: ' . $_POST['tense'] . ' zamiast: ' . $verb[2] . '<br>';
    }

    if( $_POST['participle'] == $verb[3]) {
        echo 'Dobrze! ' .  $_POST['participle'] .' '. $verb[3] . '<br>';
    } else {
        echo 'Źle! Podałeś: ' . $_POST['participle'] . ' zamiast: ' . $verb[3] . '<br>';
    }

    echo '<a href="index.php">następne słowo</a>';
} else {
    header('location: index.php');
}
