<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/prodCardStyle.css">
</head>

<body>
    <div class="container">
        <div class="cardHeader">
            <img src="./assets/img/placeholder.png" alt="Product image">
            <div class="namePrice">
                <h2>Product name</h2>
                <h4>9999.99€</h4>
            </div>
        </div>
        <p id="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam sed, sapiente quibusdam recusandae excepturi, ipsa autem cum ea dolore totam aliquid laboriosam temporibus necessitatibus quos libero culpa, natus dignissimos ipsam.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <button name="buy" id="bToProduct">Buy</button>
        </form>

    </div>

</body>

</html>