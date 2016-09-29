<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Vacina Digital</title>

  <link rel="stylesheet" type="text/css" href="/public/css/login.css">

  <?= assets('bootstrap.css.bootstrap', 'css'); ?>

  <?= assets('jquery', 'js'); ?>
  <?= assets('bootstrap.js.bootstrap', 'js'); ?>
</head>
<body>
  <div id="login-panel" class="container">
    <div class="row">
      <h1 class="text-center">Vacina Digital</h1>
      <form method="POST" action="/admin/login">
        <div class="form-group">
          <label for="email"></label>
          <input name="email" type="text" class="form-control" id="email" placeholder="E-mail">
        </div>
        <div class="form-group">
          <label for="senha"></label>
          <input name="senha" type="password" class="form-control" id="senha" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
      </form>
    </div>
  </div>
</body>
</html>