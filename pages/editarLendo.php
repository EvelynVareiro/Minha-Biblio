<?php 
include('../includes/connect.php');

$livro = null;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_lendo WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $livro = $result->fetch_assoc();
        }
        $stmt->close();
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];
    $total_paginas = $_POST['total_paginas'];
    $pagina_atual = $_POST['pagina_atual'];
    $capa_path = $_POST['capa_existente']; // Campo hidden para capa existente
    $comentario = isset($_POST['comentario']) ? $_POST['comentario'] : '';

    // Cálculo do progresso
    $progresso = 0;
    if ($total_paginas > 0) {
        $progresso = ($pagina_atual / $total_paginas) * 100; // Calcula a porcentagem
    }

    // Atualiza os dados no banco de dados
    $sql_update = "UPDATE tbl_lendo SET titulo=?, autor=?, genero=?, total_paginas=?, pagina_atual=?, progresso=?, capa=?, comentario=? WHERE id=?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("sssiiissi", $titulo, $autor, $genero, $total_paginas, $pagina_atual, $progresso, $capa, $comentario, $id);

    if ($stmt_update->execute()) {
        header("Location: conteudoLendo.php?id=" . $id_editar); // Redireciona após a atualização
        exit();
    } else {
        echo "Erro ao atualizar: " . $stmt_update->error;
    }

    // Feche a declaração e a conexão
    $stmt_update->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../includes/estilos.php">
    <!-- <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/style.css"> -->
    <title>Editar | Lendo</title>
</head>
<body>
    <style>
        main .parte_cinco .editar button {
            padding: 10px 30px;
            border-radius: 10px;
            cursor: pointer;
            border: 10px;
            border: 1px solid var(--input-border);
            background-color: var(--background-novo);
        }

        .input {
            display: flex;
            flex-direction: column;
        }

         .input label{
            text-transform: uppercase;
            font-family: 'Poppins';
        }

        .input input {
            width: 370px;
            padding: 10px 15px;
            background-color: #fff;
            border-radius: 10px;
            border: 1px solid var(--input-border);
            outline: none;
        }

        .input textarea {
            border: 1px solid var(--input-border);
            border-radius: 10px;
            padding: 20px;
            outline: none;
            height: 140px;
            width: 1193px;
            max-width: 1193px;
        }
    </style>

    <?php include '../includes/nav.php'; ?>

    <main class="novo_main cadastro editar">
        <div class="container">
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $livro['id']; ?>">

                <section class="parte_um">
                    <div class="voltar">
                        <a href="conteudolendo.php?id=<?php echo $livro['id']; ?>""><i class="ri-arrow-left-line"></i></a>
                    </div>

                    <div class="titulo">
                        <h1>Adicione aqui o livro que você está lendo</h1>
                    </div>
                </section>

                <section class="parte_dois">
                    <div class="input">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" value="<?php echo $livro['titulo']; ?>"> 
                    </div>

                    <div class="input">
                        <label for="autor">Autor</label>
                        <input type="text" name="autor" value="<?php echo $livro['autor']; ?>">
                    </div>

                    <div class="input">
                        <label for="genero">Gênero</label>
                        <input type="text" name="genero" value="<?php echo $livro['genero']; ?>">
                    </div>
                </section>


                <section class="parte_tres" style="display: flex; flex-direction: row; gap: 40px;">
                    <div class="input">
                        <label for="total_paginas">Total de páginas:</label>
                        <input type="number" name="total_paginas" value="<?php echo $livro['total_paginas']; ?>" required>
                    </div>

                    <div class="input">
                        <label for="pagina_atual">Página atual:</label>
                        <input type="number" id="pagina_atual" name="pagina_atual" value="<?php echo $livro['pagina_atual']; ?>" required>
                    </div>

                    <div class="input">
                        <label for="capa">Capa do Livro</label>
                        <input type="hidden" name="capa_existente" value="<?php echo $livro['capa']; ?>">
                        <input type="file" name="capa" id="capa" accept="image/*">
                    </div>
                </section>

                <section class="parte_quatro">
                    <div class="input">
                        <label for="comentario">Comentário</label>
                        <textarea name="comentario" id="comentario"><?php echo $livro['comentario']; ?></textarea>
                    </div>
                </section>

                <section class="parte_cinco">
                    <div class="btns editar">
                        <button id="editar_livro" type="submit">EDITAR LIVRO</button>
                    </div>
                </section>
            </form>
        </div>
    </main>
</body>
</html>