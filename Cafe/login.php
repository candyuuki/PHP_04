<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>会員サイト</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    /* background-color: #81D8D0; */
    /* background-color: #eeeeee; */
  background-color: #d2b48c;

  }
  fieldset{
    /* background-color: #eeeeee; */

  }
  a {
    text-decoration: none;
    color: #81D8D0;

    /* color: #B29663; */
  }
 
  </style>
  <!-- フォーム -->
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- <div class="navbar-header"><a class="navbar-brand" href="user_select.php">ユーザー一覧</a></div>
    </div> -->
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- <form method="post" action="user_insert.php"> -->
<form method="post"  action="login_act.php">
<div class="wrapper">
  <div class="jumbotron">
   <fieldset>
    <legend>LOGIN</legend>
    <a class="user" href="signup.php">>>会員になる</a><br>
    
     <!-- <label>名前：<input type="text" name="name"></label><br> -->
     <label>ID：<input type="text" name="lid"></label><br>
     <label>Password：<input type="password" name="lpw"></label><br>
      <!-- <label>管理者：<input type="checkbox" name="kanri_flg" value="管理者"></label><br>
      <label>ユーザー：<input type="checkbox" name="kanri_flg" value="ユーザー"></label><br> -->
     <!-- <label><input type="hidden" name="life_flg"></label> -->
     <input type="submit" value="送信">
    </fieldset>
  </div>
  </div>
</form>
<!-- Main[End] -->

</body>
</html>
