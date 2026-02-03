<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
</head>
<body>
    @forelse($products as $product)
        <p>{{ $loop->index + 1 }}. {{ $product['name'] }} - {{ $product['price'] }}</p>
    @empty
        <p>Aucun produit trouvé.</p>
    @endforelse
</body>
</html>
