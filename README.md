# jobs-dev-n3
Passos da configuração do projeto a minha estacao de trabalho:
1º) - Clonei o projeto: jobs-dev-n3 do repositorio: git clone https://github.com/stargrid/jobs-dev-n3.git
2º) - Instalei o composer do site: https://getcomposer.org/download/ e executei o seguinte arquivo na minha estação de trabalho: Download and run Composer-Setup.exe
3º) - Após entrei no projeto via CMD e dentro da raiz do projeto executei os comandos: composer install para criar a pasta vendor com as dependencias
4º) - Após executei o comando: php artisan serve para ver como o projeto estava.
5º) - Iedntifiquei que o projeto não tinha o arquivo .env, onde criei um arquivo .env e defini as configurações abaixo para o 
      SGDB - Sistema Gerenciado de Banco de Dados - MYSQL Server:
		DB_CONNECTION=mysql
		DB_HOST=127.0.0.1
		DB_PORT=3306
		DB_DATABASE=startgriddb
		DB_USERNAME=root
		DB_PASSWORD=
6º) - Identifiquei também que o projeto estava com o seguinte problema: 
       production.ERROR: No application encryption key has been specified. 
	   {"exception":"[object] (RuntimeException(code: 0): No application encryption key has been specified. at 
	   D:\\ProjetosFreelancer\\jobs-dev-n3\\vendor\\laravel\\framework\\src\\Illuminate\\Encryption\\EncryptionServiceProvider.php:80)	
7º) - Solução para o probema citado acima, foram executados os comandos abaixo:	  
      php artisan key:generate 
	  php artisan config:cache
8º) - Após executei o comando: php artisan serve para ver como o projeto estava.
9º) - Após chamei no navegor a URL: http://localhost:8000/ e a página: \resources\views\welcome.blade.php foi exibida sem problemas, com os links:
      1 - Docs;
      2 - Laracasts;
	  3 - Notícias;
	  4 - Blog;
	  5 - Nova;
	  6 - Forge;
	  7 - Vapor;
      8 - Github.
10º) - Analisando o arquivo /routes/web.php, percebi que somente existe a rota para exibir a tela welcome.
       No arquivo: \resources\views\welcome.blade.php existe às chamdas para as rotas:
	   1 - <a href="{{ url('/home') }}">Home</a>
	   2 - <a href="{{ route('login') }}">Login</a>
	   3 - <a href="{{ route('register') }}">Register</a>
	   Que não foram criadas no arquivo de rota: /route/sweb.php para que essas chamadas funcionem será necessário criar os arquivo *.blade.php correspondentes
	   e criar as respectivas rotas.
11º) - Analisando o arquivo /routes/api.php onde seram criados os Edpoints para serem usados no back-end dos projetos, somente existe atualmente três:
       1 - // Listar Reports
	   2 - // Criar Reports
	   3 - // Deletar Reports
12º) - Passos para criar o Migrations da table: 'reports':
       php artisan make:migration create_reports --create=reports  

Após executar o comando acima, segue o resultado: Created Migration: 2021_11_19_160653_create_reports	   
	   
observação:
       A estrutura da migration é simples. Ela importa as classes Schema, Blueprint e Migration e possui 2 funções:

	  12.1) - UP: Esta função é a responsável pela implementação das atualizações do banco, criar uma tabela, atualizar uma coluna etc.
	  12.2) - Down: É a função que fará exatamente o inverso da função UP, revertendo seu banco de dados ao estado anterior a esta atualização.	  
	  12.3) - Foi criado também o $table->timestamps(); Isto é um padrão do Eloquent do Laravel para controlar quando um dado é criado e atualizado.
	  12.4) - Foi criado também: $table->increments('id'); Para facilitar as identfcações únicas dos registros.

13º) - Executando a migration: php artisan migrate
       Resultado da execução do migrate:
	   Migrating: 2021_11_19_160653_create_reports
	   Migrated:  2021_11_19_160653_create_reports (1.11 seconds)

14º) - Executei também a limpeza abaixo, pois durante a execução do migrate estava apresentando problemas: 
	php artisan cache:clear
	php artisan config:clear
	php artisan view:clear
	php artisan route:clear
	
15º) - Criando a classe Model: Report
    php artisan make:model Report
	
16º) - Criado o Seed para os reports:
     php artisan make:seeder ReportsSeeder
	 
17º) - Executando o Seed reports:
     17.1 - Execute o comando: composer dump-autoload  
	 17.2 - para criar um novo mapa de classe, execute: php artisan db:seed

18º) - No arquivo: /routes/api.php as rotas (Post, Put e delete), estão utilizando o middleware, pois elas só poderam ser executadas se o usuário
       estiver aurenticado e com o Token de autenticacao gerado.
	   
19º) - Foi crado também o arquivo: UsersTableSeeder.php para popular a table: users com o usuario admin: Paulo Augusto.

20º) - Criando a classe de controller ReortsController:
       php artisan make:controller api\ReportsController --resource
	   
21º) - Ctriando a classe de controller UsersController e AuthController:
       php artisan make:controller api\UsersController --resource
	   php artisan make:controller api\AuthController --resource
	   
22º) - Instalando o JWT: composer require tymon/jwt-auth

23º) - Para testar as rotas criads no Postman ou no Insomnia, segue:
Observação: Para usar as rotas (Create, Updte e Delete), o usuário tem que estar autenticado/logado:
            Rota login: http://localhost:8000/api/auth/login
			JSON:
			{
				"email":"seu-email",
				"password":"sua-senha"
			}
			
			Após obter o TOKEN, adicione o mesmo na Aba: BEARER no item: TOKEN
			
			
     1 - Reports list: http://localhost:8000/api/reports
	 2 - Reports create: http://localhost:8000/api/reports/create
	     JSON:
			{
				"external_id":"9",
				"title":"Terceiro Reports",
				"url":"https://www.mec.gov.br",
				"summary":"Meu terceiro teste de inclusao de reports"
			}
	 3 - Recuperar reports por id: http://localhost:8000/api/reports/1
	 4 - Reports update: http://localhost:8000/api/reports/update/1
	     JSON:
			{	
				"external_id":"3",
				"title":"1 - Reports",
				"url":"https://www.mec.gov.br",
				"summary":"Meu 1 -  teste de inclusao de reports"
				
			}
	  5 - Reports delete: http://localhost:8000/api/reports/delete/1
	  
24º) - Criados os test com o phpunit para as rotas criadas.

