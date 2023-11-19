<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="../public/dashboard.css">
    <link rel="stylesheet" href="../public/student.css">
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
            <h1>Search Here</h1>
            <form action="studentsearch.php" method="get">
                <label for="search">Search:</label>
                <input type="text" id="search" name="query" placeholder="Enter ID To Search">
                <button type="submit">Search</button>
            </form>

            <?php
            include "../config/database.php";

            // Check if the delete button is clicked
            if (isset($_GET['delete_id'])) {
                $id_to_delete = $_GET['delete_id'];

                // Delete the record from the database
                $query = "DELETE FROM students WHERE id = '$id_to_delete'";
                $result = mysqli_query($conn, $query);

                // Check if the delete operation was successful
                if ($result) {
                    echo "Record deleted successfully.";
                } else {
                    echo "Error deleting record: " . mysqli_error($conn);
                }
            }

            $display = "SELECT * FROM students";
            $result = $conn->query($display);

            if ($result->num_rows > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Middlename</th>
                            <th>Date Of Birth</th>
                            <th>Gender</th>
                            <th>Province</th>
                            <th>Municipality</th>
                            <th>Barangay</th>
                            <th>Zipcode</th>
                            <th>Phone Number</th>
                            <th>Institute</th>
                            <th>Course</th>
                            <th>Guardian Name</th>
                            <th>Guardian Number</th>
                            <th>Address</th>
                            <th>Delete</th>
                            <th>Update</th>
                            <th>Insert</th> <!-- New Column for Insert Button -->
                        </tr>";

                while ($row = $result->fetch_assoc()) {
                    $id  = $row['id'];

                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["firstname"] . "</td>
                            <td>" . $row["lastname"] . "</td>
                            <td>" . $row["middlename"] . "</td>
                            <td>" . $row["dbirth"] . "</td>
                            <td>" . $row["gender"] . "</td>
                            <td>" . $row["province"] . "</td>
                            <td>" . $row["municipality"] . "</td>
                            <td>" . $row["barangay"] . "</td>
                            <td>" . $row["zipcode"] . "</td>
                            <td>" . $row["number"] . "</td>
                            <td>" . $row["institute"] . "</td>
                            <td>" . $row["course"] . "</td>
                            <td>" . $row["gname"] . "</td>
                            <td>" . $row["gnumber"] . "</td>
                            <td>" . $row["address"] . "</td>
                            <td><a href='?delete_id={$row['id']}'><img src='delete.png' alt=''></a></td>
                            <td><a href='updatestudent.php'> <img src='update.png' alt=''></a></td>
                            <td><a href='addstudent.php' > <img src='insert.png' alt=''</a></td>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            ?>
            
            <a href="../view/login.php" class="logout-btn"><button>Log out</button></a>
        </main>
    </div>
</body>

</html>
