<?php template('header'); ?>
    
    <h2>Agentes: Cadastrar</h2>
    
    <form method="POST" action="/agentes">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" name="cpf" id="cpf" placeholder="xxx.xxx.xxx-xx">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" name="estado" id="estado" placeholder="UF">
        </div>
        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">
        </div>
        <hr>
        <div class="form-group">
            <label for="usuario">Usuário</label>
            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuário">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

<?php template('footer'); ?>