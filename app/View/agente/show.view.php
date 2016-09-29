<?php template('header'); ?>

	<h2>Lista de Agentes</h2>
	<ul>
		<li><strong>ID</strong>: <?= $agente->id; ?></li>
        <li><strong>Usuário</strong>: <?= $agente->usuario->username; ?></li>
		<li><strong>Nome</strong>: <?= $agente->nome; ?></li>
		<li><strong>CPF</strong>: <?= $agente->cpf; ?></li>
	</ul>

<?php template('footer'); ?>
