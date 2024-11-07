# API de Usuários

Esta API permite o gerenciamento de usuários. Você pode listar, criar, obter por nome de usuário, atualizar e deletar usuários. A seguir estão as rotas disponíveis e a descrição de como interagir com a API.

## Rotas da API

### 1. **Obter todos os usuários**
   - **Método:** GET
   - **Endpoint:** `/usuarios`
   - **Descrição:** Retorna uma lista de todos os usuários.
   - **Exemplo de resposta:**
     ```json
     [
       {
         "user": "dipirona",
         "senha": "fusca_azul"
       },
       {
         "user": "gabriel",
         "senha": "carro_berlina"
       }
     ]
     ```
   - **Código de resposta:**
     - 200 OK: Caso a lista de usuários seja retornada com sucesso.

### 2. **Obter um usuário específico**
   - **Método:** GET
   - **Endpoint:** `/usuarios/{user}`
   - **Descrição:** Retorna os dados de um usuário específico, identificado pelo nome de usuário (`user`).
   - **Parâmetros:**
     - `user` (string) - O nome do usuário.
   - **Exemplo de resposta:**
     ```json
     {
       "user": "dipirona",
       "senha": "fusca_azul"
     }
     ```
   - **Códigos de resposta:**
     - 200 OK: Caso o usuário seja encontrado.
     - 404 Not Found: Caso o usuário não seja encontrado.
     - 400 Bad Request: Caso o nome de usuário não seja fornecido.

### 3. **Criar um novo usuário**
   - **Método:** POST
   - **Endpoint:** `/usuarios`
   - **Descrição:** Cria um novo usuário.
   - **Parâmetros do corpo da requisição (JSON):**
     - `user` (string) - O nome do usuário.
     - `senha` (string) - A senha do usuário.
   - **Exemplo de requisição:**
     ```json
     {
       "user": "novousuario",
       "senha": "minhasenha"
     }
     ```
   - **Exemplo de resposta:**
     ```json
     {
       "message": "Usuário criado com sucesso."
     }
     ```
   - **Códigos de resposta:**
     - 201 Created: Caso o usuário tenha sido criado com sucesso.
     - 400 Bad Request: Caso os dados estejam incompletos.
     - 500 Internal Server Error: Caso ocorra um erro ao criar o usuário.

### 4. **Atualizar um usuário existente**
   - **Método:** PUT
   - **Endpoint:** `/usuarios/{user}`
   - **Descrição:** Atualiza os dados de um usuário existente.
   - **Parâmetros:**
     - `user` (string) - O nome de usuário a ser atualizado.
   - **Parâmetros do corpo da requisição (JSON):**
     - `user` (string) - O novo nome de usuário.
     - `senha` (string) - A nova senha do usuário.
   - **Exemplo de requisição:**
     ```json
     {
       "user": "novousuario",
       "senha": "novasenha"
     }
     ```
   - **Exemplo de resposta:**
     ```json
     {
       "message": "Usuário atualizado com sucesso."
     }
     ```
   - **Códigos de resposta:**
     - 200 OK: Caso o usuário seja atualizado com sucesso.
     - 400 Bad Request: Caso os dados estejam incompletos ou o nome de usuário não seja fornecido.
     - 500 Internal Server Error: Caso ocorra um erro ao tentar atualizar o usuário.

### 5. **Deletar um usuário**
   - **Método:** DELETE
   - **Endpoint:** `/usuarios/{user}`
   - **Descrição:** Deleta um usuário específico, identificado pelo nome de usuário (`user`).
   - **Parâmetros:**
     - `user` (string) - O nome do usuário a ser deletado.
   - **Exemplo de resposta:**
     ```json
     {
       "message": "Usuário deletado com sucesso."
     }
     ```
   - **Códigos de resposta:**
     - 200 OK: Caso o usuário seja deletado com sucesso.
     - 400 Bad Request: Caso o nome de usuário não seja fornecido.
     - 500 Internal Server Error: Caso ocorra um erro ao tentar deletar o usuário.