<?php template('header'); ?>
    
    <h2>Agentes: Editar</h2>
    
    <form method="POST" action="/agentes/<?= $agente->id; ?>">
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="<?= $agente->nome; ?>">
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" name="cpf" id="cpf" placeholder="xxx.xxx.xxx-xx" value="<?= $agente->cpf; ?>">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" name="estado" id="estado" placeholder="UF" value="<?= $agente->estado; ?>">
        </div>
        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" value="<?= $agente->cidade; ?>">
        </div>
        <hr>
        <div class="form-group">
            <label for="usuario">Usuário</label>
            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuário" value="<?= $agente->usuario->username; ?>">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

<?php template('footer'); ?>