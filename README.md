RESUMO

Visto a necessidade um recurso que fizesse o controle, gerenciamento e implementação de uma loja, tomou-se como solução a implementação de um sistema web de gerenciamento, que possui como finalidade o gerenciamento de estoque, de pedidos e de clientes da loja, o que tornaria mais ágil  todo o processo de compra e venda de produtos. Este trabalho tem como objetivo o detalhamento passo a passo do processo de criação até o de implementação do recurso, para um possível utilização no futuro, para o seu desenvolvimento e teste foram usadas ferramentas como o sistema operacional Fedora Linux na versão 35, o recurso de gerenciamento de banco de dados phpmyAdmin, aliados a extensões como o php, MariaDB e Apache. 

Palavras-chave: LAMP, Fedora, PHP, MariaDB, Apache.




























ABSTRACT

Given the need for a resource that would control, manage and implement a store, the solution was to implement a web management system, which aims to manage the store's inventory, orders and customers, which would make the whole process of buying and selling products more agile. This work aims to provide a step-by-step detailing from the creation process to the resource implementation, for possible future use, for its development and testing tools such as the Fedora Linux operating system in version 35, the phpmyAdmin database management, combined with extensions such as php, MariaDB and Apache.

Keywords: LAMP, Fedora Linux, PHP, MariDB, Apache.




























ABREVIATURAS E SIGLAS

LAMP - Linux + Apache + MariaDB + PHP.
PHP - Hypertext Preprocessor
HTML - Hyper Text Markup Language








































SUMÁRIO

1.Introdução	8
2. Aspectos Teóricos	9
2.1 Sistema Operacional Linux (distribuição Fedora 35)	9
2.2 Servidor web Apache	10
2.3 MariaDB	11
2.4 Linguagens de programação PHP	12
3. Metodologia	12
3.1 Implementação do servidor LAMP	12
4. Resultados	17
4.1. Servidor Fedora ativado	17
4.2. Acessando o phpMyAdmin	18
4.3. Acessando telas	19
5. Conclusão	21
6. Referências	22
7. Anexos	26

















ÍNDICE DE ILUSTRAÇÕES

Figura 1 -  Tornando-se superusuário com o comando su…………………………………………12
Figura 2 - Instalação do Apache………………………………………………………………………13
Figura 3 - Inicialização e permissão de execução do servidor…………………………………….13
Figura 4 - Realizando instalação do PHP……………………………………………………………13
Figura 5 - Realizando instalação do Banco de Dados MariaDB/MySQL…………………………14
Figura 6 - Realizando instalação do mariadb-server……………………………………………….14
Figura 7 - Instalação do phpMyAdmin e reinicialização do servidor………………………………15
Figura 8 - Acesso ao arquivo de configuração do phpMyAdmin…………………………………..15
Figura 9 - Alterando as permissões do phpMyAdmin…………………………………………...….15
Figura 10: Criando banco de dados no MariaDB…………………………………………...…….…16
Figura 11: Criando usuários e concedendo a eles permissões de administrador………...……..16
Figura 12 - Tela teste do Webserver do Fedora…………………………......................................17
Figura 13 -Tela de login do phpMyAdmin………………………………….....................................17
Figura 14 - Tela de login do sistema desenvolvido………………………….................................18
Figura 15 - Tela Inicial do sistema desenvolvido…………………………….................................18
Figura 16 - Tela de Incluir Usuário do sistema desenvolvido…………………………..................19
Figura 17 - Tela de alterar produto do sistema desenvolvido………………………….................19
Figura 18 - Tela de excluir pedido do sistema desenvolvido…………………………...................20
Figura 19 - Tela do relatório de pedidos do sistema desenvolvido…………………………..........20


















