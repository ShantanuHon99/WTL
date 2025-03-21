<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "stud";

$conn = new mysqli($localhost, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['s1'])) {
    $roll = $_POST['roll'];
    $name = $_POST['name'];
    $marks = $_POST['marks'];
    if (empty($roll) || empty($name) || empty($marks)) {
        echo "Please fill all the fields";
        exit();
    }
    $sql = "INSERT INTO `stud_detail`(`S_Roll`, `S_Name`, `S_Marks`) VALUES ('$roll','$name','$marks')";
    $result = $conn->query($sql);

    if ($result) {
        echo "Record Inserted Successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['s2'])) {
    $sql = "SELECT * FROM `stud_detail`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
        <tr>
            <th>Roll</th>
            <th>Name</th>
            <th>Marks</th>
        </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["S_Roll"] . "</td>";
            echo "<td>" . $row["S_Name"] . "</td>";
            echo "<td>" . $row["S_Marks"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 records";
    }
}
    if(isset($_POST['s3'])){
        header("Location: modify.php");
        
    }
    if(isset($_POST['s4'])){
        header("Location: delete.php");
        
    }


$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL using PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        h2 {
            color: #4CAF50;
        }

        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 95%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            color: white;
            transition: background 0.3s;
        }

        input[name="s1"] {
            background-color: #28a745;
        }

        input[name="s2"] {
            background-color: #007bff;
        }

        input[name="s3"] {
            background-color: #ffc107;
        }
        input[name="s4"] {
            background-color:rgb(173, 173, 173);
        }

        input[name="s1"]:hover {
            background-color: #218838;
        }

        input[name="s2"]:hover {
            background-color: #0056b3;
        }

        input[name="s3"]:hover {
            background-color: #e0a800;
        }
        input[name="s4"]:hover {
            background-color:rgb(108, 108, 108);
        }
       
    </style>
</head>
<body>
    <div class="container">
        <h2>SQL using PHP</h2>
        <form action="index.php" method="post">
            <input type="text" name="roll" placeholder="Roll Number" value="">
            <input type="text" name="name" placeholder="Name" value="">
            <input type="text" name="marks" placeholder="Marks" value="">
            <input type="submit" name="s1" value="Submit Records">
            <input type="submit" name="s2" value="View Records">
            <input type="submit" name="s3" value="Modify Records">
            <input type="submit" name="s4" value="Delete">
        </form>
    </div>
</body>
</html>

