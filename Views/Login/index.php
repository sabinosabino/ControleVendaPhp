
<div class="container">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <div id="resultado"></div>

    <form id="indexLogin" method="post">
      <div class="row">
        <div class="text-center col-md-12">
          <img src="../Midia/logo.jpg" class="img-responsive col-md-4 col-md-offset-4" alt="Responsive image">
          <div class="col-md-12">
            <h2>SEJA BEM VINDO(A)!</h2>
          </div>
        </div>

        <div class="form-group">
          <label for="login">LOGIN</label>
          <input type="login" class="form-control" id="login" name="login" aria-describedby="Login" placeholder="Informe o Login" required>
          <small id="login" class="form-text text-muted">Informe seu login para acessar o sistema.</small>
        </div>

        <div class="form-group">
          <label for="senha">SENHA</label>
          <input type="password" class="form-control" id="senha" name="senha" aria-describedby="Login" placeholder="Informe sua Senha" required>
          <small id="senha" class="form-text text-muted">Informe sua senha para acessar o sistema.</small>
        </div>

        <div class="form-group" hidden>
          <input class="col-md-2" type="checkbox" class="form-control" id="LembrarMe" name="LembrarMe" value="1">
          <label for="LembrarMe">Lembrar-Me</label>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-success col-md-6 col-sm-offset-3" value="LOGAR" />
        </div>

      </div>
    </form>

    <script src=<?php echo "../Scripts/jquery.js"; ?>></script>
    <script src=<?php echo "../Scripts/acoes.js"; ?>></script>