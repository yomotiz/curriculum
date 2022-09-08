<?php
require_once('db_connect.php');

if (!empty($_POST)) {

    if (empty($_POST["name"])) {
        echo "名前が未入力です。";
    }
    // パスワードが入力されていない場合の処理
    if (empty($_POST["pass"])) {
        echo "パスワードが未入力です。";
    }

    // 両方共入力されている場合
    if (!empty($_POST["name"]) && !empty($_POST["pass"])) {

        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES);
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

        $pdo = db_connect();
        $sql = "INSERT INTO users (name, password) VALUES (:name, :password)";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':password', $pass_hash);
            $stmt->execute();
            echo '登録が完了しました。';
            // main.phpにリダイレクト
            header("Location: main.php");
            exit;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            die();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
    <h1>ユーザー登録画面</h1>
    <form method="POST" action="">
        <br>
        <input type="text" name="name" id="name" placeholder="ユーザー名" style="width:200px;height:20px;" required>
        <br>
        <br>
        <input type="password" name="pass" id="pass" placeholder="パスワード" style="width:200px;height:20px;" required><br>
        <br>
        <input type="submit" value="新規登録" id="signUp" name="signUp" class="botton">
    </form>
</body>

</html>