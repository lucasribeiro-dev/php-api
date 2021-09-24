<?php
class city
{

    // Connection
    private $conn;

    // Table
    private $db_table = "citys";

    // Columns
    public $id;
    public $name;
    public $state_id;

    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // GET ALL
    public function getCitys()
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // GetById
    public function getSingleCity()
    {
        $sqlQuery = "SELECT id, name, state_id FROM ".$this->db_table." WHERE id=?";


        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $dataRow['id'];
        $this->name = $dataRow['name'];
        $this->state_id = $dataRow['state_id'];
    }

    public function getTotalUsersOfCitys()
    {
        $sqlQuery = "SELECT citys.name, COUNT(citys.id) AS total FROM users
            LEFT JOIN citys ON citys.id = users.state_id
            GROUP BY citys.id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
}
