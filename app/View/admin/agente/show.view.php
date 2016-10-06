<?php template('admin.header'); ?>
  <div class="row">
    <h2 class="col-md-11 no-margin">Lista de Agentes</h2>
    <div class="col-md-1">
      <a href="/admin/agentes/<?= $agente->id; ?>/editar" class="col-md-12 btn btn-primary">Editar</a>
    </div>
  </div>
	<ul>
		<li><strong>ID</strong>: <?= $agente->id; ?></li>
        <li><strong>Usuário</strong>: <?= $agente->usuario->usuario; ?></li>
		<li><strong>Nome</strong>: <?= $agente->nome; ?></li>
		<li><strong>CPF</strong>: <?= $agente->cpf; ?></li>
	</ul>
  <div class="row">
    <div class="col-md-offset-11 col-md-1 pull-right">
      <a href="/admin/agentes" class="col-md-12 btn btn-default">Voltar</a>
    </div>
  </div>
<?php template('admin.footer'); ?>
