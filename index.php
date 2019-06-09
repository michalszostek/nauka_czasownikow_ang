   <?php
    include_once('verbs.php');
    include_once('templates/header.php');

    if (!isset($_SESSION['round'])) {
        $_SESSION['round'] = 0;
    }
    ?>

   <div class="row">
       <div class="col-md-2 offset-md-10">
           <form action="new_round.php" method="get">
               <input type="submit" value="new round" class="btn btn-primary mb-2 mr-3 mt-3">
           </form>
       </div>
   </div>

   <?php
    if ($_SESSION['round'] >= $GLOBALS['NUMBER_OF_ROUNDS']) {
        header('Location: summary_round.php');
    }
    echo '<h2 class="text-center mt-4 mb-4">' . ($round[$_SESSION['round']]['polish']) . '</h2>';
    $_SESSION['round']++;
    ?>


   <form action="next.php" method="get">
       <div class="row">
           <div class="col-4">
               <label for="infinitive">infinitive</label>
               <input class="form-control" id="infinitive" type="text" name="infinitive" autocomplete="off">
           </div>
           <div class="col-4">
               <label for="tense">tense</label>
               <input class="form-control" id="tense" type="text" name="tense" autocomplete="off">
           </div>
           <div class="col-4">
               <label for="participle">participle</label>
               <input class="form-control" id="participle" type="text" name="participle" autocomplete="off">
           </div>
       </div>
       <div class="row">
           <div class="col-md-2 offset-md-10">
               <form action="new_round.php" method="get">
                   <input type="submit" value="next" class="btn btn-primary mb-2 mt-4 pull-right">
               </form>
           </div>
       </div>
   </form>
   <form action="previous.php" method="get">
       <div class="row">
           <div class="col-md-2">
               <form action="new_round.php" method="get">
                   <input type="submit" value="previous" class="btn btn-primary mb-2" <?= ($_SESSION['round'] == 1) ? 'disabled' : '' ?>>
               </form>
           </div>
       </div>
   </form>


   </body>

   </html>