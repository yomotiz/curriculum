<link rel="stylesheet" href="style.css">
<body>

<?php 
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
$nameA = $_POST["nameA"];
//echo "$nameA <br>";
$ans1 = $_POST["ans1"];
//echo "$ans1 <br>";
$ans2 = $_POST["ans2"];
//echo "$ans2 <br>";
$ans3 = $_POST["ans3"];
//echo "$ans3 <br>";
$toi1 = $_POST["toi1"];
//echo "$toi1 <br>";
$toi2 = $_POST["toi2"];
//echo "$toi2 <br>";
$toi3 = $_POST["toi3"];
//echo "$toi3 <br>"; 
//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する

function seigo($kai,$kotae){
    if ($kai == $kotae){
        echo "正解！";
    }else{
        echo "残念・・・";
    }
}

?>
<p><?php echo $nameA ?>さんの結果は・・・？</p>
<p>①の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<p><?php seigo($toi1,$ans1); ?></p>
<p>②の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<p><?php seigo($toi2,$ans2); ?></p>
<p>③の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<p><?php seigo($toi3,$ans3); ?></p>

</body>