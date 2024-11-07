# API de Tarefas

Esta API permite o gerenciamento de tarefas relacionadas à manutenção de carros. Você pode listar, criar, obter por ID, atualizar e deletar tarefas. A seguir estão as rotas disponíveis e a descrição de como interagir com a API.

## Rotas da API

### 1. **Obter todas as tarefas**
   - **Método:** GET
   - **Endpoint:** `/tarefas`
   - **Descrição:** Retorna uma lista de todas as tarefas de manutenção de carros.
   - **Exemplo de resposta:**
     ```json
     [
       {
         "id": 1,
         "nome": "Trocar óleo",
         "user_id": "dipirona",
         "descricao": "Troca de óleo do motor do carro.",
         "prazo": "2024-11-10T15:00:00",
         "notificar": true
       },
       {
         "id": 2,
         "nome": "Trocar pneu",
         "user_id": "dipirona",
         "descricao": "Troca dos pneus dianteiros do carro.",
         "prazo": "2024-11-12T18:00:00",
         "notificar": false
       }
     ]
     ```
   - **Código de resposta:**
     - 200 OK: Caso as tarefas sejam retornadas com sucesso.

### 2. **Obter uma tarefa específica**
   - **Método:** GET
   - **Endpoint:** `/tarefas/{id}`
   - **Descrição:** Retorna os detalhes de uma tarefa específica, identificada pelo ID.
   - **Parâmetros:**
     - `id` (int) - O ID da tarefa.
   - **Exemplo de resposta:**
     ```json
     {
       "id": 1,
       "nome": "Trocar óleo",
       "user_id": "dipirona",
       "descricao": "Troca de óleo do motor do carro.",
       "prazo": "2024-11-10T15:00:00",
       "notificar": true
     }
     ```
   - **Códigos de resposta:**
     - 200 OK: Caso a tarefa seja encontrada.
     - 404 Not Found: Caso a tarefa não seja encontrada.
     - 400 Bad Request: Caso o ID não seja fornecido.

### 3. **Criar uma nova tarefa**
   - **Método:** POST
   - **Endpoint:** `/tarefas`
   - **Descrição:** Cria uma nova tarefa de manutenção de carro.
   - **Parâmetros do corpo da requisição (JSON):**
     - `nome` (string) - Nome da tarefa.
     - `user_id` (string) - ID do usuário responsável pela tarefa.
     - `descricao` (string) - Descrição da tarefa.
     - `prazo` (string) - Prazo de conclusão da tarefa.
     - `notificar` (boolean) - Indica se o usuário será notificado sobre o prazo da tarefa.
   - **Exemplo de requisição:**
     ```json
     {
       "nome": "Trocar filtro de ar",
       "user_id": "dipirona",
       "descricao": "Troca do filtro de ar do motor.",
       "prazo": "2024-11-15T09:00:00",
       "notificar": true
     }
     ```
   - **Exemplo de resposta:**
     ```json
     {
       "message": "Tarefa criada com sucesso."
     }
     ```
   - **Códigos de resposta:**
     - 201 Created: Caso a tarefa tenha sido criada com sucesso.
     - 400 Bad Request: Caso os dados estejam incompletos.
     - 500 Internal Server Error: Caso ocorra um erro ao criar a tarefa.

### 4. **Atualizar uma tarefa existente**
   - **Método:** PUT
   - **Endpoint:** `/tarefas/{id}`
   - **Descrição:** Atualiza os dados de uma tarefa existente.
   - **Parâmetros:**
     - `id` (int) - O ID da tarefa a ser atualizada.
   - **Parâmetros do corpo da requisição (JSON):**
     - `nome` (string) - Nome da tarefa.
     - `user_id` (string) - ID do usuário responsável pela tarefa (agora uma string).
     - `descricao` (string) - Descrição da tarefa.
     - `prazo` (string) - Prazo de conclusão da tarefa.
     - `notificar` (boolean) - Indica se o usuário será notificado sobre o prazo da tarefa.
   - **Exemplo de requisição:**
     ```json
     {
       "nome": "Trocar óleo",
       "user_id": "dipirona",
       "descricao": "Troca de óleo do motor do carro.",
       "prazo": "2024-11-20T10:00:00",
       "notificar": false
     }
     ```
   - **Exemplo de resposta:**
     ```json
     {
       "message": "Tarefa atualizada com sucesso."
     }
     ```
   - **Códigos de resposta:**
     - 200 OK: Caso a tarefa seja atualizada com sucesso.
     - 400 Bad Request: Caso os dados estejam incompletos ou o ID não seja fornecido.
     - 500 Internal Server Error: Caso ocorra um erro ao tentar atualizar a tarefa.

### 5. **Deletar uma tarefa**
   - **Método:** DELETE
   - **Endpoint:** `/tarefas/{id}`
   - **Descrição:** Deleta uma tarefa específica, identificada pelo ID.
   - **Parâmetros:**
     - `id` (int) - O ID da tarefa a ser deletada.
   - **Exemplo de resposta:**
     ```json
     {
       "message": "Tarefa deletada com sucesso."
     }
     ```
   - **Códigos de resposta:**
     - 200 OK: Caso a tarefa seja deletada com sucesso.
     - 400 Bad Request: Caso o ID não seja fornecido.
     - 500 Internal Server Error: Caso ocorra um erro ao tentar deletar a tarefa.