1.Introdução

	Sistemas Web são softwares hospedados na internet acessados por meio de navegadores (Google Chrome, Firefox, Safari, Edge, …) possibilitando o seu uso, sem a necessidade de sua instalação. Tendo em vista estes fatores, a demanda do uso destes softwares está em constante crescimento no cenário empresarial, já que apresentam inúmeras vantagens que colaboram para a redução de custos, facilidade de acesso, segurança de alta complexidade, maior produtividade, dentre outras características que contribuem para a crescente adoção destes sistemas por empresas.
	Neste contexto, existem inúmeras maneiras de se implementar serviços web, geralmente fornecidas por empresas que realizam a sua hospedagem, como Bluehost , HostGator , Dreamhost , InMotion , SiteGround, GoDaddy e entre outras,  mediante ao pagamento de uma taxa que mudará de acordo com o plano fornecido. Entretanto, existem ferramentas open source (código aberto) que, caso configuradas de maneira correta, facilitam o processo de hospedagem e contribuem para o uso de aplicações web de maneira simples e gratuita.
	Geralmente, com o objetivo de garantir a ordenação e o gerenciamento de informações utilizadas por um sistema, existe a integração do mesmo a um banco de dados que segundo DE Souza, I “é a organização e armazenagem de informações sobre um domínio específico”. Tendo em vista que o seu uso impacta positivamente no desenvolvimento das atividades que necessitam do efetivo armazenamento de informações e a segurança delas. Deste modo, fica evidente a importância do seu uso para o efetivo funcionamento de um sistema web que realize processos que envolvam a manipulação (como inserção, atualização e a consulta dos dados)  e a armazenagem de informações.
	Desta forma, observando que a Escola Agrícola de Jundiaí, localizada no município de Macaíba, no estado do Rio Grande do Norte necessita do desenvolvimento de um sistema para o gerenciamento de dados de um estabelecimento comercial localizado na instituição. Visto que depende-se de uma maior organização e gerenciamento dos dados gerados pelas suas atividades, se faz justificável o desenvolvimento de um sistema web para o gerenciamento deste local, acessível por meio da rede de intranet da escola.
2. Aspectos Teóricos
Para o desenvolvimento do sistema foi necessária a construção de um servidor web. Para esta tarefa foi utilizado uma plataforma que facilita a elaboração e o gerenciamento de aplicações web, o LAMP constituída pela união de quatro softwares de código aberto: Linux, Apache, MySQL e PHP. Seu nome é um acrônimo em referência às quatro ferramentas que o constituem. Ele é uma das primeiras ferramentas de código aberto para o uso de sistemas de redes e que atualmente, ainda é muito usado 	no desenvolvimento de serviços web. “O LAMP é considerado por muitos como a melhor plataforma disponível para o desenvolvimento de novos aplicativos web personalizados”(DE SOUZA, I.).
2.1 Sistema Operacional Linux (distribuição Fedora 35)
O Linux, divulgado pela primeira vez em 1991 em um grupo de usuários Unix, consiste em um Kernel (núcleo dos sistemas operacionais,camada mais próxima da interação com o hardware) desenvolvido por Linus Tovald, estudante de Ciências da Computação da Universidade de Helsinki, inspirado no Minix, um pequeno sistema Unix gratuito e de código fonte disponível, criado por Andrew S. Tanenbaum.
O Linux está associado a licença GPL, permite que qualquer pessoa tenha autorização de usar os softwares registrados na mesma sem o objetivo de torná-los comercializáveis e restritos. Deste modo, este kernel pode ser alterado e até mesmo usado comercialmente, porém não pode ser vendido nem muito menos restringir de outros usuários o modificarem.
Em 1984 surgiu o projeto GNU que possuía como objetivo desenvolver um sistema operacional (SO) que tivesse compatibilidade com o padrão Unix. Nesta perspectiva, Linus Tovald fez uso dos softwares associados a este projeto e inseriu o Linux nesta licença, o que contribuiu para o sucesso e a popularidade do Linux, tendo em vista que com a união das variedades de aplicações GNU com kernel proporcionou o surgimento deste sistema operacional, que é qualquer SO que utilize este núcleo, chamados de distribuições Linux.
A distribuição utilizada neste trabalho foi o Fedora 35, aplicação patrocinada pela Red Hat (empresa responsável pela comercialização de serviços baseados em softwares de código aberto). Lançada em 2003, este sistema operacional é é uma distribuição Linux completamente de código aberto e gratuita.
2.2 Servidor web Apache
Criado em 1995 por Rob McCool, o Servidor Apache ou Servidor HTTP é um dos melhores servidores web livres que existem, principalmente usado no Linux, também distribuído pela licença GNU, possibilitando o seu estudo e modificação do seu código fonte. Da mesma maneira, ele possui a função de disponibilizar o acesso aos recursos que desejem ser utilizados pelos usuários, como envio de e-mails, mensagens, transferência de arquivos, entre outras funcionalidades.
Uma pesquisa realizada em dezembro de 2007 revelou que o servidor Apache representa cerca de 47,20% dos servidores ativos no mundo. Esse número aumentou em maio de 2012, quando foi constatado que o Apache servia aproximadamente 54,68% de todos os sites e 66% dos milhões de sites mais movimentados do mundo.(NASCIMENTO, A. 2014).

