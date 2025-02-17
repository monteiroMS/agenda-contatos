
# Agenda de Contatos

Este é um aplicativo de agenda de contatos construído com **Laravel**, **Sail**, **Inertia.js**, **Vue.js**, **Shadcn UI Vue**, **TailwindCSS**, e **Zod** para validação de formulários. O app permite que os usuários realizem o CRUD (Criar, Ler, Atualizar, Deletar) de contatos de forma simples e eficaz.

## Tecnologias Usadas

- **Laravel** (com Sail para Docker)
- **MySQL** (usado como banco de dados)
- **Inertia.js** (para renderizar views no frontend)
- **Vue.js** (para construção do frontend interativo)
- **Shadcn UI Vue** (para componentes UI)
- **TailwindCSS** (para estilização responsiva)
- **Zod** (para validação de formulários)

## Rodando o Projeto

Este projeto utiliza Docker para gerenciamento de containers. Para rodar o app localmente, siga os passos abaixo:

### Pré-requisitos

1. Tenha o Docker e o Docker Compose instalados em sua máquina. Caso não tenha, você pode seguir a documentação oficial do Docker para instalação:
   - [Documentação do Docker](https://docs.docker.com/get-docker/)
   - [Documentação do Docker Compose](https://docs.docker.com/compose/install/)

### Passos para rodar

1. Clone o repositório:

   ```bash
   git clone git@github.com:monteiroMS/agenda-contatos.git
   cd agenda-contatos
   ```

2. Suba os containers com o Sail:

   ```bash
   ./vendor/bin/sail up -d
   ```

   Isso iniciará o container com o Laravel e do MySQL.

3. Instale as dependências do frontend:

   Abra um novo terminal e rode:

   ```bash
   npm install
   ```

4. Para rodar o app, execute o comando:

   ```bash
   npm run dev
   ```

   Isso iniciará o servidor de desenvolvimento e você poderá acessar o aplicativo no seu navegador em `http://localhost`.

### Banco de Dados

O banco de dados MySQL já está configurado dentro do container Docker. As credenciais padrão são:

- **Host**: `mysql`
- **Usuário**: `root`
- **Senha**: `root`

### Popular Tabela de Contatos

Para popular a tabela de contatos com 200 registros fictícios, utilize o comando:

```bash
./vendor/bin/sail php artisan db:seed
```

Esse comando irá gerar 200 contatos e permitir a paginação server-side dos itens na interface.

### Funcionalidades

- **Cadastro de Contatos**: Adicione novos contatos com nome, telefone, e-mail, etc.
- **Leitura de Contatos**: Consulte todos os contatos cadastrados.
- **Atualização de Contatos**: Altere as informações de um contato existente.
- **Exclusão de Contatos**: Remova contatos da agenda.

### Validação de Formulários

A validação de formulários é feita com **Zod**, garantindo que todos os dados sejam validados antes de serem enviados ao backend.
