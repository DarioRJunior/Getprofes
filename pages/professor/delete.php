<?php 

if (!empty($_GET['id'])) {
    include_once '../../connection/config.php';
    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM disciplinas_ministradas WHERE id = $id";
    $result = $con->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM disciplinas_ministradas WHERE id =$id";
        $resultDelete = $con->query($sqlDelete);
    }
}
    header("Location: minhas-disciplinas.php?pagina=1");
?>