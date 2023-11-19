<?php



class User {
    private $conn;


    //Constractor
    public function __construct($conn) {
        $this->conn = $conn;
    }

    //Function for Registration of the User 
    public function registerUser($username, $password, $email) {
            //  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $this->conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $username, $password, $email);
                return $stmt->execute();
            }

    // Function to check if username and email are already taken
    public function checkUsernameAndEmail($username, $email,) {
        $checkQuery = "SELECT * FROM users WHERE username='$username' OR email='$email' ";
        $result = $this->conn->query($checkQuery);

        if ($result->num_rows > 0) {
            return true; // Username or email already taken
        } else {
            return false; // Username and email are available
        }
    }

  
    
}

?>
