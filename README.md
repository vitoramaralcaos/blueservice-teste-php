===
A aplicação está rodando em um ambiente web na url:
http://vitoramaral.com/loja-blueservice/
*Podem entrar e testar por lá.

Se quiser baixar os arquivos para rodar em outro ambiente, obrigatoriamente precisa ser dentro de uma pasta na raiz.
Por exemplo:
http://localhost/loja
ou
http://localhost/blueteste
ou
http://dominio.com/lojateste

A pasta pode ter qualquer nome, mas essa pasta precisa ser dentro da raiz do httdocs.
Por quer ? Como essa aplicação foi feita com URL AMIGÁVEL, então a configuração está definida para rodar dentro do segundo local do ambiente web.
Então nós temos: http://local1/local2/

Se rodar a aplicação na raiz, por exemplo:
http://local1/ -- Vai dar erro

Se rodar dentro de outras pastas, por exemplo:

http://local1/local2/local3/ --- Vai dar erro
ou
http://local1/local2/local3/local4/ --- Vai dar erro

Por isso é importante rodar em uma pasta dentro da raiz:
Por exemplo: http://localhost/loja/

---------------

Além da loja, existe uma area administrativa, a url é 
http://vitoramaral.com/loja-blueservice/ad-login
ou
http://local1/local2/ad-login
*Lembrando que nesse exemplo a aplicação está rodando dentro da pasta local2/


Essa parte administrativa tem as funções:
1- Cadastrar / Editar / Excluir categorias
2- Cadastrar produtos

Como a vaga e esse teste exigem uma certa urgência, eu não quis prolongar mais, então ficou faltando alguns itens que queria ter feito, como por exemplo:
2- Editar Produto
3- Fazer upload da foto do Produto (hoje ao cadastrar um produto, uma foto é atribuída automaticamente) 
4- Na hora de cadastrar um produto, tem a opção para marcar as categorias que o produto faz parte, é um plugin do bootstrap que controla esse campo, e se tiver 8 ou mais categorias, esse plugin está dando um pequeno bug.
*Eu pensei em ocultar isso, e nem mostrar essa area administrativa para vocês, por ela ter esse bug e também por ser bem simples e faltar itens, mas acredito que ela talvez ajude vocês em me avaliar melhor.
5 - Também queria ter feito uma tela para listar os pedidos, e uma tela para listar um histórico do carrinho de compras

*Se acharem interessante, é só avisar e eu finalizo essa area administrativa com esses itens que comentei aqui.

*Para acessar a area administrativa:
login: admin
senha: admin

----------------

Para rodar a aplicação são necessários:
1- Rodar em um ambiente apache por conta do arquivo .htaccess que contra a URL AMIGAVEL;
2- Certificar que copiou o arquivo .htaccess corretamente (as vezes por segurança ele não é copiado);
3- Acessar o arquivo _global.php e alterar a url da aplicação.
*Então se for rodar por exemplo na url "http://local1/local2/" precisa colocar essa URL
*Toda a aplicação roda em base nessa url configurada nesse arquivo, então se fosse um sistema grande e fosse preciso fazer uma migração de url, o único trabalho seria de alterar esse arquivo (e todas as urls da aplicação são alteradas automaticamente)
4- Acessar o arquivo classes/Class_Mysql.php e alterar os dados do banco de dados
*O arquivo sql está no git: db_lojablue_2020-06-24.sql

Observação 1:
O layout foi feito em Bootstrap 4, eu só alterei as cores e coloquei o logotipo da BlueService.
Depois que finalizarem os testes eu me comprometo em tirar essa aplicação do ar e não reaproveitar em lugar nenhum, já que acabei usando a identidade visual da empresa Blue Service.


Observação 2:
Fiz um teste em rodar em 2 ambientes diferentes, e percebi que um dos ambientes deu um conflito no UTF8 (acentos). Então não sei ao certo se vocês forem rodar em um ambiente de vocês, se acontecerá esse problema também (é fácil de resolver e não sei se isso implicará na minha avaliação, por isso só estou comentando aqui)

# blueservice-teste-php