A Apache Software Foundation é a responsável pelo desenvolvimento do projeto e seu nome faz referência a uma tribo de nativos americanos que possuía grande resistência as estratégias de combate dos colonizadores, desta maneira, o nome representa uma forma de resistência da comunidade apoiadora do software livre em relação aos interesses de algumas corporações privadas. O significado desta forma de nomear o serviço, também seria em relação a estabilidade e a variedade de recursos que conseguem implementar a qualquer tipo de solicitação web.
Este servidor é compatível com a versão 1.13 do protocolo HTTP, sendo disponibilizado para diversas plataformas, como Windows e sistemas e sistemas que seguem o padrão POSIX (como o Unix e o Linux). Suas funcionalidades são preservadas por meio de sua estruturação em módulos, assim permitindo que os seus usuários desenvolvam e implementem suas próprias modificações em sua estrutura por meio da API do software.
Em relação a infraestrutura de hardware necessária para o funcionamento do servidor irá depender de acordo com a aplicação na qual se deseja desenvolver e dos recursos computacionais que ele consome. Entretanto, computadores com baixo capacidade de processamento são capazes de executá-lo sem interferências em ambientes que não necessitam de alta demanda de solicitações. Portanto, computadores comuns, dependendo das requisições necessárias para o funcionamento da aplicação implementada possuem a capacidade de realizar o pleno funcionamento deste serviço.
O Apache possui disponível um módulo capaz de adicionar ao serviço a capacidade de realizar solicitações utilizando o protocolo HTTPS que faz o uso da camada SSL para a criptografia dos dados transportados, assim proporcionando uma maior segurança entre o tráfego de informações entre cliente e servidor.
2.3 MariaDB
	Neste trabalho ao invés de ser utilizado o banco de dados MySQL foi feito o uso do MariaDB, um Sistema de Gerenciamento de Banco de Dados (SGBD) alternativo e totalmente compatível com todas as aplicações que necessitem do uso do MySQL e observando o fato de que em muitas situações o MariaDB apresenta melhor desempenho. Lançado em 2009, com a versão 5.1.38 Beta, ele é um servidor de banco de dados que pode ser utilizado nas plataformas Windows e Linux, criado pelos desenvolvedores originários do MySQL, distribuído como um software livre de código aberto por meio da licença GPL v2. Seus principais usuários são empresas como Facebook, Google e Wikipedia.
A aplicação apresenta inúmeras vantagens, observando que ela transforma dados em informações estruturadas em uma grande quantidade de serviços, desta maneira se tornando um grande substituto do MySQL. Além disso, a boa estruturação do software permite o seu uso em larga escala, com inúmeras ferramentas, plugins e sistemas que possuem a capacidade de armazenar informações.
	Neste sentido, a segurança é algo relevante durante o processo de desenvolvimento do MariaDB, visto que o projeto possui seus próprios protocolos de segurança e quando algum erro crítico é descoberto, é distribuída sempre uma nova versão que contenha a correção da referente falha. Inclusive muitos dos problemas relacionados à segurança do MySQL foram encontrados pela equipe de desenvolvedores do MariaDB que promove a sua elaboração em conjunto com o grupo de trabalho do outro SGBD, assim possibilitando que todas as questões relacionadas à segurança sejam compartilhadas entre si.
	Deste modo, observa-se as inúmeras vantagens disponibilizadas pelo uso do MariaDB em relação ao MySQL, já que ele proporciona uma maior quantidade de recursos e com uma menor quantidade de bugs, proporciona um maior desempenho, a sua gratuidade independente da atividade que ele esteja sendo utilizado, a alta compatibilidade com o MySQL, dentre outras vantagens.
