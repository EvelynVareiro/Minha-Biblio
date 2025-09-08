# Minha-Biblio
MinhaBiblio, a sua biblioteca pessoal.


## 📚 Sobre o Projeto
**MinhaBiblio** é um sistema web desenvolvido para ajudar os amantes de leitura a organizar seus livros em três categorias distintas:

1. **LIDO** - Para livros já concluídos
2. **LENDO** - Para livros em progresso
3. **QUERO LER** - Para livros que deseja ler no futuro

O projeto permite que os usuários mantenham um registro pessoal de suas leituras, acompanhem seu progresso e planejem futuras leituras de forma organizada.


## ✨ Funcionalidades Principais
### Para Livros Lidos:
- Cadastro de título, autor e gênero
- Upload da capa do livro
- Sistema de avaliação (0 a 5 estrelas)
- Campo para comentários sobre a leitura

### Para Livros em Leitura:
- Cadastro de título, autor e gênero
- Upload da capa do livro
- Controle de progresso (páginas totais e página atual)
- Cálculo automático de porcentagem concluída
- Campo para anotações

### Para Livros Desejados:
- Cadastro de título, autor e gênero
- Upload da capa do livro
- Campo para observações


## 🛠 Tecnologias Utilizadas
- **Front-end:**
  - HTML5
  - CSS3 (com variáveis customizadas)
  - JavaScript (para interações básicas)
  - Biblioteca de ícones Remix Icons

- **Back-end:**
  - PHP
  - MySQL (para armazenamento de dados)
  - Sistema de upload de imagens


## 🚀 Como Executar o Projeto
**Pré-requisitos:**
1. Servidor web com suporte a PHP (ex: Apache, Nginx)
2. PHP instalado (versão 7.4 ou superior recomendada)
3. MySQL ou MariaDB instalado e configurado
4. Navegador web moderno (Chrome, Firefox, Edge, etc.)
5. Ferramenta para importar banco de dados (ex: phpMyAdmin, MySQL Workbench) ou linha de comando MySQL

**Passos para rodar localmente:**
1. Clone ou baixe o repositório do projeto
2. ```git clone https://github.com/usuario/minha-biblio.git
3. Run

**Configure o banco de dados:**
1. Crie um banco de dados no MySQL, por exemplo minhabiblio_db.
2. Importe o arquivo de estrutura do banco de dados (se fornecido, ex: database.sql):
- mysql -u seu_usuario -p minhabiblio_db < database.sql

**Configure as credenciais do banco de dados:**
1. Abra o arquivo de configuração do projeto (ex: config.php ou similar).
2. Atualize as variáveis de conexão com o banco de dados (host, usuario, senha, nome_do_banco).

**Configure as credenciais do banco de dados:**
1. Coloque os arquivos do projeto na pasta raiz do servidor (ex: htdocs no XAMPP).
2. Certifique-se que o servidor está rodando.

**Acesse o sistema pelo navegador:**
1. Abra o navegador e acesse http://localhost/minhabiblio (ou o caminho configurado).

**Comece a usar o MinhaBiblio**



