<?php
session_start();
if (isset($_POST['submit'])) {

    // POSTされたデータをエスケープ処理して変数に格納
    $name  = htmlspecialchars($_POST['name'], ENT_QUOTES | ENT_HTML5);
    $sex = htmlspecialchars($_POST['sex'], ENT_QUOTES | ENT_HTML5);
    $birth_date = htmlspecialchars($_POST['birth_date'], ENT_QUOTES | ENT_HTML5);
    $postal_code = htmlspecialchars($_POST['postal_code'], ENT_QUOTES | ENT_HTML5);
    $residence = htmlspecialchars($_POST['residence'], ENT_QUOTES | ENT_HTML5);
    $tel = htmlspecialchars($_POST['tel'], ENT_QUOTES | ENT_HTML5);
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES | ENT_HTML5);
    $kinds = htmlspecialchars($_POST['kinds'], ENT_QUOTES | ENT_HTML5);
    $body = htmlspecialchars($_POST['body'], ENT_QUOTES | ENT_HTML5);

    // セッションに変数を格納
    $_SESSION['name'] = $name;
    $_SESSION['sex'] = $sex;
    $_SESSION['birth_date'] = $birth_date;
    $_SESSION['postal_code'] = $postal_code;
    $_SESSION['residence'] = $residence;
    $_SESSION['tel'] = $tel;
    $_SESSION['email'] = $email;
    $_SESSION['kinds'] = $kinds;
    $_SESSION['body'] = $body;
    // 確認画面(confirm.php)にリダイレクト
    header('Location:http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/confirm.php');
}

if (isset($_GET) && $_GET['action'] === 'edit') {
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
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ</title>
</head>

<body>
    <form method="post" action="index.php">
        <p>氏名 (必須)</p>
        <input type="text" name="name" value="<?php if (isset($name)) {
                                                    echo $name;
                                                } ?>" placeholder="お名前" maxlength="50" required>

        <p>性別 (必須)</p>
        <input type="radio" name="sex" value="男" <?php if (isset($sex) && $sex === "男") {
                                                        echo "checked";
                                                    } else {
                                                        echo "checked";
                                                    } ?>><label>男</label>
        <input type="radio" name="sex" value="女" <?php if (isset($sex) && $sex === "女") {
                                                        echo "checked";
                                                    } ?>><label>女</label>

        <p>生年月日 (必須)</p>
        <input type="date" id="start" name="birth_date" value="<?php if (isset($birth_date)) {
                                                                    echo $birth_date;
                                                                } ?>" placeholder="2000-01-01" required>

        <p>郵便番号 (必須)</p>
        <input type="text" name="postal_code" value="<?php if (isset($postal_code)) {
                                                            echo $postal_code;
                                                        } ?>" placeholder="000-0000" minlength="7" maxlength="8" required>

        <p>住所 (必須)</p>
        <input type="text" name="residence" value="<?php if (isset($residence)) {
                                                        echo $residence;
                                                    } ?>" placeholder="住所" maxlength="200" required>

        <p>電話番号 (任意)</p>
        <input type="tel" name="tel" value="<?php if (isset($tel)) {
                                                echo $tel;
                                            } ?>" placeholder="000-0000-0000" size="15" maxlength="15">

        <p>メールアドレス (任意)</p>
        <input type="email" name="email" value="<?php if (isset($email)) {
                                                    echo $email;
                                                } ?>" placeholder="メールアドレス">

        <p>お問い合わせの種類 (必須)</p>
        <input type="radio" name="kinds" value="a" <?php if (isset($kinds) && $kinds === "a") {
                                                        echo "checked";
                                                    } else {
                                                        echo "checked";
                                                    } ?> checked><label>aについて</label>
        <input type="radio" name="kinds" value="b" <?php if (isset($kinds) && $kinds === "b") {
                                                        echo "checked";
                                                    } ?>><label>bについて</label>
        <input type="radio" name="kinds" value="c" <?php if (isset($kinds) && $kinds === "c") {
                                                        echo "checked";
                                                    } ?>><label>cについて</label>

        <p>相談内容 (必須)</p>
        <textarea type="text" name="body" maxlength="1000" placeholder="相談内容" rows="7" required><?php if (isset($body)) {
                                                                                                    echo $body;
                                                                                                } ?></textarea>
        <button type="submit" name="submit" value="確認">確認</button>
    </form>

</body>

</html>