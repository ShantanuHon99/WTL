<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "stud";

$conn = new mysqli($localhost, $username, $password, $dbname);

    if(isset($_POST['s3'])){
        $roll = $_POST['roll'];
        if (empty($roll)) {
            echo "Please fill the field";
            exit();
        }
        $sql = "DELETE FROM `stud_detail` WHERE `S_ROLL`='$roll'";
        $result = $conn->query($sql);    
        if ($result) {
            echo "Record Deleted Successfully";    
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
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


        input[name="s3"] {
            background-color:rgb(255, 58, 58);
        }


        input[name="s3"]:hover {
            background-color:rgb(224, 0, 0);
        }
       
    </style>
</head>
<body>
    <div class="container">
        <h2>SQL using PHP</h2>
        <form action="delete.php" method="post">
            <input type="text" name="roll" placeholder="Roll Number" value="">
            <input type="submit" name="s3" value="Delete Records">

        </form>
    </div>
</body>
</html>

