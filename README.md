# Union-K

A Union-K é um sistema baseado em PHP e MYSQL para compartilhamento de arquivos, textos, links e outros. Qualquer pessoa com acesso a Internet poderá fazer publicações que serão indexadas no banco de dados.

<b>Requisitos de instalação</b>

Para instalação do sistema será necessário um servidor web PHP Windows ou Linux. A versão do PHP mínima é 5.6. Um servidor de banco de dados MYSQL para instalação do database. O arquivo de banco de dados é o union_k.sql.

<b>Como instalar e configurar</b>

Copie todo o conteúdo do projeto preservando a estrutura de diretório para dentro do seu ambiente de hospedagem web. Observando que o arquivo index.php deve estar no diretório raiz.

Faça a importação do database union_k.sql para o seu servidor de banco de dados.

Verifique na raíz no projeto o arquivo config.php:

define("DB_HOST", "nome_do_server_ou_ip");<br>
define("DB_DATABASE", "nome_database");<br>
define("DB_USER", "nome_usuario_do_banco");<br>
define("DB_PSW", "senha_de_acesso");<br>
define("UPLOAD_PATH", "caminho_para_o_upload_de_arquivos");<br>

Você deverá alterar os dados de acordo com as informações de acesso do seu servidor de banco de dados.

Os usuários poderão fazer upload de arquivos para seu servidor, assim será necessário configurar a constant UPLOAD_PATH com o endereço correto do diretório arquivos dentro do seu servidor.

Este diretório precisará ter permissão de escrita para que os uploads aconteçam.

<b>Primeiro acesso</b>
Instalado o sistema, para o realizar o primeiro acesso utilize os dados:

usuário: admin@admin<br>
senha: admin

Como estes dados você poderá acessar o sistema como administrador e realizar a troca da sua senha e outras informações.




