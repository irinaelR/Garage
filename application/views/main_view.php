<!DOCTYPE html>
<html>
<head>
    <title>Export PDF</title>
    <style>
        /* Incluez vos styles CSS ici */
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div id="content">
        <h1>Exemple de page</h1>
        <p>Ceci est un exemple de page avec du contenu et des styles.</p>
    </div>
    <form action="<?php echo site_url('PdfGenerator/generate_pdf'); ?>" method="post">
        <button type="submit">Exporter en PDF</button>
    </form>
</body>
</html>
