<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Session d'Achat - <?= esc($caisse['nom']) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2>Session d'Achat</h2>
            <p class="text-muted">
                <strong>Caisse :</strong> <?= esc($caisse['nom']) ?> | 
                <strong>Caissier(e) :</strong> <?= esc($user['nom']) ?>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">Ajouter un produit</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="select-produit" class="form-label">Choisir un produit</label>
                        <select id="select-produit" class="form-select">
                            <option value="">-- Sélectionner --</option>
                            <?php foreach ($produits as $p): ?>
                                <option value="<?= $p['id'] ?>" data-nom="<?= esc($p['nom']) ?>" data-prix="<?= $p['prix'] ?>" data-stock="<?= $p['stock'] ?>">
                                    <?= esc($p['nom']) ?> (<?= number_format($p['prix'], 2, ',', ' ') ?> MGA) - Stock: <?= $p['stock'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="input-quantite" class="form-label">Quantité</label>
                        <input type="number" id="input-quantite" class="form-control" value="1" min="1">
                    </div>
                    <button type="button" id="btn-ajouter" class="btn btn-success w-100">Ajouter au panier</button>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <form action="<?= base_url('achat/cloturer') ?>" method="POST" id="form-achat">
                
                <input type="hidden" name="idCaisse" value="<?= $caisse['id'] ?>">
                <input type="hidden" name="idUser" value="<?= $user['id'] ?>">

                <div class="card">
                    <div class="card-header bg-dark text-white">Détails du panier</div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0" id="table-panier">
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Prix Unitaire</th>
                                    <th>Quantité</th>
                                    <th>Montant</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <h4>Total : <span id="total-general">0.00</span> MGA</h4>
                        <input type="hidden" name="montant_total" id="input-total-general" value="0">
                        
                        <button type="submit" id="btn-cloturer" class="btn btn-danger btn-lg px-5 fw-bold" disabled>
                            🛒 CLÔTURER L'ACHAT
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const btnAjouter = document.getElementById('btn-ajouter');
    const selectProduit = document.getElementById('select-produit');
    const inputQuantite = document.getElementById('input-quantite');
    const tablePanierBody = document.querySelector('#table-panier tbody');
    const totalGeneralSpan = document.getElementById('total-general');
    const inputTotalGeneral = document.getElementById('input-total-general');
    const btnCloturer = document.getElementById('btn-cloturer');

    let panier = [];

    btnAjouter.addEventListener('click', () => {
        const selectedOption = selectProduit.options[selectProduit.selectedIndex];
        if (!selectedOption.value) return alert('Veuillez choisir un produit');

        const idProduit = parseInt(selectedOption.value);
        const nom = selectedOption.getAttribute('data-nom');
        const prix = parseFloat(selectedOption.getAttribute('data-prix'));
        const stock = parseInt(selectedOption.getAttribute('data-stock'));
        const quantite = parseInt(inputQuantite.value);

        if (quantite <= 0) return alert('Quantité invalide');
        if (quantite > stock) return alert('Stock insuffisant ! Stock disponible : ' + stock);

        // Vérifier si le produit est déjà dans le panier
        const indexExistant = panier.findIndex(item => item.idProduit === idProduit);
        if (indexExistant !== -1) {
            if ((panier[indexExistant].quantite + quantite) > stock) {
                return alert('Impossible d\'ajouter cette quantité, dépassement du stock.');
            }
            panier[indexExistant].quantite += quantite;
            panier[indexExistant].montant = panier[indexExistant].quantite * prix;
        } else {
            panier.push({
                idProduit,
                nom,
                prix,
                quantite,
                montant: quantite * prix
            });
        }

        renderPanier();
    });

    function renderPanier() {
        tablePanierBody.innerHTML = '';
        let total = 0;

        panier.forEach((item, index) => {
            total += item.montant;
            
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.nom}</td>
                <td>${item.prix.toFixed(2)}</td>
                <td>${item.quantite}</td>
                <td>${item.montant.toFixed(2)}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-warning" onclick="supprimerItem(${index})">Supprimer</button>
                </td>
                <input type="hidden" name="details[${index}][idProduit]" value="${item.idProduit}">
                <input type="hidden" name="details[${index}][quantite]" value="${item.quantite}">
                <input type="hidden" name="details[${index}][montant]" value="${item.montant.toFixed(2)}">
            `;
            tablePanierBody.appendChild(row);
        });

        totalGeneralSpan.innerText = total.toFixed(2);
        inputTotalGeneral.value = total.toFixed(2);
        
        btnCloturer.disabled = panier.length === 0;
    }

    window.supprimerItem = function(index) {
        panier.splice(index, 1);
        renderPanier();
    };
</script>

</body>
</html>