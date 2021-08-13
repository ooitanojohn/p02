<?php
//********************************************************
// エラーチェック & CSVファイル出力
//********************************************************

//********************* 前処理 **************************
// *** 変数初期化 ***
$err_msg =
  [
    'name' => '',
    'age' => '',
    'zip' => '',
    'addr1' => '',
    'addr2' => '',
    'tel' => '',
    'mobile' => '',
    'mail' => ''
  ];
// *** csvファイル名 ***
$fname = 'data.txt';

// 登録ボタン押下時処理
if (isset($_GET['button'])) {

  // *** データを受信し、変数へ格納 ***
  $get = filter_input_array(INPUT_GET); // get受け取り
  // *** err_msg代入 ***
  $err_msg = [
    'name' => '氏名を入力してください',
    'age' => '年齢を入力してください',
    'zip' => '郵便番号を入力してください',
    'addr1' => '住所1を入力してください',
    'addr2' => '住所2を入力してください',
    'tel' => '電話番号を入力してください',
    'mobile' => 'キャリアを入力してください',
    'mail' => 'メールを入力してください'
  ];
  // *** 各種入力チェック ***
  foreach ($get as $key => $val) {
    if ($val !== '') {         // 入力されていれば
      $err_msg[$key] = '';     // err_msgを空にする
    }
  }
  // *** エラーチェック結果判定 ***
  $err_judge = array_filter($err_msg);
  if (empty($err_judge)) {
    // ファイル出力処理
    //*** ＣＳＶレコード組み立て
    $rec = '';
    $rec = $get['name'] . ',';                //氏名
    $rec = $rec . $get['age'] . ',';         //年齢
    $rec = $rec . $get['zip'] . ' ,';          //郵便番号
    $rec = $rec . $get['addr1'] . ',';     //住所１
    $rec = $rec . $get['addr2'] .  ',';     //住所２
    $rec = $rec . $get['tel'] . ',';           //電話番号
    $rec = $rec . $get['mobile'] . ',';    //キャリア
    $rec = $rec . $get['mail'];             //メール
    $rec = $rec . "\n";   // 終端に改行を付加し、csvレコード完成
    $fp = fopen($fname, 'a'); // ファイル追加オープン
    fputs($fp, $rec); // ファイル追加書込
    fclose($fp); // ファイルクローズ

    // *** 新しいページへ遷移 ***
    header('Location:ok.html');
    exit;
  }
}
// アドレス直接指定呼び出し
else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <form method="GET" class="h-adr container w-75">
      <div class="row mb-3">
        <label class="col-2" for="name">氏名</label>
        <input class="col-4" type="text" id="name" name="name" autofocus />
        <p class="col-3 mb-0"><?php echo $err_msg['name'] ?></p>
      </div>
      <div class="row mb-3">
        <label class="col-2" for="age">年齢</label>
        <input class="col-4" type="number" id="age" name="age" />
        <p class="col-3 mb-0"><?php echo $err_msg['age'] ?></p>
      </div>
      <div class="row mb-3">
        <span class="p-country-name" style="display: none">Japan</span>
        <label class="col-2" for="p-postal-code">郵便番号:</label>
        <input class="col-4 p-postal-code" type="text" id="p-postal-code" name="zip" size="8" maxlength="8" />
        <p class="col-3 mb-0"><?php echo $err_msg['zip'] ?></p>
      </div>
      <div class="row mb-3">
        <label class="col-2" for="Prefectures">都道府県:</label>
        <select id="Prefectures" name="addr1" class="p-region col-2">
          <option value=""></option>
        </select>
        <p class="col-3 mb-0"><?php echo $err_msg['addr1'] ?></p>
      </div>
      <div class="row mb-3">
        <label class="col-2" for="p-locality">住所:</label>
        <input type="text" id="p-locality" name="addr2" class="col-4 p-locality p-street-address p-extended-address" />
        <p class="col-3 mb-0"><?php echo $err_msg['addr2'] ?></p>
      </div>
      <div class="row mb-3">
        <label class="col-2" for="phoneNumber" size="10" maxlength="10">電話番号</label>
        <input class="col-2" type="text" id="phoneNumber" name="tel" />
        <p class="col-3 mb-0"><?php echo $err_msg['tel'] ?></p>
      </div>
      <div class="row mb-3">
        <p class="col-2">携帯キャリア</p>
        <div class="form-check col-2">
          <input class="form-check-input" type="radio" id="phoneCareer" name="mobile" value="Au" />
          <label class="form-check-label" for="phoneCareer">Au</label>
        </div>
        <div class="form-check col-2">
          <input class="form-check-input" type="radio" id="phoneCareer" name="mobile" value="Docomo" />
          <label class="form-check-label" for="phoneCareer">Docomo</label>
        </div>
        <div class="form-check col-2">
          <input class="form-check-input" type="radio" id="phoneCareer" name="mobile" value="Softbank" />
          <label class="form-check-label" for="phoneCareer">Softbank</label>
        </div>
        <p class="col-3 mb-0"><?php echo $err_msg['mobile'] ?></p>
      </div>
      <div class="row mb-3">
        <label class="col-2" for="email">メール</label>
        <input class="col-7" type="email" id="email" name="mail" placeholder="ka@gnail.com" />
        <p class="col-3 mb-0"><?php echo $err_msg['mail'] ?></p>
      </div>
      <div class="row mb-3">
        <label class="col-2" for="button">実行ボタン</label>
        <div class="col">
          <button class="col" type="submit" id="button" name="button" value="登録">
            登録
          </button>
          <button class="col" type="submit" id="button" name="button" value="変更">
            変更
          </button>
          <button class="col" type="submit" id="button" name="button" value="削除">
            削除
          </button>
        </div>
      </div>
    </form>
  </main>
  <footer class="bg-dark p-4"></footer>
  <!-- 郵便番号自動 -->
  <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
  <!-- 都道府県配列 -->
  <script type="text/javascript" src="js/Prefecturs.js"></script>
</body>

</html>