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
$stmt = $pdo->prepare("SELECT * FROM cafe_table");
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
    $view .='<a href="u_view.php?id='.$result["id"].'"><span class="material-icons">
    local_cafe</span></a>';
    // $view .= '<a href="u_view.php?id='.$result["id"].'">< class="material-icons">
    // local_cafe</a>';
    // $view .= '<p>'.$result['date'].'<br>'.'<a href="'.$result['cafeUrl'].'" class="cafeName">'.$result['cafeName'].'</a>'.'<br>'.$result['comment'].'<br>'.'評価：'.$result['reputation'].'<br>'.'</p>';
  
    
    //画像ありver 
    $view .= '<p>'.$result['date'].'<br>'.'<a href="'.$result['cafeUrl'].'" class="cafeName">'.$result['cafeName'].'</a>'.'<br>'.$result['comment'].'<br>'.'評価：'.$result['reputation'].'<br><br>'.'<img src="img/' . $result[img] .'" width="210" height="210" class="cafeimg">'.'</p>';
    // $view .= '<img src="picture/' . $result["img"] . '">';


    



    $view .= '<a href="delete.php?id='.$result["id"].'" class="delete">';
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
<title>カフェを記録</title>

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
  background-color: #81D8D0;
  /* font-family: "Bitter", "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", sans-serif; */
}

.material-icons {
  position: absolute;
  margin-top: 16px;
  color: #503A2F;

}
.container{
  background-color: #eeeeee;
  
}

p{
  margin-left:32px

}
.cafeName {
  color: #B29663;
  font-size: 19px;

}
.navbar-brand{
  color: #B29663;
  

}
.navbar-brand:hover {
  color: #FFCC00;
  /* background: -webkit-linear-gradient(0deg, #D6A3DC, #F7DB70, #EABEBF); */
	background: -webkit-linear-gradient(0deg, #FEA78C, #FFA3A6, #F583B4);
  
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
  /* background: linear-gradient(110deg, #ffd800, #ff0000 45%, #ffd800);
  -webkit-background-clip: text;
  -webkit-text-fill-color: rgba(255,204,204,0.0);
  color: #ff0000; */
}

/*IEで未対応の場合は以下で背景を非表示に*/
@media all and (-ms-high-contrast:none){
  .text-grad {
    background: none;
  }

}

.delete{
  margin-left: 28px;
color: black;
}
a {
  text-decoration: none;
}

a:hover {
  color:#F5EDD2;
}
.share {
  /* position: absolute; */
  /* margin-top: 16px; */
}
.menu{
text-align:right;
color: #B29663;
}
.user{
  margin-right: 50px;
color: #B29663;

}
.cafeimg {
  padding: 15px;
  background: #ffffff;
}
</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Share your coffee experiences!</a>
      <div class="menu">
      <a class="user" href="user_select.php"><i class="fas fa-list"></i> User list</a>
      <a class="user" href="logout.php"><i class="fas fa-sign-out-alt"></i> Log out</a>
      </div>
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
