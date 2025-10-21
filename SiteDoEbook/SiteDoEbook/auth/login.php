<?php
session_start();
require '../config/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        header('Location: ../../AccessPage/acesso.php');
        exit;
    } else {
        echo "Login inválido!";
    }
}
?>
<body>

    <h2 class="page-title">Login</h2>
    <main>
        <form class=main-form method="post">
        <div>
            <input name="email" type="email" placeholder="Email" required><br>
            <input name="senha" type="password" placeholder="Senha"
            required><br>
            <button class=submit-btn type="submit">Entrar</button>
        </div>  
    </main>
</body>