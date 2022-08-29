<link rel="stylesheet" href="style.css">
<body>

<?php
//POST送信で送られてきた名前を受け取って変数を作成
$my_name = $_POST["my_name"];

//①画像を参考に問題文の選択肢の配列を作成してください。
$toi1 = [80, 22, 20, 21];
$toi2 = ["PHP", "Python", "JAVA", "HTML"];
$toi3 = ["join", "select", "insert", "update"];

//② ①で作成した、配列から正解の選択肢の変数を作成してください
$ans1 = 80;
$ans2 = "HTML";
$ans3 = "select";
?>

<p>お疲れ様です<?php echo $my_name ?>さん</p>

<!--フォームの作成 通信はPOST通信で-->
<form action="answer.php" method="post">
    <h2>①ネットワークのポート番号は何番？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?PHP foreach ($toi1 as $value) { ?>
        <label>
        <input type="radio" name="toi1" value="<?php echo $value; ?>"required><?php echo $value;
                                                                    } ?>
                                                                    </label>

    <h2>②Webページを作成するための言語は？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?PHP foreach ($toi2 as $value) { ?>
        <label>
        <input type="radio" name="toi2" value="<?php echo $value; ?>"required><?php echo $value;
                                                                    } ?>
                                                                    </label>

    <h2>③MySQLで情報を取得するためのコマンドは？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?PHP foreach ($toi3 as $value) { ?>
        <label>
        <input type="radio" name="toi3" value="<?php echo $value; ?>"required><?php echo $value;
                                                                    } ?>
                                                                    </label>
    <br>
    <!--問題の正解の変数と名前の変数を[answer.php]に送る-->
    <input type="hidden" name="nameA" value="<?php echo $my_name; ?>" />
    <input type="hidden" name="ans1" value="<?php echo $ans1; ?>" />
    <input type="hidden" name="ans2" value="<?php echo $ans2; ?>" />
    <input type="hidden" name="ans3" value="<?php echo $ans3; ?>" />
    <input type="submit" value="回答する" />
    
</form>

                                                                </body>