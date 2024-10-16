<?php
include("./assets/dataFolder/data.php");

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: Login.php?redirected=true");
}


function checkUser($name, $pass, $list)
{
    foreach ($list as $user => $data) {
        if ($name == $data["name"] && $pass == $data["password"]) {
            $user = $name;
            return $user;
        }
    }
    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["close"])) {
        session_unset();
        header("Location: Login.php?redirected=true");
    } elseif (isset($_POST["home"])) {
        header("Location: Home.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products page</title>
    <link rel="stylesheet" href="./styles/productStyle.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="./assets/img/logoPhp.png" alt="Web page logo">
            <h1>Products</h1>
        </div>
        <div class="navProfile">
            <div class="optionContainer">
                <h3><?php echo $_SESSION["user"] ?></h3>
                <img src="./assets/icons/user.png" alt="User icon">
            </div>
            <div class="optionContainer">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <button name="close" id="bCloSess">Close Session</button>
                    <button name="home" id="bHome">Home</button>
                </form>

            </div>
        </div>
    </header>

    <div class="nav">
        <?php
        include("./assets/reusable/navigationBar.php");
        ?>
    </div>




    <footer>
        <?php
        include("./assets/reusable/footer.php");
        ?>
    </footer>



</body>

</html>