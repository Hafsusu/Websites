<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $phoneNo = $_POST["phoneNo"];
    $birthDate = $_POST["birthDate"];
    $gender = $_POST["gender"];
    $nation = $_POST["nation"];
    $stat = $_POST["stat"];
    $education = $_POST["education"];
    $city = $_POST["city"];
    $region = $_POST["region"];
    $postalCode = $_POST["postalCode"];

    //database connection
    $host = "localhost";
    $dbname = "test";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($host, $username, $password, $dbname);
    //$conn = new mysqli('localhost', 'root', '', 'test');
    /*if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into StudRegistration(fullName, email, phoneNumber, birthDate, gender, nation, state, education, city, region, postalCode) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisssssssi", $fullName, $email, $phoneNo, $birthDate, $gender, $nation, $state, $education, $city, $region, $postalCode);
        $stmt->execute();
        echo "Registered successfully!";
        $stmt->close();
        $conn->close();
    }*/
    if(mysqli_connect_errno()){
        die("Connection error: " .mysqli_connect_errno());
    }
    $sql = "INSERT INTO StudRegistration (fullName, email, phoneNumber, birthDate, gender, nation, stat, education, city, region, postalCode) VAlUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);
    if( ! mysqli_stmt_prepare($stmt, $sql)){
        die(mysqli_error($conn));
    }
        mysqli_stmt_bind_param($stmt, "ssissssissi", $fullName, $email, $phoneNo, $birthDate, $gender, $nation, $stat, $education, $city, $region, $postalCode);

    mysqli_stmt_execute($stmt);

    echo "Registered successfully!";

?>