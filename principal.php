<?php
include 'produtos_controller.php';

session_start();

// Verifica se o usuário está registrado na sessão (logado)
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

// Pega todos os produtos para preencher os dados da tabela
$produtos = getProdutos();

// Variável que guarda o ID do produto que será editado
$produtoToEdit = null;

// Verifica se existe o parâmetro edit pelo método GET
// e se há um ID para edição de produto
if (isset($_GET['edit'])) {
    $produtoToEdit = getProduto($_GET['edit']);
}
?>
<?php include 'header.php'; ?>

<div class="flex-grow-1">
    <div class="container mt-4">
        <h2 class="text-center mb-4">Bem-vindo, <?php echo htmlspecialchars($nome); ?>!</h2>

        <form method="POST" action="" class="text-center mb-4">
            <input type="submit" name="logout" value="Logout" class="btn btn-danger">
        </form>

        <h2 class="text-center mb-4">Produtos Cadastrados</h2>
<div class="row">
    <?php foreach ($produtos as $produto): ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="<?php echo $produto['url_img'] ?: 'https://via.placeholder.com/200'; ?>" 
                     class="card-img-top" 
                     alt="<?php echo htmlspecialchars($produto['nome']); ?>" 
                     style="height: 350px width: 450px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($produto['nome']); ?></h5>
                    <p class="card-text text-muted"><?php echo htmlspecialchars($produto['descricao']); ?></p>
                    <p><strong>Marca:</strong> <?php echo htmlspecialchars($produto['marca']); ?></p>
                    <p><strong>Modelo:</strong> <?php echo htmlspecialchars($produto['modelo']); ?></p>
                    <p><strong>Categoria:</strong> <?php echo htmlspecialchars($produto['categoria']); ?></p>
                    <p><strong>Preço:</strong> R$ <?php echo number_format($produto['valorunitario'], 2, ',', '.'); ?></p>
                    <p><strong>Ativo:</strong> <?php echo $produto['ativo'] ? 'Sim' : 'Não'; ?></p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="?edit=<?php echo $produto['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                    <a href="?delete=<?php echo $produto['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
    </div>
</div>

<?php include 'footer.php'; ?>
