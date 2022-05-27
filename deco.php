
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        @import URL(css/style.css);
    </style>
    <title>DECO</title>
</head>
<body>
    <?php
session_start();

echo "<h2>Fermeture de la Session...</h2>";

session_unset();

session_destroy();


header('refresh:1;url=Accueil.php');

?>
</body>
</html>