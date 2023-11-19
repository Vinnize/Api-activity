<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../public/dashboard.css">
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
            <div class="box">
                <form class="form1">
                    <?php
                    include "../config/database.php";
                    // SQL query to select all faculty IDs from the table
                    $sql = "SELECT id FROM faculty";
                    $result = $conn->query($sql);
                    // Check if the query was successful
                    if ($result) {
                        // Get the number of rows (faculty IDs)
                        $totalFacultyIds = $result->num_rows;
                        echo "<p>Total Faculty: $totalFacultyIds</p>";
                        // Free the result set
                        $result->free_result();
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    ?>
                </form>
            </div>

            <div class="box">
                <form class="form2">
                    <?php
                    // SQL query to select all students IDs from the table
                    $sql = "SELECT id FROM students";
                    $result = $conn->query($sql);
                    // Check if the query was successful
                    if ($result) {
                        // Get the number of rows (faculty IDs)
                        $total = $result->num_rows;
                        echo "<p>Total Students: $total</p>";
                        // Free the result set
                        $result->free_result();
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    ?>
                </form>
            </div>

            <div class="box">
                <form class="form3">
                    <?php
                    // SQL query to select all faculty IDs from the table
                    $sql = "SELECT COUNT(*) as total FROM students WHERE institute = 'FCDSET'";
                    $result = $conn->query($sql);
                    // Check if the query was successful
                    if ($result) {
                        // Get the number of rows (faculty IDs)
                        $total = $result->num_rows;
                        echo "<p>Total Students in the Institute of FCDSET: $total</p>";
                        // Free the result set
                        $result->free_result();
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    ?>
                </form>
            </div>

            <!-- Separate box for Logout link -->
            <div class="logout-box">
                <div class="logout-link">
                    <a href="../view/login.php">Logout</a>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
