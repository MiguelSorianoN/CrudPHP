<?php 
include 'principal_controller.php'; 

// Pega todos os produtos para preencher os dados da tabela 
$produtos = getProdutos();
?>

<?php include 'header.php'; ?>

<div class="container">
    <div class="flex-grow-1">
        <!--<h3>Olá, <?php echo htmlspecialchars($nome); ?>!</h3>

        <form method="POST" action="">
            <input type="submit" name="logout" value="Logout">
        </form>-->
    </div>
</div>
<div class="flex-grow-1">
    <div class="container mt-4">
        <h2 class="text-center mb-4">Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</h2>

        <form method="POST" action="" class="text-center mb-4">
            <input type="submit" name="logout" value="Logout" class="btn btn-danger">
        </form>

        <h2 class="text-center mb-4">Produtos Cadastrados</h2>
        <div class="row">
            <?php foreach ($produtos as $produto): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 d-flex flex-column">
                        <img src="<?php echo $produto['url_img'] ?: 'https://via.placeholder.com/200'; ?>"
                            class="card-img-top"
                            alt="<?php echo htmlspecialchars($produto['nome']); ?>"
                            style="height: 350px; object-fit: cover;">
                        <div class="card-body flex-grow-1">
                            <h5 class="card-title"><?php echo htmlspecialchars($produto['nome']); ?></h5>
                            <p class="card-text text-muted"><?php echo htmlspecialchars($produto['descricao']); ?></p>
                            <p><strong>Marca:</strong> <?php echo htmlspecialchars($produto['marca']); ?></p>
                            <p><strong>Modelo:</strong> <?php echo htmlspecialchars($produto['modelo']); ?></p>
                            <p><strong>Categoria:</strong> <?php echo htmlspecialchars($produto['categoria']); ?></p>
                            <p><strong>Preço:</strong> R$ <?php echo number_format($produto['valorunitario'], 2, ',', '.'); ?></p>
                            <p><strong>Ativo:</strong> <?php echo $produto['ativo'] ? 'Sim' : 'Não'; ?></p>
                        </div>
                        <form method="POST" action="principal.php">
                    <input type="hidden" name="id_produto" value="<?php echo $produto['id']; ?>">
                    <button type="submit" name="adicionar_produto" class="btn btn-primary btn-block">Comprar</button>
                </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

