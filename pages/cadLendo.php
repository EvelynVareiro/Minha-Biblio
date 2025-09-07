<?php
include('../includes/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];
    $total_paginas = isset($_POST['total_paginas']) ? $_POST['total_paginas'] : null; // Define como null se não estiver definido
    $pagina_atual = isset($_POST['pagina_atual']) ? $_POST['pagina_atual'] : 0; // Pode ser 0 ao cadastrar
    $capa_path = ''; // Inicializa o caminho da capa
    $comentario = isset($_POST['comentario']) ? $_POST['comentario'] : ''; // Define um valor padrão se não estiver definido

    // Cálculo do progresso
    $progresso = 0;
    if ($total_paginas > 0) {
        $progresso = ($pagina_atual / $total_paginas) * 100;
    }

        // Lógica de upload da capa
        if (isset($_FILES['capa']) && $_FILES['capa']['error'] == UPLOAD_ERR_OK) {
            $target_dir = "../assets/uploads/capas/"; // Certifique-se de que esta pasta existe e tem permissão de escrita
            $file_name = basename($_FILES["capa"]["name"]);
            $target_file = $target_dir . uniqid() . "_" . $file_name; // Adiciona um ID único para evitar conflitos
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Verifica se é uma imagem real
            $check = getimagesize($_FILES["capa"]["tmp_name"]);
            if ($check !== false) {
                // Permite certos formatos de arquivo
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    echo "Desculpe, apenas arquivos JPG, JPEG, PNG & GIF são permitidos.";
                    // Você pode adicionar um exit() ou um erro mais robusto aqui
                } else {
                    if (move_uploaded_file($_FILES["capa"]["tmp_name"], $target_file)) {
                        $capa_path = $target_file; // Salva o caminho relativo no banco de dados
                    } else {
                        echo "Desculpe, houve um erro ao fazer o upload do seu arquivo.";
                    }
                }
            } else {
                echo "O arquivo não é uma imagem.";
            }
        }

        // Agora, use $capa_path na sua query SQL
        $sql = "INSERT INTO tbl_lendo (titulo, autor, genero, total_paginas, pagina_atual, progresso, capa, comentario) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssiiiss", $titulo, $autor, $genero, $total_paginas, $pagina_atual, $progresso, $capa_path, $comentario); // 's' para string da capa

        if ($stmt->execute()) {
            header("Location: lendo.php");
            exit();
        } else {
            echo "Erro: " . $stmt->error;
        }
        $stmt->close();
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
    <title>Cadastrar | Lendo</title>
</head>
<body>
    <style>
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
    </style>


    <?php include '../includes/nav.php'; ?>

    <main class="novo_main cadastro editar">
        <div class="container">
            <form action="" method="POST" enctype="multipart/form-data">
                <section class="parte_um">
                    <div class="voltar">
                        <a href="lendo.php"><i class="ri-arrow-left-line"></i></a>
                    </div>

                    <div class="titulo">
                        <h1>Adicione aqui o livro que você está lendo</h1>
                    </div>
                </section>

                <section class="parte_dois">
                    <div class="input">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo">
                    </div>

                    <div class="input">
                        <label for="autor">Autor</label>
                        <input type="text" name="autor">
                    </div>

                    <div class="input">
                        <label for="genero">Gênero</label>
                        <input type="text" name="genero">
                    </div>
                </section>


                <section class="parte_tres" style="display: flex; flex-direction: row; gap: 30px;">
                    <div class="input">
                        <label for="total_paginas">Total de páginas:</label>
                        <input type="number" name="total_paginas" id="total_paginas" required>
                    </div>

                    <div class="input">
                        <label for="pagina_atual">Página atual:</label>
                        <input type="number" id="pagina_atual" name="pagina_atual" required>
                    </div>

                    <div class="input">
                        <label for="capa">Capa</label>
                        <input type="file" name="capa" id="capa" accept="image/*">
                    </div>
                </section>

                <section class="parte_quatro">
                    <div class="comentario">
                        <label for="comentario">Comentário</label>
                        <textarea name="comentario" id="comentario"></textarea>
                    </div>
                </section>

                <section class="parte_cinco">
                    <div class="btn_adicionar btns">
                        <button id="adicionar" type="submit">ADICIONAR LIVRO</button>
                    </div>
                </section>
            </form>
        </div>
    </main>
</body>
</html>