2.4 Linguagens de programação PHP
	O PHP (Hypertext Preprocessor) é uma linguagem de script (interpretada pelo Browser ou Servidor) open source, muita usada em desenvolvimento web, principalmente na criação de páginas dinâmicas, podendo ser embutida dentro do HTML (Hyper Text Markup Language). Atualmente é uma das linguagens mais utilizadas no mundo, porém inicialmente, quando foi criado em 1944 por Rasmus Lerdof, com a intenção de monitorar o acesso a página da internet que continha o seu currículo, decidiu desenvolver um script na linguagem Perl com a capacidade de capturar informações sobre as pessoas que visitavam este site. Neste contexto, ele teve a ideia de apresentar estas informações a todos, com o intuito de impressionar futuros empregadores que teriam interesse em contratar seus serviços. Desta forma, surgiu o Personal Home Page Tools, o que futuramente se transformou no PHP.
	Sua execução ocorre na parte mais próxima ao servidor, dessa maneira não sendo possível a sua visualização pelo Browser, ou seja, quando são selecionadas as opções de ferramentas do desenvolvedor, apenas estão disponíveis os códigos em HTML, não é possível observar o funcionamento do PHP. Como as demais linguagens de programação, ele também pode ser utilizado para a comunicação e manipulação de uma variedade de banco de dados existentes, como: MySQL, InterBase, Oracle, SQLServer, PostgresSQL, dentre muitos outros .Proporcionando que seu uso seja mais dinâmico e útil.	
3. Metodologia
3.1 Implementação do servidor LAMP

A implementação do servidor LAMP foi feita por meio da versão 35 do Sistema Operacional Fedora, sem a utilização de interface gráfica, apenas o terminal por meio de linhas de comando.

Acesse o terminal do Fedora e com a utilização do comando “su” se torne root após digitar a senha de superusuário do sistema (Figura 1).

Figura 1:  Tornando-se superusuário com o comando su
Fonte: Autoria própria
Em seguida, realize a instalação do servidor web Apache, por meio do comando: “yum install httpd” (Figura 2).

Figura 2: Instalação do Apache
Fonte: Autoria própria
Após a instalação é necessário iniciar o servidor com o comando “systemctl enable httpd”. Em seguida, é preciso permitir que ele seja executado na inicialização do sistema com o comando “systemctl start httpd”.

Figura 3: Inicialização e permissão de execução do servidor
Fonte: Autoria própria
Posteriormente será feita a instalação do PHP, por meio do comando “yum install php”.
    
Figura 4: Realizando instalação do PHP
Fonte: Autoria própria
Depois é feita a instalação do banco de dados MariaDB/MYSQL, a partir do comando “yum install mariadb”.

Figura 5: Realizando instalação do Banco de Dados MariaDB/MySQL
Fonte: Autoria própria
Depois é feita a instalação do mariadb-server, a partir do comando “yum install mariadb-server”.


Figura 6: Realizando instalação do mariadb-server
Fonte: Autoria própria
Para facilitar a criação e a manipulação do banco de dados desenvolvido, sugere-se instalar o phpMyAdmin, por meio do comando “yum install phpmyadmin”, em seguida, é necessário reiniciar o servidor Apache com o comando “systemctl reload httpd”.

Figura 7: Instalação do phpMyAdmin e reinicialização do servidor
Fonte: Autoria própria
Para que seja possível acessar o site do phpMyAdmin e conectá-lo com o banco de dados é necessário alterar as permissões de acesso ao phpMyAdmin, acessando seu arquivo de configuração, pelo comando “nano /etc/httpd/conf.d/phpMyAdmin.conf”.

Figura 8: Acesso ao arquivo de configuração do phpMyAdmin
Fonte: Autoria própria

