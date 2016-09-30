# Vacina Digital
## Projeto Interdisciplinar de Computação

Plataforma de controle de vacinas.

### Utilizar
* PHP 7
* MySql 5.7
* Apache 2.4

### Como Utilizar
* Faça o clone do projeto: git clone https://github.com/edgaryonemura/vacina-digital.git
* Entre na pasta do projeto: cd vacina-digital
* Faça uma cópia do arquivo "config.env.php" -- IMPORTANTE MANTER O ARQUIVO "config.env.php"
* Substitua o nome da cópia para "config.php"
* Configure o "config.php" conforme seu ambiente
* Faça o download do Composer:
* Windows: https://getcomposer.org/Composer-Setup.exe
* Unix: https://getcomposer.org/download/
* Abra o terminal ou o cmd(Windows)
* Navegue até a pasta do projeto clonado "vacina-digital", pelo terminal: cd caminho/do/projeto/vacina-digital
* Instale todas as dependencias e o mapeamento do autoload: composer install
* Instale o git: https://git-scm.com/

### Workflow do GIT/GITHUB
#### Sincroniza o projeto remoto(GITHUB) com o projeto local(Sua máquina)
* git fetch

#### Faz o download dos arquivos remotos(Apenas daqueles que foram alterados ou adicionados por outro colaborador), para seu projeto local
* git pull 

#### Verifica em qual branch você está atualmente
* git branch

#### Cria uma nova branch localmente, para que se possa trabalhar em alguma alteração especifica
#### [ IMPORTANTE ] nunca altere diretamente na branch master
* git checkout -b nome-da-branch 
* --> *ex: git checkout -b atualizando-usuario-controller*

#### Verifica quais arquivos foram alterados:
* git status

#### Adiciona um arquivo alterado para branch
* git add nome-do-arquivo

### Ou Adiciona TODOS arquivos alterados para a branch
* git add -A

#### Faz um commit(comentário) para os arquivos adicionados (Se forem adicionados varios arquivos, todos teram o mesmo commit)
* git commit -m "algum comentário!"

#### Volta para a branch master
* git checkout master

#### Fundi as duas branch através das diferença
* git merge nome-da-branch

#### Faz o upload dos arquivos local para os arquivos remoto(GITHUB)
* git push


### Outros Comandos importantes

#### Desfaz mudanças
##### Verifica quais arquivos foram alterados/criados/deletados
* git status

##### Desfaz todas mudanças listadas pelo comando acima
* git checkout -f

##### Não deve mostrar nenhum arquivo!
* git status

### Membros do Desenvolvimento
* Claudio Godoy
* Edgar Massaaki Yonemura
* Kaue Zatarin

