<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>




<?php

    $servername = "localhost";

    $username = "root";

    $password = "";

    $dbname = "event-ms"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {

        die("Connection Failed" . $conn->connect_error);

    }

?>