<?php
require_once("getData.php");

$getdata = new getData();
$user = $getdata->getUserData();
//print_r($user);
//print("<br>");
$post = $getdata->getPostData();
/*print_r($post);
print("<br>");
foreach ($post as $key1=>$value1) {
    echo $post["$key1"]["id"];
    print("<br>");
}*/

function categori($num){
    switch($num){
        case 1:
            echo "食事";
            break;
        case 2:
            echo "旅行";
            break;
        default:
            echo "その他";
            break;
    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="zen">
        <div class="heder">
            <div class="icon">
                <img src="1599315827_logo.png" alt="logo" title="ロゴ" />
            </div>
            <div class="box">
                <div class="boxname">
                    <div class="rmozi">
                        <div>ようこそ　<?php echo $user["last_name"] . $user["first_name"]; ?>さん</div>
                    </div>
                </div>
                <div class="boxhi">
                    <div class="rmozi">
                        <div>最終ログイン日：<?php echo $user["last_login"]; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="cline">
                <div class="kid hutozi"><div>記事ID</div></div>
                <div class="title hutozi"><div>タイトル</div></div>
                <div class="cate hutozi"><div>カテゴリ</div></div>
                <div class="hon hutozi"><div>本文</div></div>
                <div class="niti hutozi"><div>投稿日</div></div>
            </div>

            <?php
            foreach($post as $key1=>$value1){ ?>
            <div class="cline">
                <div class="kid2 hutuzi"><div><?php echo $post["$key1"]["id"]; ?></div></div>
                <div class="title2 hutuzi"><div><?php echo $post["$key1"]["title"]; ?></div></div>
                <div class="cate2 hutuzi"><div><?php categori($post["$key1"]["category_no"]); ?></div></div>
                <div class="hon2 hutuzi"><div><?php echo $post["$key1"]["comment"]; ?></div></div>
                <div class="niti2 hutuzi"><div><?php echo $post["$key1"]["created"]; ?></div></div>
            </div>

            <?php } ?>

            
            


        </div>
        <div class="footer">
            <div>Y&I group.inc</div>
        </div>
    </div>
</body>

</html>