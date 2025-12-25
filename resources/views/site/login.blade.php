<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="user-wrapper">
  <h2>Login</h2>
  <?php if (!empty($error)): ?>
    <p style="color:red;"><?= $error ?></p>
  <?php endif; ?>
  <form method="post" action="">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>
    <button type="submit" class="button-dua">Login</button>
  </form>
</div>
</body>
</html>