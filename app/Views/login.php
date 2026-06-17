<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/login" method="post">
        <label for="email">Email:</label>
        <input type="email" value="rojo@itu.mg" id="email" name="email" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" value="secret123" id="password" name="password" required>
        <br>
        <button type="submit">Se connecter</button>
    </form>
    <?php if (session()->has('error')): ?>
        <p style="color: red;"><?= session('error') ?></p>
    <?php endif; ?>
</body>
</html>