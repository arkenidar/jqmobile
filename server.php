<?php
ini_set('display_errors', 1);

require 'db-user.php';

$dbh = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);

$stmt = $dbh->prepare('SELECT DISTINCT tag FROM tags WHERE tag LIKE :keyword LIMIT 0, 25');

$keyword = '%'.$_REQUEST['keyword'].'%';
$stmt->bindParam(':keyword', $keyword);
$stmt->execute();

echo 'Results for "'.htmlspecialchars($_REQUEST['keyword']).'":<br>';

while ($row = $stmt->fetch()) {
print(htmlspecialchars($row['tag']).'<br>');
}
