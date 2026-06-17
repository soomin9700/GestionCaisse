<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisir caisse</title>
</head>
<body>
    <h1>Choisir une caisse</h1>
    <form action="/Achat" method="post">
        <label for="caisse">Sélectionnez une caisse :</label>
        <select name="caisse" id="caisse">
            <?php foreach ($caisses as $caisse): ?>
                <option value="<?= $caisse['id'] ?>"><?= $caisse['nom'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Valider</button>
    </form>
</body>
</html>