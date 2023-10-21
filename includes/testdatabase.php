<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Dbh {
    protected function connect(){
        try {
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;port=3307;dbname=queensgate-airlines', $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbh;
        } catch(PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function testConnection() {
        try {
            // Call the connect method to establish a database connection
            $dbh = $this->connect();

            // Now you can use $dbh to perform database operations
            $stmt = $dbh->prepare("SELECT * FROM users");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Output the result
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

// Create an instance of the Dbh class
$database = new Dbh();

// Call the testConnection method to perform a test
$database->testConnection();
?>
<!-- // it works -->
