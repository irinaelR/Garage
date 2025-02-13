<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Devis</title>
    <link rel="stylesheet" href="<?php echo(base_url("assets/css/style.css")) ?>">
    <link rel="stylesheet" href="<?php echo(base_url("assets/css/custom.css")) ?>">
    <style>
      body {
        background: url('<?php echo(base_url("assets/img/bg/pattern-randomized-dark.png")) ?>');
        min-height: 100vh;
      }
    </style>
</head>
<body>
    <div>
        <div class="info">
            <div class="logo">G</div>
            <div class="slogan">Garage auto</div>
        </div>
        <div class="left">
            <div class="header2"><h1>Devis</h1></div>
            <div class="info2">
                <p><b>Date </b><?php echo $devis['dateDevis']?></p>
                <p><b>N° Facture </b><?php echo $devis['idDevis']?></p>
                <p style="margin-top:40px;"><b><?php echo $devis['numVoiture']?></b></p>
            </div>
        </div>
    </div>
    <div id="content">

        <table border="1">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Duree</th>
                    <th>Slot</th>
                    <th>Prix (Ar)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $devis['nomService']?></td>
                    <td><?php echo $devis['dureeService']?></td>
                    <td><?php echo $devis['slot']?></td>
                    <td style="text-align:right;"><?php echo $devis['prixService']?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <center><p><b>Total: <?php echo $devis['prixService']?> Ar</b></p></center>
</body>
</html>

<style>
    body {
        font-family: Arial, sans-serif;
    }
    p {
        font-size: 14px;
    }
    th,td{
        padding:10px;
    }
    table{
        border-collapse:collapse;
        width:80vw;
    }
    .logo{
        font-size:100px;
    }
    .info{
        justify-content:center;
        text-align:center;
        margin-top:100px;
        float:left;
    }
    .left{
        text-align:right;
        /* border:solid black 1px; */
        width:25vw;
        margin-left:60vw;
    }
    .header2{
        color:#D3D3D3;
        font-size:30px;
    }
    .info2{
        color:#333;
    }
    th{
        background-color:#D3D3D3;
        color:#333;
    }
</style>