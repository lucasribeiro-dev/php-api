' <?php
    class User
    {

        // Connection
        private $conn;

        // Table
        private $db_table = "users";

        // Columns
        public $id;
        public $name;
        public $state_id;
        public $city_id;
        public $designation;
        public $created;

        // Db connection
        public function __construct($db)
        {
            $this->conn = $db;
        }

        // GET ALL
        public function getUsers()
        {
            $sqlQuery = "SELECT * FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createUser()
        {
            $sqlQuery = "INSERT INTO users (name, state_id, city_id) VALUES (?,?,?)";

            $stmt = $this->conn->prepare($sqlQuery);

            // sanitize
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->state_id = htmlspecialchars(strip_tags($this->state_id));
            $this->city_id = htmlspecialchars(strip_tags($this->city_id));

            if ($stmt->execute([$this->name, $this->state_id, $this->city_id])) {
                return $this->conn->lastInsertId();
            }
            return false;
        }

        // UPDATE
        public function getSingleUser()
        {
            $sqlQuery = "SELECT
                        id, 
                        name, 
                        state_id, 
                        city_id, 
                        designation, 
                        created
                      FROM
                        " . $this->db_table . "
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->name = $dataRow['name'];
            $this->state_id = $dataRow['state_id'];
            $this->city_id = $dataRow['city_id'];
        }

        // UPDATE
        public function updateUser()
        {
            $sqlQuery = "UPDATE users SET name = :name,  state_id = :state_id, city_id = :city_id WHERE id = :id";

            $stmt = $this->conn->prepare($sqlQuery);

            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->state_id = htmlspecialchars(strip_tags($this->state_id));
            $this->city_id = htmlspecialchars(strip_tags($this->city_id));
            $this->id = htmlspecialchars(strip_tags($this->id));

            // bind data
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":state_id", $this->state_id);
            $stmt->bindParam(":city_id", $this->city_id);
            $stmt->bindParam(":id", $this->id);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        }

        // DELETE
        function deleteUser()
        {
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);

            $this->id = htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(1, $this->id);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        }
    }
    ?>
'