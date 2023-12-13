<?php
$user = "wargames";
$pass = "wargames";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=tourney', $user, $pass);
    echo $dbh->getAttribute(PDO::ATTR_CONNECTION_STATUS);
} catch (Exception $e) {
    echo $e;
}
?>