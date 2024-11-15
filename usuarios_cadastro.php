<?php
include 'usuarios_controller.php';

session_start();

// Verifica se o usuário está registrado na sessão (logado)
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

//Pega todos os usuários para preencher os dados da tabela
$users = getUsers();

//Variável que guarda o ID do usuário que será editado
$userToEdit = null;

// Verifica se existe o parâmetro edit pelo método GET
// e sé há um ID para edição de usuário
if (isset($_GET['edit'])) {
    $userToEdit = getUser($_GET['edit']);
}
?>

<?php include 'header.php'; ?> 

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Usuários</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function clearForm() {
            document.getElementById('nome').value = '';
            document.getElementById('telefone').value = '';
            document.getElementById('email').value = '';
            document.getElementById('senha').value = '';
            document.getElementById('id').value = '';
        }
    </script>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Cadastro de Usuários</h2>
        
        <form method="POST" action="" class="mb-4">
            <input type="hidden" id="id" name="id" value="<?php echo $userToEdit['id'] ?? ''; ?>">

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $userToEdit['nome'] ?? ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" class="form-control" value="<?php echo $userToEdit['telefone'] ?? ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo $userToEdit['email'] ?? ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" class="form-control" required>
            </div>

            <div class="form-group text-center">
                <button type="submit" name="save" class="btn btn-success">Salvar</button>
                <button type="submit" name="update" class="btn btn-warning">Atualizar</button>
                <button type="button" onclick="clearForm()" class="btn btn-secondary">Novo</button>
            </div>
        </form>

        <h2 class="text-center mb-4">Usuários Cadastrados</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!--Faz um loop FOR no resultset de usuários e preenche a tabela-->
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['nome']; ?></td>
                        <td><?php echo $user['telefone']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td>
                            <a href="?edit=<?php echo $user['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="?delete=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php include 'footer.php'; ?> 
