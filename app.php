<?php

class Main {

    public function __construct()
    {
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

    public function start_test()
    {
        
    }

    public function end_test()
    {
        $query = 'TRUNCATE `session`';
        $query = $this->conn->prepare($query);
        $query->execute();
    }
    
    public function select_verb($id)
    {

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

function max_ID($conn)
{
    $sql = 'SELECT max(id) FROM verbs';
    $query = $conn->prepare($sql);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_NUM);
    return (int)$row[0];
}





