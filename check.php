<?php
  if(empty($_POST)){
    echo "処理終了";
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>アンケートフォーム（確認画面）</title>
</head>
<body>
  <?php
    $name=htmlspecialchars($_POST["name"],ENT_QUOTES,"UTF-8");
    if(empty($_POST["name"])){
      echo "名前を入力してください。";
      exit;
    }

    $email=htmlspecialchars($_POST["email"],ENT_QUOTES,"UTF-8");
    if(empty($_POST["email"])){
      echo "メールアドレスを入力してください。";
      exit;
    }

    $message=htmlspecialchars($_POST["message"],ENT_QUOTES,"UTF-8");
    if(empty($_POST["message"])){
      echo "感想を入力してください。";
      exit;
    }
  ?>
  <form method="post" action="submit.php">
    <table border=1>
      <tr>
        <td>名前</td>
        <td><?php echo $name;?></td>
      </tr>
      <tr>
        <td>メールアドレス</td>
        <td><?php echo $email;?></td>
      </tr>
      <tr>
        <td>感想</td>
        <td><?php echo $message;?></td>
      </tr>
      <tr>
        <td align=right colspan=2>
          <input type="submit" value="回答を送信する">
        </td>
      </tr>
    </table>
  </form>
  <?php
    session_start();
    $_session["name"]=$name;
    $_session["email"]=$email;
    $_session["message"]=$message;
  ?>
</body>
</html>