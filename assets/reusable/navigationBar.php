<?php
//TODO: button functionality
echo '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/navStyle.css">

<body>

    <form class="navigationBar" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <button class="bNav" id="toProducts" name="toProducts">
            <img src="./assets/icons/product.png" alt="Product icon">
            Products
        </button>
        <button class="bNav" id="toAboutUs" name="toAboutUs">
            <img src="./assets/icons/aboutus.png" alt="About us icon">
            About us
        </button>
        <button class="bNav" id="toFeedback" name="toFeedback">
            <img src="./assets/icons/feedback.png" alt="Product icon">
            Feedback
        </button>
    </form>


</body>

</html>