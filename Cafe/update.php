<?php
session_start();
require_once('funcs.php');
//1. POSTでid,name,commentを取得
$id = $_POST["id"];
$cafeName = $_POST["cafeName"];
$cafeUrl = $_POST["cafeUrl"];
$comment = $_POST["comment"];
$reputation = $_POST["reputation"];
$img =$_FILES['img'];

$err = [];
if (!$_FILES['image']['name']) {
    $image = $_SESSION['img'];
} else {
    $image = date('YmdHis') . rtrim($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], 'picture/' . $image);
    $fileName = $_FILES['image']['name'];

    if (!empty($fileName)) {
        $check =  substr($fileName, -3);
        if ($check != 'jpg' && $check != 'gif' && $check != 'png') {
            $err[] = '写真の内容を確認してください。';
        } else {
            unlink('picture/' . $_SESSION['img']);
        }
    }
}



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

if (count($err) > 0) {
    foreach ($err as $key => $val) {
        echo "<p>${val}</p>";
    }
    exit;
}

// 2.DB接続
// try {
//   //ID MAMP ='root'
//   //Password:MAMP='root',XAMPP=''
//   $pdo = new PDO('mysql:dbname=cafe;charset=utf8;host=localhost','root','root');
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage()); // データベース接続できない時 DBConnectError
// }
$pdo = db_conn();
//3.UPDATE cafe_table SET ....;で更新(bindValue)
$stmt = $pdo->prepare("UPDATE cafe_table SET cafeName=:cafeName, cafeUrl=:cafeUrl, comment=:comment, reputation=:reputation, img=:img, date = sysdate() WHERE id=:id");
// $stmt = $pdo->prepare($spl);
$stmt->bindValue(':cafeName', $cafeName, PDO::PARAM_STR);
$stmt->bindValue(':cafeUrl', $cafeUrl, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':reputation', $reputation, PDO::PARAM_INT); 
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //更新したいidを渡す
$stmt->bindValue(':img', $img, PDO::PARAM_STR);

$status = $stmt->execute();

//４．データ登録処理後
// if ($status==false) {
//     //execute（SQL実行時にエラーがある場合）
//   $error = $stmt->errorInfo();
//   exit("ErrorQuery:".$error[2]);

// }else{
//   // select.phpへレダイレクト
//   header("Location: select.php");
//  exit;

// }
if ($status == false) {
  $error = $stmt->errorInfo();
  exit("SQLError:" . $error[2]);
} else {
  redirect("select.php?id=${id}&success=1");
}
?>