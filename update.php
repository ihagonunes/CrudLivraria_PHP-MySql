<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "conexao.php";

        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $ano = $_POST['ano'];
        $genero = $_POST['genero'];
        $editora = $_POST['editora'];

        $sql = "UPDATE livros SET titulo = '$titulo', autor = '$autor', ano='$ano', genero = '$genero' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        if($result){
            header('Location: index.html');
            exit();
        }else{
            echo "Erro ao atualizar dados do livro";
            die(mysqli_error($conn));
        }
    }elseif(isset($_GET['id'])){
        include "conexao.php";

        $id = $_GET['id'];
        $sql = "SELECT * FROM livros WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

    <div class="container">
        <?php if($row): ?>
            <h2>Atualizar dados dos livros</h2>
            <form action="" method="POST">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" disabled="" type="hidden" name="id" value="<?php echo $row['id']?>">
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input maxlength="40" type="text" class="form-control"value="<?php echo $row['titulo']?>" name="titulo">
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label">autor</label>
                <input type="text" maxlength="30" class="form-control"value="<?php echo $row['autor']?>" name="autor">
            </div>
            <div class="mb-3">
                <label for="ano" class="form-label">Ano de publicação</label>
                <input type="text" maxlength="30" class="form-control"value="<?php echo $row['ano']?>" name="ano">
            </div>
            <div class="mb-3">
                <label for="editora" class="form-label">editora</label>
                <input type="text" maxlength="30" class="form-control"value="<?php echo $row['editora']?>" name="editora">
            </div>
            <div class="mb-3">
                <label for="genero" class="form label">Gênero:</label>
                <input type="text" class="form-control" name="genero"value="<?php echo $row['genero']?>" maxlength="40" required>
            </div>
                <input type="submit" value="Atualizar Livro" class="btn btn-primary">
                <a class="btn btn-secondary"href="index.php">Voltar</a>
        </form>
        <?php else: ?>
            <p>Erro ao atualizar o livro</p>
        <?php endif; ?>
    </div>
</body>
</html>