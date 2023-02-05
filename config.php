<?php
    class DatabaseConfig {
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "final_assignment";
        private $charset = "utf8";
        
        public function getConnection() {
            try {
                $conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database . ";charset=" . $this->charset, $this->username, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
    }
?>



