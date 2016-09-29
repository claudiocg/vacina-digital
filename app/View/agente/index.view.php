<?php template('header'); ?>
    
    <h2>Agentes</h2>

    <table class="table table-striped">
        <thead> 
            <tr> 
                <th>#</th> 
                <th>Usuário</th> 
                <th>Nome</th> 
                <th>CPF</th> 
                <th>Estado</th> 
                <th>Cidade</th> 
                <th></th>
            </tr>
        </thead> 
        <tbody>
            <?php foreach ($agentes as $agente): ?>
                <tr> 
                    <th scope="row"><?= $agente->id; ?></th>
                    <td><?= $agente->usuario->username; ?></td>
                    <td><?= $agente->nome; ?></td>
                    <td><?= $agente->cpf; ?></td>
                    <td><?= $agente->estado; ?></td>
                    <td><?= $agente->cidade; ?></td>
                    <td><a href="agentes/<?= $agente->id; ?>/editar" class="glyphicon glyphicon-pencil"></a></td>
                </tr> 
            <?php endforeach; ?> 
        </tbody> 
    </table>
<?php template('footer'); ?>