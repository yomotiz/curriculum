<?php
$num = $_POST['num'];
echo "$num <br>";

//入力された数字の数を取得
$kazu = strlen($num);
echo "$kazu <br>";
//入力された文字列の抜き出す番号を選択
$r = mt_rand(1, $kazu);
echo "$r <br>";
//選んだ番号の数字を抜く
$s_num = $num[$r-1];
echo "$s_num <br>";

//運勢の決定
//０：凶、１〜３：小吉、４〜６、中吉、７〜８：吉、９：大吉
if($s_num == 0){
    $unsei = "凶";

}elseif($s_num <= 3){
    $unsei = "小吉";

}elseif($s_num <= 6){
    $unsei = "中吉";

}elseif($s_num <= 8){
    $unsei = "吉";

}else{
    $unsei = "大吉";

}
?>

<p><?php echo date("Y-m-d H:i:s", time()); ?>の運勢は</p>
<p>選ばれた数字は<?php echo $s_num;?></p>
<p><?php echo $unsei;?></p>