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

  
   

   
}



function select_verb($conn, $id)
{
    $sql = 'SELECT * FROM verbs WHERE id = :id';
    $query = $conn->prepare($sql);
    $query->execute(array(':id' => $id));
    $row = $query->fetch(PDO::FETCH_NUM);
    return $row;
}
