<?php
// Exemplo para editarLido.php
include('../includes/connect.php');

    $livro = null;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_queroler WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $livro = $result->fetch_assoc();
        }
        $stmt->close();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        $id_editar = $_POST['id'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $genero = $_POST['genero'];
        $comentario = $_POST['comentario'];
        $capa_path = $_POST['capa_existente']; // Campo hidden para capa existente

        // Lógica de upload da nova capa (similar ao cadastro, mas atualiza o caminho)
        if (isset($_FILES['capa']) && $_FILES['capa']['error'] == UPLOAD_ERR_OK) {
            // ... (código de upload, atualiza $capa_path)
        }

        $sql_update = "UPDATE tbl_queroler SET titulo=?, autor=?, genero=?, comentario=?, capa=? WHERE id=?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("sssssi", $titulo, $autor, $genero, $comentario, $capa_path, $id_editar);

        if ($stmt_update->execute()) {
            header("Location: conteudoQueroLer.php?id=" . $id_editar); // Redireciona para a visualização
            exit();
        } else {
            echo "Erro ao atualizar: " . $stmt_update->error;
        }
        $stmt_update->close();
    }
    $conn->close();
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
    <title>Editar | Quero Ler</title>
</head>
<body>
    <style>
        main .parte_seis .editar button {
            padding: 10px 30px;
            border-radius: 10px;
            cursor: pointer;
            border: 10px;
            border: 1px solid var(--input-border);
            background-color: var(--background-novo);
        }

        .parte_seis {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 30px;
        }

        .parte_quatro {
            display: flex;
            align-items: center;
            justify-content: center;
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
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $livro['id']; ?>">
                <section class="parte_um">
                    <div class="voltar">
                        <a href="conteudoQueroLer.php?id=<?php echo $livro['id']; ?>""><i class="ri-arrow-left-line"></i></a>
                    </div>

                    <div class="titulo">
                        <h1>Editar o livro que quer ler</h1>
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


                <section class="parte_quatro">
                    <div class="input">
                        <label for="capa">Capa do Livro</label>
                        <input type="file" name="capa" id="capa" accept="image/*">
                        <input type="hidden" name="capa_existente" value="<?php echo $livro['capa']; ?>">
                    </div>
                </section>

                <section class="parte_cinco">
                    <div class="input">
                        <label for="comentario">Comentário</label>
                        <textarea name="comentario" id="comentario"><?php echo $livro['comentario']; ?></textarea>
                    </div>
                </section>

                <section class="parte_seis">
                    <div class="btns editar">
                        <button id="editar_livro" type="submit">EDITAR LIVRO</button>
                    </div>
                </section>
            </form>
        </div>
    </main>
</body>
</html>