<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cars</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php
    include './carzone.php';
    navbar();
    echo '<div class="container"><h1 class="text-center">My Cars</h1></div>';
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        if (isset($_POST["action"]) && !empty($_POST["action"])) {
            if ($_POST["action"]=="+") {
                addCarToUser($_POST["id"]);
            }else{
                deleteCarFromUser($_POST["id"]);
            }
                header("Location: ".$_SERVER["HTTP_REFERER"]);
        }
    } else {
        getCarByUser();
    }
    ?>
</body>

</html>
