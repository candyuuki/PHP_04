<?php

//2. DB接続します
try {

  //ID MAMP ='root'
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=cafe;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage()); // データベース接続できない時 DBConnectError
}

// include("funcs.php");
// $pdo = db_conn();
//POSTの受け取りは$_POST["input名"];
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];
$life_flg = $_POST["life_flg"];

// 変数宣言の後にechoで確認
// echo $name;
// echo $email;
// echo $text;


//３．データ登録SQL作成

// $stmt = $pdo->prepare("INSERT INTO cafe_user_table(id, name, lid, lpw, kanri_flg, life_flg, date)VALUES(NULL, :name, :lid, :lpw, :kanri_flg, :life_flg, sysdate())");
$stmt = $pdo->prepare("INSERT INTO cafe_user_table(id, name, lid, lpw, kanri_flg, life_flg, date)VALUES(NULL, :name, :lid, :lpw, :kanri_flg, :life_flg, sysdate())");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid,PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)



$status = $stmt->execute();
// $err_msgs = $stmt->execute();

// echo '$name';


//４．データ登録処理後 結果が入る
$view="";

if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  // $err_msgs = $stmt->errorInfo();
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  // 書き込みが成功した場合 header=移動処理 遷移
  header('Location: login.php');
  // １データのみの抽出の場合はwhileループで取り出さない
  $row = $stmt->fetch();
  
  
}
?>
