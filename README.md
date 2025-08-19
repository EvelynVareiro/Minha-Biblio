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
1. **Pré-requisitos:**
   - Servidor web (Apache, Nginx, etc.)
   - PHP instalado
   - MySQL/MariaDB
   - Banco de dados configurado (ver arquivo `connect.php`)

2. **Configuração:**
   - Clone o repositório
   - Configure as credenciais do banco de dados no arquivo `includes/connect.php`
   - Certifique-se que a pasta `assets/uploads/capas/` exista e tenha permissões de escrita

3. **Acesso:**
   - Acesse o projeto através do servidor web configurado


## 📌 Estrutura de Arquivos

```
biblioteca-pessoal/
├── assets/
│   ├── css/
│   │   ├── fonts.css
│   │   ├── style.css
│   │   └── variables.css
│   ├── fonts/
│   └── uploads/
│       └── capas/
├── includes/
│   ├── connect.php
│   ├── estilos.php
│   ├── menu.php
│   └── nav.php
└── livros/
    ├── cadLendo.php
    ├── cadLido.php
    ├── cadQueroLer.php
    ├── conteudoLendo.php
    ├── conteudoLido.php
    ├── conteudoQueroLer.php
    ├── editarLendo.php
    ├── editarLido.php
    ├── editarQueroLer.php
    ├── excluirLivro.php
    ├── lendo.php
    ├── lido.php
    └── queroLer.php
```


## 🌟 Recursos Futuros
- [ ] Sistema de login e usuários individuais
- [ ] Busca avançada por título, autor ou gênero
- [ ] Versão mobile responsiva

---
