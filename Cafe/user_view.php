<?php
//1.  GETでid値を取得
$id = $_GET["id"];



//2.DB接続など
// try {
//   //ID MAMP ='root'
//   //Password:MAMP='root',XAMPP=''
//   $pdo = new PDO('mysql:dbname=cafe;charset=utf8;host=localhost','root','root');
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage()); // データベース接続できない時 DBConnectError
// }
require("funcs.php");
$pdo = db_conn();
//3.SELECT * FROM cafe_table WHERE id=:id;
$stmt = $pdo->prepare("SELECT * FROM cafe_user_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4.データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  // 1データのみの抽出の場合はwhileループで取り出さない
  $row = $stmt->fetch();

}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
  <style>
  div{
    padding: 10px;font-size:16px;
  }
  *{
    /* background-color: #81D8D0; */
    background-color: #eeeeee;

}
  .wrapper{
    background-color: #81D8D0;
    /* background-color: #eeeeee; */
  }
  fieldset{
    /* background-color: #eeeeee; */

  }
  a {
    text-decoration: none;
    color: #B29663;
  }
  </style>
  <!-- フォーム -->
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="user_select.php">ユーザー一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="user_update.php">
<div class="wrapper">
  <div class="jumbotron">
   <fieldset>
    <legend>会員詳細</legend>
     <label>名前：<input type="text" name="name" value="<?=$row['name']?>"></label><br>
     <label>ID：<input type="text" name="lid" value="<?=$row['lid']?>"></label><br>
     <label>Password：<input type="password" name="lpw" value="<?=$row['lpw']?>"></label><br>
      <label>管理者：<input type="checkbox" name="kanri_flg" value="<?='管理者'['kanri_flg']?>"></label><br>
     <label>ユーザー：<input type="checkbox" name="kanri_flg" value="<?=$ユーザー['kanri_flg']?>"></label></><br>
     <label><input type="hidden" name="life_flg" value="<?=$row['life_flg']?>"></label>
     <input type="hidden" name="id" value="<?=$row["id"]?>">
     <input type="submit" value="送信" name="upload">
    </fieldset>
  </div>
  </div>
</form>
<!-- Main[End] -->

</body>
</html>
