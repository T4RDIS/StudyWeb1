<?php
$db = new mysqli("localhost", "", "", "");

if ($db->connect_error) {
die("Nie można się połączyć z bazą danych!");
}

$username = stripslashes(htmlspecialchars($_GET['username']));
$message = stripslashes(htmlspecialchars($_GET['message']));

if ($message == "" || $username == "") {
die();
}

$result = $db->prepare("INSERT INTO messages VALUES('',?,?)");
$result->bind_param("ss", $username, $message);
$result->execute();