<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Biblio - Login/Cadastro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style>
        /* styles.css */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-container {
            margin-top: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        #login-form, 
        #cadastro-form {
            display: flex;
            flex-direction: column;
        }

        input {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px;
            background-color: #2ecc71;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #27ae60;
        }

        p {
            text-align: center;
            color: #666;
        }

    </style>

    <div class="container">
        <h1>Minha Biblio</h1>
        <div class="form-container">
            <form id="cadastro-form" method="post">
                <h2>Cadastro</h2>
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit">Cadastrar</button>
                <p>Já tem uma conta? <a href="login.php">Faça Login</a></p>
            </form>
        </div>
    </div>
</body>
</html>
