<?php
class Address
{

    // Connection
    private $conn;

    // Table
    private $db_table = "addresses";

    // Columns
    public $id;
    public $name;
    public $user_id;

    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // GET ALL
    public function getAddresses()
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // GetById
    public function getSingleAddress()
    {
        $sqlQuery = "SELECT id, name, user_id FROM " . $this->db_table . " WHERE id=?";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $dataRow['id'];
        $this->name = $dataRow['name'];
        $this->user_id = $dataRow['user_id'];
    }

    public function createAddress()
    {
        $sqlQuery = "INSERT INTO addresses (name, user_id) VALUES (?,?)";


        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->state_id = htmlspecialchars(strip_tags($this->user_id));

        if ($stmt->execute([$this->name,$this->user_id])) {
            return true;
        }
        return false;
    }

    public function updateAddress()
    {
        $sqlQuery = "UPDATE addresses SET name = :name, user_id=:user_id WHERE user_id = :user_id";


        $stmt = $this->conn->prepare($sqlQuery);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));


        // bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":user_id", $this->user_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
