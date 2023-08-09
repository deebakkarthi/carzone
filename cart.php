
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
    if (isset($_SESSION["user"])) {
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            if (isset($_POST["action"]) && !empty($_POST["action"])) {
                if ($_POST["action"] == "+" or $_POST["action"] == "Add to Cart") {
                    addToCart($_POST);
                } elseif ($_POST["action"] == "-") {
                    removeFromCart($_POST);
                }
            }
            header("Location: " . $_POST["back"]);
        } else {
            showCart();
        }
    }else{
        echo <<< EOT
        <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
        Please login
      </div>
      <a class="btn btn-primary" href="./login.php">Login</a>
      </div>
      EOT;
    }
    ?>
</body>

</html>
