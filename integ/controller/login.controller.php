<?php
include "../config/database.php";
include "../model/login.model.php";



class UserController {
    private $userModel;

    public function __construct($dbConnection) {
        $this->userModel = new UserModel($dbConnection);
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            

        
            $user = $this->userModel->verifyUser($username, $password);

        


            if ($user  ) {
                // echo 'Login successful! Welcome ' . $user['username'];
              header("location: ../user/users.php");
                        } else {
                            echo '<script>
                            window.location.href= "../login.php";
                             alert("Invalid Username Or Password!!")
                            </script>
                            "';
            }

            

           
        } 
    }

    public function handleAdmin(){
        if($_SERVER['REQUEST_METHOD'] =="POST"){
            $username = $_POST['username'];
            $password = $_POST['password'];


            $admin = $this->userModel->verifyAdmin($username,$password);

            $row = mysqli_fetch_array($admin);

            if ($row["usertype"]=="admin"   ) {
                // echo 'Login successful! Welcome ' . $user['username'];
              header("location: ../admin/admins.php");
                        } else {
                            echo '<script>
                            window.location.href= "../login.php";
                             alert("Invalid Username Or Password!!")
                            </script>
                            "';
            }


        }
    }

    
    
    

    
    

}

    
$usercontroller = new UserController($conn);
$usercontroller->handleRequest();
$usercontroller->handleAdmin();











    

?>

