# Exercício CRUD - PHP + MySQL

## Credenciais do Banco
- Host: db
- Banco: tasks_db
- Usuário: app
- Senha: app123
- Porta MySQL: 3306

## Como rodar o projeto
1. Instale Docker e Docker Compose.
2. No terminal, dentro da pasta do projeto:
   ```bash
   docker compose up -d --build
   ```
3. Acesse: http://localhost:8080

## O que você deve implementar
1. Página para **Criar** tarefa (`create.php`).
2. Página para **Editar** tarefa (`edit.php`).
3. Função para **Excluir** tarefa (`delete.php`).
4. Página inicial (`index.php`) já lista tarefas, complete a lógica dos botões.

## Bônus (opcional)
- Melhorar o visual (CSS).
- Adicionar validações nos formulários.
- Mostrar mensagens de sucesso/erro.
