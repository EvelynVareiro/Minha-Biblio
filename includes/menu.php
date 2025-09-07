<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>menu</title>
</head>
<body>
    <menu>
        <div class="menu_options">
            <a href="lido.php" class="menu_button button_lido <?php if($pagina_atual == 'lido') echo 'ativo'; ?>">LIDO</a>
            <a href="lendo.php" class="menu_button button_lendo <?php if($pagina_atual == 'lendo') echo 'ativo'; ?>">LENDO</a>
            <a href="queroLer.php" class="menu_button button_queroLer <?php if($pagina_atual == 'queroLer') echo 'ativo'; ?>">QUERO LER</a>
        </div>

        <div class="menu_search">
            <form action="" method="GET">
                <input type="search" name="menu_search" id="menu_search" placeholder="Pesquisar livro, autor, gênero...">
            </form>
        </div>
    </menu>
</body>
</html>