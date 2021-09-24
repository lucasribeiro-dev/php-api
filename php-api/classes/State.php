<?php
class State
{

    // Connection
    private $conn;

    // Table
    private $db_table = "states";

    // Columns
    public $id;
    public $name;
    public $total;

    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // GET ALL
    public function getStates()
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // GetById
    public function getSingleState()
    {
        $sqlQuery = "SELECT id, name FROM " . $this->db_table . " WHERE id=?";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();


        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $dataRow['id'];
        $this->name = $dataRow['name'];
    }

    public function getTotalUsersOfStates()
    {
        $sqlQuery = "SELECT states.name, COUNT(states.id) AS total FROM users
            LEFT JOIN states ON states.id = users.state_id
            GROUP BY states.id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
}
