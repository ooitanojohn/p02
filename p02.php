<?php
$post = filter_input_array(INPUT_POST);
echo '$post:';
var_dump($post);
echo '<br>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>登録確認画面</h1>
    <article>
        <h2 class="display-none">入力項目</h2>
        <table>
            <tr>
                <td>氏名</td>
                <td><?php echo $post['name'] ?></td>
            </tr>
            <tr>
                <td>年齢</td>
                <td><?php echo $post['age'] ?></td>
            </tr>
            <tr>
                <td>郵便番号</td>
                <td><?php echo $post['p-postal-code'] ?></td>
            </tr>
            <tr>
                <td>都道府県</td>
                <td><?php echo $post['p-region'] ?></td>
            </tr>
            <tr>
                <td>住所</td>
                <td><?php echo $post['p-locality'] ?></td>
            </tr>
            <tr>
                <td>携帯電話</td>
                <td><?php echo $post['phoneNumber'] ?></td>
            </tr>
            <tr>
                <td>キャリア</td>
                <td><?php echo $post['phoneCareer'] ?></td>
            </tr>
            <tr>
                <td>メール</td>
                <td><?php echo $post['email'] ?></td>
            </tr>
            <tr>
                <td>ボタン</td>
                <td><?php echo $post['submit'] ?></td>
            </tr>
        </table>
    </article>
</body>

</html>