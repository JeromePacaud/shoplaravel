<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
</head>
<body>
    <h1>Bienvenue chez {{ $name }}l !</h1>
    <h2>
        Bienvenue dans ta boutique en ligne simple et chaleureuse, où chaque visite est une découverte. Que tu
        cherches un petit coup de cœur, un cadeau sympa ou un indispensable du quotidien, tu es au bon endroit.
    </h2>
    <h3>Cherche parmis nos {{ $nbProducts }} produits !</h3>
    @if ($state === 'open')
        <p>Magasin ouvert !</p>
    @else
        <p>Magasin fermer.</p>
    @endif

</body>
</html>
