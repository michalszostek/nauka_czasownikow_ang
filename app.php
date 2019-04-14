<?php

class Main
{
    public static $_ROUND;

    public function __construct()
    {
        self::$_ROUND = 10;

        $servername = 'localhost';
        $dbname = 'verbs';
        $username = 'root';
        $password = '';

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=" . $dbname, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function max_ID()
    {
        $sql = 'SELECT max(id) FROM verbs';
        $query = $this->conn->prepare($sql);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_NUM);
        return (int)$row[0];
    }

    public function start_program()
    {
        $this->end_test();
        $this->rand_numbers();
        self::$_ROUND = 1;
    }

    public function start_test()
    {
        //dodać jakieś next_word czy cosw tym stylu.
        $verb = $this->select_verb(self::$_ROUND);
        echo $verb[4];
        echo $this->get_answers();


        // $this->sum();
        // $this->end_test();
    }

    public function select_verb($id)
    {
        //fetch verb id from random verbs
        $sql = 'SELECT verb FROM session WHERE id = :id';
        $query = $this->conn->prepare($sql);
        $query->execute(array(':id' => $id));
        $verb = $query->fetch(PDO::FETCH_NUM);

        //fetch verb from table verbs
        $sql = 'SELECT * FROM verbs WHERE id = :id';
        $query = $this->conn->prepare($sql);
        $query->execute(array(':id' => (int)$verb[0]));
        $verb = $query->fetch(PDO::FETCH_NUM);
        return $verb;
    }

    public function get_answers()
    {
        return ('<form action="" method="post" autocomplete="off">
                <input type="text" name="infinitive">
                <input type="text" name="tense">
                <input type="text" name="participle">
                <input type="submit">
                </form>');
    }

    public function test_test()
    {
        if ($_POST['infinitive'] && $_POST['tense'] && $_POST['participle']) {

            $answers = array(
                'infinitive' => $_POST['infinitive'],
                'tense' => $_POST['tense'],
                'participle' => $_POST['participle']
            );

            $this->check_in_form(self::$_ROUND, $answers);
            $this->update_answers(self::$_ROUND, $answers);

            self::$_ROUND += 1;
        }
    }

    public function update_answers($id, $answers)
    {
        $query = 'UPDATE `session` SET `infinitive`= :a,`tense`=:b,`participle`=:c WHERE id = :d';
        $query = $this->conn->prepare($query);
        $query->execute(array(
            ':a' => $answers['infinitive'],
            ':b' => $answers['tense'],
            ':c' => $answers['participle'],
            ':d' => $id
        ));
    }

    public function check_in_form($verb_id, $answers)
    {
        $verb = $this->select_verb($verb_id);

        if ($answers['infinitive'] == $verb[1]) {
            echo 'Dobrze! ' .  $answers['infinitive'] . ' ' . $verb[1] . '<br>';
        } else {
            echo 'Źle! Podałeś:' . $answers['infinitive'] . ' zamiast: ' . $verb[1] . '<br>';
        }

        if ($answers['tense'] == $verb[2]) {
            echo 'Dobrze! ' .  $answers['tense'] . ' ' . $verb[2] . '<br>';
        } else {
            echo 'Źle! Podałeś: ' . $answers['tense'] . ' zamiast: ' . $verb[2] . '<br>';
        }

        if ($answers['participle'] == $verb[3]) {
            echo 'Dobrze! ' .  $answers['participle'] . ' ' . $verb[3] . '<br>';
        } else {
            echo 'Źle! Podałeś: ' . $answers['participle'] . ' zamiast: ' . $verb[3] . '<br>';
        }

        echo '<a href="index.php">Kolejne słowo</a>';
    }

    public function sum()
    {
        //Pobrane wyniki z jednej i drugiej tabeli do porówniania i wyświetlania w <table></table>
    }

    public function end_test()
    {
        $query = 'TRUNCATE `session`';
        $query = $this->conn->prepare($query);
        $query->execute();
    }

    public function rand_numbers()
    {
        $numbers = array();
        $maxID = $this->max_ID();
        $count = 0;

        for ($i = 1; $i <= 10; $i++) {
            do {
                $numb = rand(1, $maxID);
                $flag = true;

                for ($j = 1; $j <= $count; $j++) {
                    if ($numb == $numbers[$j]) $flag = false;
                }

                if ($flag == true) {
                    $count++;
                    $numbers[$count] = $numb;
                }
            } while ($flag != true);
        }

        $id = 1;
        foreach ($numbers as $numb) {
            $query = 'INSERT INTO `session`(`id`, `verb`) VALUES (:a, :b)';
            $query = $this->conn->prepare($query);
            $query->execute(array(
                ':a' => $id,
                ':b' => $numb,
            ));
            $id += 1;
        }
    }
}



function select_verb($conn, $id)
{
    $sql = 'SELECT * FROM verbs WHERE id = :id';
    $query = $conn->prepare($sql);
    $query->execute(array(':id' => $id));
    $row = $query->fetch(PDO::FETCH_NUM);
    return $row;
}
