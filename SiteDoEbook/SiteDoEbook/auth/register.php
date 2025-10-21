<?php
require '../config/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

 $sql = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);

        if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar.";
    }
}
?>

<form class=main-form method="post">
<h2 class=page-title>Cadastrar</h2>
<main>
    <input name="nome" placeholder="Nome" required><br>
    <input name="email" type="email"  placeholder="Email" required><br>
    <input name="senha" type="password"     placeholder="Senha"
    required><br>
    <button class=submit-btn type="submit">Cadastrar</button>
</main>
</form>