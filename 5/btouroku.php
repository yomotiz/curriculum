<?php
require_once('db_connect.php');
require_once('function.php');

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

// ボタンが押された場合
if (!empty($_POST)) {
    // 入力チェック
    if (empty($_POST["title"])) {
        echo 'タイトルが未入力です。';
    } elseif (empty($_POST["date"])) {
        echo '発売日が未入力です。';
    } elseif (empty($_POST["stock"])) {
        echo '在庫数が未入力です。';
    }

    if (!empty($_POST["title"]) && !empty($_POST["date"]) && !empty($_POST["stock"])) {
        // 入力した格納
        $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
        $date = htmlspecialchars($_POST['date'], ENT_QUOTES);
        $stock = htmlspecialchars($_POST['stock'], ENT_QUOTES);

        // PDOのインスタンスを取得
        $pdo = db_connect();

        try {
            // SQL文の準備
            $sql = "INSERT INTO books (title, date , stock) VALUES (:title, :date,:stock)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':stock', $stock);
            $stmt->execute();
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
    <h1>本　登録画面</h1>
    <form method="POST" action="">
        <input type="text" name="title" id="title" placeholder="タイトル" style="width:300px;height:30px;">
        <br>
        <br>
        <input type="text" name="date" id="date" placeholder="発売日" style="width:300px;height:30px;"><br>
        <br>
        在庫数<br>
        <select name="stock">
            <option disabled selected value>選択してください</option>
            <?php for ($i = 1; $i <= 100; $i++) { ?>
                <option value="<?php echo $i; ?>">
                    <?php echo $i; ?>
                </option>
            <?php } ?>
        </select>
        <br>
        <br>
        <input type="submit" value="登録" id="post" name="post" class="botton">
    </form>
</body>

</html>