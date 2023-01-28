<?php
session_start();
if ($_SESSION['token'] === $_POST['token']) {
    echo "お問い合わせありがとうございました";
} else {
    // 直接send.phpにアクセスしようとしたら強制的にリダイレクト
    header('Location:http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php');
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>送信完了y</title>
</head>

<body>

</body>

</html>