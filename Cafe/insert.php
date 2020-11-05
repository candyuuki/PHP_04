<?php


//2. DB接続します
// try {

//   //ID MAMP ='root'
//   //Password:MAMP='root',XAMPP=''
//   $pdo = new PDO('mysql:dbname=cafe;charset=utf8;host=localhost','root','root');
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage()); // データベース接続できない時 DBConnectError
// }

include("funcs.php");
$pdo = db_conn();

//POSTの受け取りは$_POST["input名"];
$cafeName = $_POST["cafeName"];
$cafeUrl = $_POST["cafeUrl"];
$comment = $_POST["comment"];
$reputation = $_POST["reputation"];

// 変数宣言の後にechoで確認！

//☆の編集
// if ($reputation = 1){
//   $reputation = '★☆☆☆☆';
// }elseif($reputation = 2){
//   $reputation = '★★☆☆☆';
// }elseif($reputation = 3){
//   $reputation = '★★★☆☆';
// }elseif($reputation = 4){
//   $reputation = '★★★★☆';
// }else{
//   $reputation = '★★★★★';
// };
// ファイル名を決定。日付時間をファイル名に付与して、同じ名前をアップロードされても重複しないようにする。
// ファイル名のイメージは、'202011010110name.png'
$img = date('YmdHis') . $_FILES['img']['name'];


/**
 * (1)$_FILES['image']['tmp_name']... 一時的にアップロードされたファイル
 * (2)'../picture/' . $image...写真を保存したい場所。先に、pictureというフォルダを作成しておく。
 * (3)move_uploaded_fileで、（１）の写真を（２）に移動させる。
 */
move_uploaded_file($_FILES['img']['tmp_name'], 'img/' . $img);

// バリデーション処理。
if (trim($_POST["cafeName"]) === '') {
  $err[] = 'カフェの名前を入力してください。';
}
if (trim($_POST["cafeUrl"]) === '') {
  $err[] = 'URLを入力してください。';
}
if (trim($_POST["comment"]) === '') {
  $err[] = 'コメントを入力してください。';
}
if (trim($_POST["reputation"]) === '') {
  $err[] = '評価を入力してください。';
}

$fileName = $_FILES['image']['name'];
if (!empty($fileName)) {
  $check =  substr($fileName, -3);
  if ($check != 'jpg' && $check != 'gif' && $check != 'png') {
      $err[] = '写真の内容を確認してください。';
  }
}

// もしerr配列に何か入っている場合はエラーなので、redirect関数でindexに戻す。その際、GETでerrを渡す。
if (count($err) > 0) {
  foreach ($err as $key => $val) {
      echo "<p>${val}</p>";
  }
  exit;
}
//３．データ登録SQL作成

$stmt = $pdo->prepare("INSERT INTO cafe_table(id, cafeName , cafeUrl, comment, reputation, img, date)VALUES(NULL, :cafeName, :cafeUrl, :comment, :reputation, :img, sysdate())");
$stmt->bindValue(':cafeName', $cafeName, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cafeUrl', $cafeUrl,PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':reputation', $reputation, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':img', $img, PDO::PARAM_STR);


$status = $stmt->execute();

// echo '$name';


//４．データ登録処理後 結果が入る
$view="";

// if($status==false){
//   //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
//   // $err_msgs = $stmt->errorInfo();
//   $error = $stmt->errorInfo();
//   exit("ErrorMessage:".$error[2]);
// }else{
//   //５．index.phpへリダイレクト
//   // 書き込みが成功した場合 header=移動処理 遷移
//   header('Location: index.php');
//   // １データのみの抽出の場合はwhileループで取り出さない
//   $row = $stmt->fetch();
  

// }
if ($status == false) {
  sql_error($stmt);
} else {
  redirect('index.php?success=1');
}
?>
