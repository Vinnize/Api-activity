<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../public/dashboard.css">
    <link rel="stylesheet" href="../public/admin.css">
</head>

<body>
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="admins.php"><button>Admin</button></a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="student.php">Student</a></li>
            <li><a href="faculty.php">Faculty</a></li>
            <li><a href="subject.php">Subject</a></li>
        </ul>
    </div>

    <div class="content">
        <header>
            <h1>Welcome to the Dashboard!</h1>
        </header>
        <main>
            <h2>Insert Admin Here</h2>
           <form action="../controller/admin.controller.php" method="POST">
           <label for="Username">Username : </label>
<input type="text" name="username" placeholder="Enter Username">

<label for="Password">Password</label>
<input type="password" name="password" placeholder="Enter Password">

<label for="Confirmpass">Password Confirmation</label>
<input type="password" name="confirmpass" placeholder="Confirm Password">


<input type="submit" name="admin">
           </form>
           <h2>Insert institute Here</h2>
           <form action="../controller/admin.controller.php" method="POST">
                   <label for="">institute:</label>
                   <input type="text" name="institute" placeholder="Enter Institute Here">

                   <input type="submit" name="inss">
           </form>

           <h2>Insert Course Here</h2>
           <form action="../controller/admin.controller.php" method="POST"> 
            <label for="">Course:</label>
            <input type="text" name="course" placeholder="Enter Course">

            <input type="submit" name="Click">
            <a href=""><button>Log out</button></a>
           </form>


          
        </main>
    </div>


 
 
   


</body>

</html>

</body>
</html>