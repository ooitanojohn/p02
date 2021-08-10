<?php
//********************************************************
// csvファイル出力
//********************************************************

// 前処理
$fname = 'data.txt'; // csvファイル名
$post = filter_input_array(INPUT_POST); // post受け取り

// ファイル出力処理
$rec = ''; // csvレコード組み立て
foreach ($post as $val) {
    $rec .= $val . ',';
}
$rec = rtrim($rec, ',');
$rec .= "\n"; // 終端に改行を付加し、csvレコード完成

$fp = fopen($fname, 'a'); // ファイル追加オープン
fputs($fp, $rec); // ファイル追加書込
fclose($fp); // ファイルクローズ

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Document</title>
</head>

<body>
    <header class="
        bg-dark
        d-flex
        flex-row
        justify-content-center
        align-items-center
        p-3
        mb-5
      ">
        <p class="w-75 mb-0">
            <img src="img/header_logo_osaka.webp" width="189" height="43" />
        </p>
    </header>
    <main class="vh-100 fw-bold container-sm">
        <h1><?php echo $post['submit'] ?>確認画面</h1>
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
    </main>
    <footer class="bg-dark p-4"></footer>
</body>

</html>