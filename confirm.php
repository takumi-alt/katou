<?php
session_start();
if (isset($_SESSION['name'])) {

    $name = $_SESSION['name'];
    $sex = $_SESSION['sex'];
    $birth_date = $_SESSION['birth_date'];
    $postal_code = $_SESSION['postal_code'];
    $residence = $_SESSION['residence'];
    $tel = $_SESSION['tel'];
    $email = $_SESSION['email'];
    $kinds = $_SESSION['kinds'];
    $body = $_SESSION['body'];
}
// tokenを作成
$token = sha1(uniqid(mt_rand(), true));
$_SESSION['token'] = $token;
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ (確認)</title>
</head>

<body>
    <div>
        <h2>お問い合わせ内容確認</h2>
        <table>

            <tr>
                <th>お名前</th>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <th>性別</th>
                <td><?php echo $sex; ?></td>
            </tr>
            <tr>
                <th>生年月日</th>
                <td><?php echo $birth_date; ?></td>
            </tr>
            <tr>
                <th>郵便番号</th>
                <td><?php echo $postal_code; ?></td>
            </tr>
            <tr>
                <th>住所</th>
                <td><?php echo $residence; ?></td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td><?php echo $tel; ?></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td><?php echo $kinds; ?></td>
            </tr>
            <tr>
                <th>相談内容</th>
                <td><?php echo nl2br($body); ?></td>
            </tr>
        </table>
        <p> こちらの内容で送信してもよろしいですか？</p>
        <form method="post" action="send.php">
            <!-- tokenをsend.phpへ送る -->
            <input type="hidden" name="token" value="<?php echo $token ?>">
            <button type="submit" value="送信">送信</button>
            <a href="index.php?action=edit">戻る</a>
        </form>
    </div>
</body>

</html>