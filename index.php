<?php

    require_once "car_rent.php";
    $db = new PDO("mysql:host=127.0.0.1;dbname=car_rent", "root", "root");

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car Rent</title>
</head>
<body>
    <form action="" method="post">
        <input type="datetime-local" name="date">
        <input type="submit"><br>
    </form><br>

    <form action="" method="post">
        <select name="vendor">
            <? vendors($db) ?>
        </select>
        <input type="submit"><br>
    </form><br>

    <form action="" method="post">
        <input type="date" name="free_car">
        <input type="submit"><br>
    </form><br>

    <form action="" method="post">
        <select name="car">
            <? cars($db) ?>
        </select>
        <input type="date" name="date_start">
        <input type="date" name="date_end">
        <input type="number" name="cost">
        <input type="submit"><br>
    </form><br>

    <form action="" method="post">
        <select name="carUpd">
            <? cars($db) ?>
        </select>
        <input type="number" name="race">
        <input type="submit"><br>
    </form><br>

<?
    if (isset($_POST["date"])) {
        costInDate($db, $_POST["date"]);
    } elseif (isset($_POST["vendor"])) {
        carByVendor($db, $_POST["vendor"]);
    } elseif (isset($_POST["free_car"])) {
        freeCarInDate($db, $_POST["free_car"]);
    } elseif (isset($_POST["car"])) {
        addCar($db, $_POST["car"], $_POST["date_start"], $_POST["date_end"], $_POST["cost"]);
    } elseif (isset($_POST["carUpd"])) {
        updateRace($db, $_POST["carUpd"], $_POST["race"]);
    }
?>
</body>
</html>

