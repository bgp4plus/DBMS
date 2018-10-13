<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>入力画面</title>
</head>
<body>
  <h1>アンケートフォーム（回答画面）</h1>
  <form action="check.php" method="post">
    <table border=1>
      <tr>
        <td>名前</td>
        <td><input type="text" name="name"></td>
      </tr>
      <tr>
        <td>メールアドレス</td>
        <td><input type="text" name="email"></td>
      </tr>
      <tr>
        <td>感想</td>
        <td><textarea name="message" cols="40" rows="5"></textarea></td>
      </tr>
      <tr>
        <td align=right colspan=2>
          <input type="submit" value="確認する">
        </td>
      </tr>
    </table>
  </form>
</body>
</html>