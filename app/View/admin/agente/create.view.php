<?php template('admin.header'); ?>

<?= assets('mask', 'js'); ?>

<div class="row">
  <h2 class="col-md-12">Agentes: Cadastrar</h2>
</div>

<form class="row" method="POST" action="/admin/agentes">
  <div class="row">
    <div class="col-md-offset-1 col-md-6 form-group">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="agente[nome]" id="nome" placeholder="Nome">
    </div>
    <div class="col-md-3 form-group">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control" name="agente[cpf]" id="cpf" placeholder="xxx.xxx.xxx-xx">
    </div>
  </div>

  <div class="row">
    <div class="col-md-offset-1 col-md-3 form-group">
      <label for="cep">CEP</label>
      <input type="text" class="form-control" name="agente[cep]" id="cep" placeholder="xxxxx-xxx">
    </div>
    <div class="col-md-3 form-group">
      <label for="estado">Estado</label>
      <input type="text" class="form-control" name="agente[estado]" id="estado" placeholder="UF">
    </div>
    <div class="col-md-3 form-group">
      <label for="cidade">Cidade</label>
      <input type="text" class="form-control" name="agente[cidade]" id="cidade" placeholder="Cidade">
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-offset-1 col-md-3 form-group">
      <label for="usuario">Usuário</label>
      <input type="text" class="form-control" name="usuario[usuario]" id="usuario" placeholder="Usuário">
    </div>
    <div class="col-md-3 form-group">
      <label for="senha">Senha</label>
      <input type="password" class="form-control" name="usuario[senha]" id="senha" placeholder="Senha">
    </div>
    <div class="col-md-3 form-group">
      <label for="senha_cofirmation">Cofirmar senha</label>
      <input type="password" class="form-control" name="usuario[senha_cofirmation]" id="senha_cofirmation" placeholder="Senha">
    </div>
  </div>
  <button type="submit" class="btn btn-success pull-right">Cadastrar</button>
</form>
<script>
  $(document).ready(function(){
    $('#cpf').mask('000.000.000-00');
    $('#cep').mask('00000-000');
  });
</script>
<?php template('admin.footer'); ?>