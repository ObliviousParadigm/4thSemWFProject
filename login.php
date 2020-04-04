<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logged in</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .center-screen {
            /* display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 100vh; */
            /* height: 500px;
            width: 700px;
            background: black;

            position: fixed;
            top: 50%;
            left: 50%;
            margin-top: -100px;
            margin-left: -200px; */
            text-align: center;
            /* display: flex; */
            margin-top: 250px;
            /* width: 70%; */
        }
    </style>
</head>

<body>
    <?php
    $host = 'localhost';
    $username = 'adarsh';
    $password = 'password';
    $dbname = 'mysql';


    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die('Connect Error (' . $conn->connect_errno . ')' . $conn->connect_error);
    }

    $uname = $_POST['uname'];
    $passwd = $_POST['psw'];



    $sql = "SELECT uname, pwd FROM signup WHERE uname='$uname' AND pwd='$passwd'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // echo "Logged In";
        $data = "SELECT * FROM signup WHERE uname='$uname'";
        $values = $conn->query($data);
        $row = $values->fetch_assoc();
        // echo $data;
        // echo "<br>Username: " . $row['uname'];
        // echo "<br>Email Id: " . $row['recEmail'];
        // echo "<br>Highest Qualification: " . $row['hq'];
    } else {
        // echo "<br>Username or password is wrong! Please try again!";
    }

    // echo "Hello3";

    $conn->close();
    ?>

    <div class="alert alert-dark center-screen container" role="alert">

        <h4 class="alert-heading">
            <?php
            if ($result->num_rows > 0) {
                echo "Logged in as " . $row['uname'];
            } else {
                echo "Error!";
            }
            ?>
        </h4>
        <p>
            <?php
            if ($result->num_rows > 0) {
                echo "Email Id: " . $row['recEmail'];
            } else {
                echo "Username or password is wrong! Please try again!";
                ?>

                <a href='mainpage.html' class='btn btn-danger'>Go back</a>
            <?php
            }
            ?>
        </p>
        <hr>
        <p class="mb-0">
            <?php
            if ($result->num_rows > 0 && $row['hq'] == '') {
                ?>

                <a href='10thgrade.html'><button type='button' class='btn btn-outline-success'>10th Grade</button></a><br><br>
                <a href='12thgrade.html'><button type='button' class='btn btn-outline-success'>12th Grade</button></a><br><br>
                <a href='afterGrad.html'><button type='button' class='btn btn-outline-success'>After Graduation</button></a><br><br>

            <?php
            } else if ($result->num_rows > 0 && $row['hq'] == '10th Grade') {
                ?>

                <!-- // echo "<a href='10thgrade.html'><button type='button' class='btn btn-outline-success'>10th Grade</button></a><br>"; -->
                <a href='12thgrade.html'><button type='button' class='btn btn-outline-success'>12th Grade</button></a><br><br>
                <a href='afterGrad.html'><button type='button' class='btn btn-outline-success'>After Graduation</button></a><br><br>

            <?php
            } else if ($result->num_rows > 0 && $row['hq'] == '12th Grade') {
                ?>

                <!-- // echo "<a href='10thgrade.html'><button type='button' class='btn btn-outline-success'>10th Grade</button></a><br>";
                // echo "<a href='12thgrade.html'><button type='button' class='btn btn-outline-success'>12th Grade</button></a><br>"; -->
                <a href='afterGrad.html'><button type='button' class='btn btn-outline-success'>After Graduation</button></a><br><br>

            <?php
            } else if ($result->num_rows > 0 && $row['hq'] == 'Graduated') {
                ?>

                <!-- // echo "<a href='10thgrade.html'><button type='button' class='btn btn-outline-success'>10th Grade</button></a><br>";
                // echo "<a href='12thgrade.html'><button type='button' class='btn btn-outline-success'>12th Grade</button></a><br>";
                // echo "<a href='afterGrad.html'><button type='button' class='btn btn-outline-success'>After Graduation</button></a><br>"; -->
                Congratualations! We hope you've had a great journey with us! Keep up the great work! <br> Please recommend us to your friends and family!

            <?php
            }
            ?>

        </p>
    </div>
</body>


</html>