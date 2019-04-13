<?php
require_once 'app.php';

if ($_POST['infinitive'] && $_POST['tense'] && $_POST['participle']) {

    $a = new Main();

    $answers = array(
        'infinitive' => $_POST['infinitive'],
        'tense' => $_POST['tense'],
        'participle' => $_POST['participle']
    );

    $a->check_in_form($a::$_ROUND, $answers);
    $a->update_answers($a::$_ROUND, $answers);

}
