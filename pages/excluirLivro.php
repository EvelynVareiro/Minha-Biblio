    <?php
    include('../includes/connect.php');

    if (isset($_GET['id']) && isset($_GET['table'])) {
        $id = $_GET['id'];
        $table = $_GET['table']; // 'lido', 'lendo', 'queroler'

        // Validação para evitar SQL Injection no nome da tabela
        $allowed_tables = ['tbl_lido', 'tbl_lendo', 'tbl_queroler'];
        $db_table = '';
        if ($table == 'lido') {
            $db_table = 'tbl_lido';
        } elseif ($table == 'lendo') {
            $db_table = 'tbl_lendo';
        } elseif ($table == 'queroler') {
            $db_table = 'tbl_queroler';
        } else {
            die("Tabela inválida.");
        }

        // Opcional: Excluir o arquivo da capa do servidor
        $sql_select_capa = "SELECT capa FROM " . $db_table . " WHERE id = ?";
        $stmt_select_capa = $conn->prepare($sql_select_capa);
        $stmt_select_capa->bind_param("i", $id);
        $stmt_select_capa->execute();
        $result_capa = $stmt_select_capa->get_result();
        if ($result_capa->num_rows > 0) {
            $row_capa = $result_capa->fetch_assoc();
            if (!empty($row_capa['capa']) && file_exists($row_capa['capa'])) {
                unlink($row_capa['capa']); // Exclui o arquivo físico
            }
        }
        $stmt_select_capa->close();


        $sql = "DELETE FROM " . $db_table . " WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Redireciona de volta para a página principal da funcionalidade
            header("Location: " . $table . ".php");
            exit();
        } else {
            echo "Erro ao excluir: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "ID ou tabela não especificados.";
    }
    $conn->close();
    ?>
    