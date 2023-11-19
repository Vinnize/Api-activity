<?php
include '../config/database.php';
include '../model/signup.model.php';




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['confirmpass'];

  //Cheking if one of the input field is empty 
  if (empty($username) || empty($password) || empty($email) || empty($repeatPassword)) {
    // die ("Username, password, and email are required fields. Please fill them out.");
    // exit();
    echo '<script>
    window.location.href= "../signup.php";
     alert("Username, password, and email are required fields. Please fill them out.")
    </script>
    "';
}


    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
 
     // Check password complexity
    if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
        // die ("Password must be at least 8 characters long"."<br>"."and include at least uppercase letter,and number");
        // exit();
        echo '<script>
        window.location.href= "../signup.php";
         alert(""Password must be at least 8 characters long"."<br>"."and include at least uppercase letter,and number"")
        </script>
        "';
    }
  
   
     //Cheking if the password made by user are match to each other
    if ($password != $repeatPassword) {
        // echo "Passwords do not match. Please try again.";
        // exit();
        echo '<script>
        window.location.href= "../signup.php";
         alert("Passwords do not match. Please try again.")
        </script>
        "';
    }
    
       //instantiation of Class User from the model
    $user = new User($conn);


    //Cheking if the Username and Email are already taken.
    if ($user->checkUsernameAndEmail($username, $email)) {
        // echo "Username or email already taken. Please choose another username and email.";

        echo '<script>
        window.location.href= "../signup.php";
         alert("Username or email already taken. Please choose another username and email.")
        </script>
        "';
    } else {
        // Register the new user
        $result = $user->registerUser($username, $password, $email);

        if ($result) {
            // echo "Registration successful!";
            // header("location: ../view/login.php");
            
            header("location: ../login.php");
        } 
    
}

   

}
?>
