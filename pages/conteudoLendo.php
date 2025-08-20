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
    <title>Conteúdo | Lendo</title>
</head>
<body>
    <style>
        .parte_seis {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 30px;
        }

        .parte_seis .btns {
            display: flex;
            flex-direction: row;
            gap: 20px;
        }
        .excluir-btn {
            background-color: var(--border-red); 
            color: #fff; 
            border: none;
            padding: 10px 20px; 
            cursor: pointer; 
            border-radius: 10px;
            font-size: 16px;
        }

        .excluir-btn:hover {
            background-color: darkred; 
        }
        .editar-btn {
            background-color: var(--border-yellow); 
            color: #fff; 
            border: none;
            padding: 10px 20px; 
            cursor: pointer; 
            border-radius: 10px;
            font-size: 16px;
        }

        .editar-btn:hover {
            background-color: var(--text-yellow); 
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
                <section class="parte_um">
                    <div class="voltar">
                        <a href="lendo.php"><i class="ri-arrow-left-line"></i></a>
                    </div>

                    <div class="titulo">
                        <h1>Visualize o livro que você está lendo</h1>
                    </div>
                </section>

                <section class="parte_dois">
                    <div class="input">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" value="<?php echo $livro['titulo']; ?>" disabled>
                    </div>

                    <div class="input">
                        <label for="autor">Autor</label>
                        <input type="text" name="autor" value="<?php echo $livro['autor']; ?>" disabled>
                    </div>

                    <div class="input">
                        <label for="genero">Gênero</label>
                        <input type="text" name="genero" value="<?php echo $livro['genero']; ?>" disabled>
                    </div>
                </section>


                <section class="parte_quatro" style="display: flex; flex-direction: row; gap: 40px; align-items: center; justify-content: center;">
                    <div class="input">
                        <label for="total_paginas">Total de páginas:</label>
                        <input type="number" name="total_paginas" value="<?php echo $livro['total_paginas']; ?>" disabled>
                    </div>

                    <div class="input">
                        <label for="pagina_atual">Página atual:</label>
                        <input type="number" id="pagina_atual" name="pagina_atual" value="<?php echo $livro['pagina_atual']; ?>" required>
                    </div>
                </section>

                <section class="parte_cinco">
                    <div class="input">
                        <label for="comentario">Comentário</label>
                        <textarea name="comentario" id="comentario" disabled><?php echo $livro['comentario']; ?></textarea>
                    </div>
                </section>

                <section class="parte_seis">
                    <div class="btns">
                        <a href="editarLendo.php?id=<?php echo $livro['id']; ?>"><button class="editar-btn" id="editar" value="editar" type="button">EDITAR</button></a>
                        <button class="excluir-btn" onclick="confirmDelete(<?php echo $livro['id']; ?>)">EXCLUIR</button>
                    </div>
                </section>
            </form>
        </div>
    </main>

    <script>
        function confirmDelete(id) {
            if (confirm("Tem certeza que deseja excluir este livro?")) {
                window.location.href = "excluirLivro.php?id=" + id + "&table=lendo"; // Passa o ID e a tabela
            }
        }
    </script>
</body>
</html>