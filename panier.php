<?php
session_start();

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Tableau de produits
$produits = [
    1 => ["nom" => "Produit 1", "prix" => 10.00],
    2 => ["nom" => "Produit 2", "prix" => 20.00],
    3 => ["nom" => "Produit 3", "prix" => 30.00]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    if (isset($produits[$id])) {
        $_SESSION['panier'][] = $produits[$id];
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
</head>
<body>
<h1>Votre Panier</h1>
<ul>
    <?php if (empty($_SESSION['panier'])) : ?>
        <p>Votre panier est vide.</p>
    <?php else : ?>
        <?php foreach ($_SESSION['panier'] as $article) : ?>
            <li><?php echo htmlspecialchars($article['nom']) . " - €" . htmlspecialchars($article['prix']); ?></li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
<a href="produits.php">Retour aux produits</a>
<a href="finaliser_commande.php">Finaliser la commande</a>
</body>
</html>