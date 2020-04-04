<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .center-screen {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 100vh;
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

    $uname = $_POST['newuname'];
    $passwd = $_POST['npsw'];
    $re = $_POST['REmail'];
    $hq = $_POST['Hq'];


    $sql = "INSERT INTO signup(uname, pwd, recEmail, hq) values('$uname', '$passwd', '$re', '$hq')";

    $done = $conn->query($sql);

    // if ($done === TRUE) {
    //     echo "New record created succeessfully";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }

    $conn->close();
    ?>

    <div class="alert alert-dark container center-screen" role="alert">

        <h4 class="alert-heading">
            <?php
            if ($done === TRUE) {
                echo "Congratulations!";
            } else {
                echo "Error!";
            }
            ?>
        </h4>
        <p>
            <?php
            if ($done === TRUE) {
                echo "Your data has successfully been saved";
            } else {
                echo $sql . "<br>" . $conn->error;
            }
            ?>
        </p>
        <hr>
    </div>

</body>

</html>