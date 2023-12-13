<?php
session_start();
require_once("connect.php");

if (isset($_POST["add"]) && strlen(trim($_POST["userName"])) > 0) {
    $member = trim($_POST["userName"]);
    $army = trim($_POST["userArmy"]);
    $stmt = $dbh->prepare("INSERT INTO members (name, army) VALUES (:name, :army)");
    $stmt->bindParam(':name', $member);
    $stmt->bindParam(':army', $army);
    $stmt->execute();
}
$stmtAll = $dbh->query("SELECT name,army FROM members");
$userList = $stmtAll->fetchAll();
foreach ($userList as $row) {
    echo $row["name"]." - ".$row["army"];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Турнир</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Регистрация участников</h1>
        <form action="index.php" method="post">
            <div class="mb-3">
                <label for="userName" class="form-label">Имя участника</label>
                <input name="userName" type="text" class="form-control" id="userName" placeholder="Иван">
            </div>
            <div class="mb-3">
                <label for="userArmy" class="form-label">Армия участника</label>
                <input name="userArmy" type="text" class="form-control" id="userArmy" placeholder="Некроны">
            </div>
            <button name="add" type="submit" class="btn btn-primary mb-3">Добавить</button>
        </form>
        <h3>Список участников</h3>
        <form action="index.php" method="post">
            <?php
            ?>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Иван-Некроны
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    Сергей - Имперская гвардия
                </label>
            </div>
            <button type="submit" class="btn btn-danger mb-3">Удалить</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>