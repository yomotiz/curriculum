<?php
require_once('db_connect.php');
require_once('function.php');

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

$pdo = db_connect();

try {
    $sql = "SELECT * FROM books ORDER BY id DESC" ;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    //echo '表示OK';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die();
}
?>

<!doctype html>
<html>
<link rel="stylesheet" href="style.css">
<head>
    <meta charset="UTF-8">
    <title>在庫一覧画面</title>
</head>
<body>
    <h1 class="down">在庫一覧画面</h1>
    <a href="btouroku.php" class="minibotton">新規登録</a>
    <a href="logout.php" class="minibotton_g">ログアウト</a>
    <br>
    <br>

    <table border="1">
    <tr>
        <th>タイトル</th>
        <th>販売日</th>
        <th>在庫数</th>
        <th></th>
    </tr>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['stock']; ?></td>
            <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="minibotton_r">削除</a></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