Para alterar as permissões é necessário comentar a linha 14, onde está escrito “Require local”. Para comentar utiliza-se o “#” no início da linha. Em baixo desta linha, adiciona-se “Require all granted”. Para salvar o arquivo, pressiona-se as teclas “CTRL+O” e em seguida “ENTER”, para fechar o arquivo, “CTRL + X”. Em seguida, é necessário mais uma vez reiniciar o servidor, com o comando  “systemctl reload httpd”.

Figura 9: Alterando as permissões do phpMyAdmin
Fonte: Autoria própria

Posteriormente, para ter acesso ao phpMyadmin é necessário a criação de um banco de dados e as contas que terão acesso ao site do phpMyAdmin. Já que esta é a primeira vez que inicia o banco de dados, devemos atribuir uma senha do root ao mariadb com o comando “mysql -u root -p”, após inserido e estando no ambiente do banco utiliza-se “create database nomedobanco” para criar um novo banco;

Figura 10: Criando banco de dados no MariaDB
Fonte: Autoria própria

Para criar os usuários que terão acesso aos bancos de dados usamos o comando “CREATE USER nomeDoUsuário@localhost IDENTIFIED BY 'senha';”. Depois, é necessário conceder aos mesmos permissão de administrador para que ele possa realizar as alterações nos bancos e tabelas no phpMyAdmin, por meio do comando “GRANT ALL PRIVILEGES ON *.* TO nomeDoUsuário@EndereçoIP WITH GRANT OPTION;”.

Figura 11: Criando usuários e concedendo a eles permissões de administrador
Fonte: Autoria própria
4. Resultados
	4.1. Servidor Fedora ativado

Com a ativação do apache(httpd), cria-se uma tela teste do servidor web do Fedora. Para acessá-la basta digitar o IP do servidor na barra do navegador.


Figura 12: Tela teste do Webserver do Fedora
Fonte: Autoria própria

4.2. Acessando o phpMyAdmin

Agora com os usuários, o banco e as tabelas basta acessar o phpMyAdmin para ter uma interface mais interativa para trabalhar e conferir seu banco de dados, colocando a seguinte linha na barra do navegador “seuIP/phpmyadmin” e depois colocar o usuário e senha do banco que definimos antes.. 

Figura 13: Tela de login do phpMyAdmin
Fonte: Autoria própria
	4.3. Acessando telas

Depois de criar os arquivos .php com o código das telas no caminho "/var/www/html" basta acessá-las pelo navegador usando o “seuIP/nomedoarquivo.php”.


Figura 14: Tela de login do sistema desenvolvido
Fonte: Autoria própria

Como exemplo, escolhi o arquivo “index.php” porque é a tela inicial do nosso sistema. Pelo código configuramos a navegação de cada tela para não ter o trabalho de cada vez que for na tela de um arquivo ter que digitá-lo. 

Depois de fazer login a navegação do nosso sistema fica da seguinte forma.

Figura 15: Tela Inicial do sistema desenvolvido
Fonte: Autoria própria


Ele irá para a tela de menu onde terá as ambas com cada opção do sistema e abaixo ele mostra uma saudação para o usuário que fez login. Cada aba tem três opções, como por exemplo na aba inclusão existe cliente, para incluir um cliente para a loja, produto, para a inclusão de um produto no estoque, e pedido, para o usuário fazer um pedido na loja para um cliente.


Figura 16: Tela de Incluir Usuário do sistema desenvolvido
Fonte: Autoria própria

Figura 17: Tela de alterar produto do sistema desenvolvido
Fonte: Autoria própria


Figura 18: Tela de excluir pedido do sistema desenvolvido
Fonte: Autoria própria

Figura 19: Tela do relatório de pedidos do sistema desenvolvido
Fonte: Autoria própria
5. Conclusão
Esse sistema tem o propósito de auxiliar uma loja fictícia a gerenciar tanto os clientes, produtos e pedidos dos usuários. Esse relatório tem o propósito de auxiliar passo a passo a implementação e o uso desse sistema para fins educacionais ou práticos em ambiente real, assim usufruindo de todos os seus benefícios.
