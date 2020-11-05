<?php
// 0. SESSION開始！！
session_start();
//1.  DB接続します
// try {
//   //ID MAMP ='root'
//   //Password:MAMP='root',XAMPP=''
//   $pdo = new PDO('mysql:dbname=cafe;charset=utf8;host=localhost','root','root');
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage()); // データベース接続できない時 DBConnectError
// }

//１．関数群の読み込み
include("funcs.php");
sessionCheck();

//２．データ取得SQL作成
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM cafe_user_table");
$status = $stmt->execute();



//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    // var_dump ($result);
    
  
    
    $view .= "<div class='container'>";
    $view .= "<div class='contents'>";
    $view .='<a href="user_view.php?id='.$result["id"].'"><span class="material-icons">
    edit</span></a>';
    // $view .= '<a href="u_view.php?id='.$result["id"].'">< class="material-icons">
    // local_cafe</a>';
    $view .= '<p>'.$result['date'].'<br><span class="kanri">'.$result['kanri_flg'].' : '.'</span>'.$result['name'].'<br>'.'Id : '.$result['lid'].'<span class="conect"> / </span>'.'Password : '.$result['lpw'].'<br>'.'</p>';
   
    //画像ありver 
    // $view .= '<p>'.$result['date'].'<br>'.'<a href="'.$result['cafeUrl'].'">'.$result['cafeName'].'</a>'.'<br>'.$result['comment'].'<br>'.$result['reputation'].'<br>'.'<img width="100" src="./img/'.$result['image'].'">'.'</p>';
    
    



    $view .= '<a href="user_delete.php?id='.$result["id"].'" class="delete">';
    $view .=' <i class="far fa-trash-alt"></i> Delete </a> ';
    // $view .=' [Delete] ';
    $view .='</a>';
    $view .= "</div>";
    $view .= "</div>";
  };
  

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザー一覧</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<style>
div {
  padding: 10px;font-size:16px;
}

*{
  background-color: #d2b48c;
}

.material-icons {
  position: absolute;
  margin-top: 16px;
  color: #f0d800;

}
.material-icons:hover {
  /* position: absolute;
  margin-top: 16px; */
  /* color: #f0d800; */
  color:#f0e68c;


}
.container{
  background-color: #eeeeee;
  
}

p{
  margin-left:32px

}
name {
  color: #B29663;
  font-size: 19px;

}
.navbar-brand{
  color: #161666;
  font-size: 20px;
}

.delete{
  margin-left: 28px;
color: black;
}
a {
  text-decoration: none;
}

a:hover {
  color:#f0e68c;
}

.conect{
  color: #f0d800;
}

.kanri {
  color: #161666;
  /* font-size: 18px; */

}

</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="select.php">カフェ一覧</a>
      <!-- <span class="share"><img src="https://images.unsplash.com/photo-1544031064-9de80864ade5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" alt="カフェの写真" width="351" height="241></span> -->
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?></div>
</div>
<!-- Main[End] -->

</body>
</html>
