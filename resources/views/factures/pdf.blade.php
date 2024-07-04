<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>Date: {{ $date }}</p>
    <p>Nom: {{ $facture->marque }}</p>
    <p>Prénom: {{ $facture->couleur }}</p>
    <p>Annee: {{ $facture->annee }}</p>
    <p>Adresse: {{ $facture->prix }}</p>
    <p>Libellé: {{ $facture->libelle }}</p>

    <p>

        "Bonjour à tous et merci de votre présence aujourd'hui.

        Chez garage XYZ, nous sommes fiers de vous présenter la facture pour {{ $facture->libelle }}. Nous sommes convaincus que vous serez satisfait du travail que nous avons effectué et de la valeur que vous recevez.

        Le coût total de {{ $facture->libelle }} est de {{ $facture->prix }}. Nous comprenons que c'est un investissement important, et nous sommes persuadés que vous serez satisfait de la qualité du travail et de la valeur que vous recevez.

        Nous offrons une garantie de 3 mois sur {{ $facture->libelle }} et nous sommes toujours là pour vous aider après la vente. Merci encore de votre choix et nous espérons vous revoir bientôt."</p>
</body>
</html>
