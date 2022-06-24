<?php 

if (!empty($_GET['id'])) {
    include_once '../../connection/config.php';
    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM disciplinas WHERE id = $id";
    $result = $con->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM disciplinas WHERE id =$id";
        $resultDelete = $con->query($sqlDelete);
    }
}
    header("Location: lista-disciplinas.php?pagina=1");
?>