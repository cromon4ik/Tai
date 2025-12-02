<?php
require 'config.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM characters WHERE id = ?");
$stmt->execute([$id]);
$char = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$char) {
    die("Postać nie istnieje.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nickname = $_POST['nickname'];
    $class = $_POST['class'];
    $strength = $_POST['strength'];
    $intelligence = $_POST['intelligence'];
    $agility = $_POST['agility'];
    $level = $_POST['level'];

    $stmt = $pdo->prepare("
        UPDATE characters
        SET nickname=?, class=?, strength=?, intelligence=?, agility=?, level=?
        WHERE id=?
    ");

    $stmt->execute([$nickname, $class, $strength, $intelligence, $agility, $level, $id]);

    header("Location: index.php");
    exit;
}
?>

<!doctype html>
<html>
<head><meta charset="utf-8"><title>Edytuj postać</title></head>
<body>
<h1>Edytuj postać</h1>

<form method="POST">
    Nick: <input type="text" name="nickname" value="<?= htmlspecialchars($char['nickname']) ?>" required><br><br>
    Klasa: <input type="text" name="class" value="<?= htmlspecialchars($char['class']) ?>" required><br><br>
    Siła: <input type="number" name="strength" value="<?= $char['strength'] ?>" required><br><br>
    Inteligencja: <input type="number" name="intelligence" value="<?= $char['intelligence'] ?>" required><br><br>
    Zwinność: <input type="number" name="agility" value="<?= $char['agility'] ?>" required><br><br>
    Poziom: <input type="number" name="level" value="<?= $char['level'] ?>" required><br><br>

    <button type="submit">Zapisz zmiany</button>
</form>

</body>
</html>
