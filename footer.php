<footer class="bg-dark text-white d-flex align-items-center" style="padding: 0.5rem;">
    <div class="container text-center">
        <p class="mb-0">&copy; <?php echo date("Y"); ?> E-commerce. Todos os direitos reservados. 
        <?php if (isset($_SESSION['nome'])): ?>
                | Usuário logado: <strong><?php echo htmlspecialchars($_SESSION['nome']); ?></strong>
            <?php endif; ?>
        </p>
    </div>
</footer>

<!-- Scripts do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Versão completa do jQuery -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
