# Desafio para a vaga de Fullstack Developer (PHP/Laravel e VueJS)

## Instruções
- O desafio consiste em criar uma pequena aplicação fullstack com o Backend em PHP/Laravel e o Front-end (client) em VueJS.
- A aplicação precisará entregar uma aplicação com o CRUD completo para o cadastro de produtos.
- A ideia é avaliar habilidades como técnica e lógica de programação, estilo de código e padronização do trabalho.

### Entrega Esperada
- README com instruções de como rodar as duas aplicações juntas
- Tela inicial com listagem de produtos
- Tela de detalhe do produto com infos sobre o produto
- Tela de edição de produto
- Modal de confirmação de exclusão de um produto
-  Ao excluir, o sistema deverá realizar um "soft delete" do registro na base

### Requisitos
- Utilizar boas práticas de programação e código limpo
- Utilizar GIt e commits com padrão Conventional Commit
- Utilizar a o formato abaixo para criar a modelagem do produto no banco de dados:
    - Produto
        - id
        - name
        - description
        - price
        -  is_available
        - image

## Informações Úteis
- O candidato deverá clonar o repositório de back-end e do front-end, rodar as duas aplicações localmente e criar o trabalho proposto no desafio.

### Back-end (php-laravel)
- No docker-compose do projeto já tem instância de MySQL e a aplicação conteinerizada
- Utilizar API Rest para expor as rotas para o front-end
- Anexar um arquivo do Postman com exemplos das chamadass
- Entrega com testes de unidade ou E2E serão usadas como critério de desempate.

### Front-end (front-vuejs)
- Utilizamos VueJS 2 criados a partir do "Getting Start" da documentação
- Criar rota e layout utilizando Vue-Material, Vue-Bootstrap ou Vuetify (ou outra lib de sua escolha)
- Criar uma página para listar os produtos
- Botões e interações na listagem para entrar no detalhe do produto, editar ou excluir um produto
- Tela de Detalhes do Produto