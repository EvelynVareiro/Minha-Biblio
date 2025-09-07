<?php
$pagina_atual = 'queroLer';
include('../includes/connect.php');

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
    <title>Quero Ler</title>
</head>
<body>
    <style>
        main .lista-livros {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        main .lista-livros .livro-card {
            width: 250px;
            height: 400px; /* Aumenta a altura do card */
            border: 2px solid var(--input-border);
            overflow: hidden; /* Previne o conteúdo de transbordar */
            display: flex;
            flex-direction: column; /* Alinha o conteúdo verticalmente */
        }

        main .lista-livros .livro-card img {
            width: 100%; /* Faz a imagem ocupar toda a largura do card */
            height: 200px;
            object-fit: cover; /* Faz com que a imagem se ajuste sem distorcer */
        }

        main .lista-livros .livro-card a {
            text-decoration: none;
        }

        main .lista-livros .livro-card h3 {
            color: #313131;
            margin: 6px; /* Adiciona margens ao título */
            font-size: 1em; /* Tamanho de fonte que se adapte */
            height: 60px; /* Define uma altura fixa para o título */
            overflow: hidden; /* Oculta o texto que excede a altura */
            text-overflow: ellipsis; /* Adiciona '...' ao final do texto cortado */
            white-space: nowrap; /* Impede que o título mande para a linha seguinte */
        }
    </style>


    <?php include '../includes/nav.php'; ?>
    <?php include '../includes/menu.php'; ?>

    <main>
        <div class="novo">
            <a href="cadQueroLer.php"><button class="btn_novo"><i class="ri-add-circle-fill"></i> <p>NOVO</p></button>
            </a>
        </div>

        <div class="lista-livros">
            <?php
            $sql = "SELECT id, titulo, capa FROM tbl_queroler";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="livro-card">';
                    echo '<a href="conteudoQueroLer.php?id=' . $row['id'] . '">';
                    echo '<img src="' . $row['capa'] . '" alt="Capa de ' . $row['titulo'] . '">';
                    echo '<h3>' . $row['titulo'] . '</h3>';
                    echo '</a>';
                    echo '</div>';
                }
            } else {
                echo "<p>Nenhum livro lido cadastrado ainda.</p>";
            }
            $conn->close();
            ?>
        </div>
    </main>
</body>
</html>