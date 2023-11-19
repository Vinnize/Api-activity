<?php



include "../config/database.php";
include "../model/admin.model.php";


if(isset($_POST['admin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['confirmpass'];


    $admin = new Admin($conn);

if(empty($username) || empty($password) || empty($repeatPassword) || $password!=$repeatPassword){
    echo '<script>
    window.location.href= "../admin/admins.php";
     alert("Other Text Field are Blank Or Password did not Match PLease Fill Out Again.")
   </script>
    "';
}elseif($admin->checkUsername($username)){
    echo '<script>
    window.location.href= "../admin/admins.php";
     alert("The Username Is Already Taken!.")
   </script>
    "';
}else{
    $result = $admin->registerAdmin($username,$password);

    if($result){
        echo '<script>
        window.location.href= "../admin/admins.php";
         alert("Admin Is Successfully Added.")
       </script>
        "';
    }
}


}


if(isset($_POST['inss'])){
$institute = $_POST['institute'];





$ins = new Admin($conn);



if(empty($institute)){
    echo '<script>
    window.location.href= "../admin/admins.php";
     alert("The Field for Institute is Empty.")
   </script>
    "';
}elseif($ins->checkInstitute($institute)){







    echo '<script>
    window.location.href= "../admin/admins.php";
     alert("Institute is Already Taken.")
   </script>
    "';




}else{
   $result =  $ins->AddInstitute($institute);

    if($result){
        echo '<script>
        window.location.href= "../admin/admins.php";
         alert("Institute Is Successfully Added.")
       </script>
        "';
    }
}


}



if(isset($_POST['Click'])){
$course = $_POST['course'];



$c =new Admin($conn);



if(empty($course)){
    echo '<script>
    window.location.href= "../admin/admins.php";
     alert("Text Field Is Empty.")
   </script>
    "';
}elseif($c->checkCourse($course)){
    echo '<script>
    window.location.href= "../admin/admins.php";
     alert("Course Is Already Taken.")
   </script>
    "';
}else{
    $result = $c->AddCourse($course);

    if($result){
        echo '<script>
        window.location.href= "../admin/admins.php";
         alert("Course Is Successfully Added.")
       </script>
        "';
    }
}


}




?>