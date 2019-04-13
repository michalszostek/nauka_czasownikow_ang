<?php
require_once 'templates/header.html';
require_once 'app.php';

$a = new Main();

// $answers = array(
//     'infinitive' => 'know',
//     'tense' => 'knew',
//     'participle' => 'known'
// );

echo $a->start_test();


?>


<?php
require_once 'templates/footer.html';
?>