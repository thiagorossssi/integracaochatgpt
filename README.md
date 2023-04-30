Está é uma aplicação web completa e integrada ao ChatGPT.

Desenvolvido pelo engenheiro de computação / analista de sistemas web Thiago Rossi.

No font-end foi utilizado o framework MaterializaCSS para implementção dos elementos visuais e também a biblioteca JQuery para efetuar requisições ao back-end via Ajax.

O back-end foi implementado utilizando a linguagem PHP onde conta com Controllers para receber e responder as requisições e os Models que recebem os dados vindos do Controller e os devolve processados. O Controller por sua vez devolve ao front-end no formato json.


-- CONFIGURAÇÃO DA API
Acesse o arquivo ./api/Models/Openai.php e no método getConteudoGeradoOpenAI() insira a sua chave de API gerada na página https://platform.openai.com/account/api-keys e atribua à variável $OPENAI_API_KEY.


O diferencial para essa aplicação é um filtro aplicado baseado em palavras chaves definidas no método getStatusKeyWord() onde só é consumida a API da Open AI caso exista alguma palavra da lista de palavras chaves no texto enviado pelo usuário.

Caso não tenha nenhuma das palavras definidas, será retornada uma mensagem de erro através da biblioteca $.notify().
