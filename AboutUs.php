<?php
//List with the accepted users
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
    } elseif (isset($_POST["toProducts"]) || isset($_POST["buy"])) {
        header("Location: Products.php");
    } elseif (isset($_POST["toAboutUs"])) {
        header("Location: AboutUs.php");
    } elseif (isset($_POST["toFeedback"])) {
        header("Location: Feedback.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us page</title>
    <link rel="stylesheet" href="./styles/aboutUsStyle.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="./assets/img/logoPhp.png" alt="Web page logo">
            <h1>About us</h1>
        </div>

        <div class="navProfile">
            <div class="optionContainer">
                <h3><?php echo $_SESSION["user"] ?></h3>
                <img src="./assets/icons/user.png" alt="User icon">
            </div>

            <form class="optionContainer" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <button name="close" id="bCloSess">Close Session</button>
                <button name="home" id="bHome">Home</button>
            </form>
        </div>
    </header>

    <div class="nav">
        <?php
        include("./assets/reusable/navigationBar.php");
        ?>
    </div>
    <div class="content">
        <div class="info">
            <h2>Information about us</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus magni cum reprehenderit optio. Numquam eum commodi velit voluptatum nemo quos nostrum dolor cumque asperiores beatae? Quos impedit exercitationem aut aliquid.</p>
        </div>
        <div class="faq">
            <h2>Frequent asked questions</h2>
            <ul>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores unde doloremque atque soluta nihil iusto sequi voluptatum fugiat corrupti ipsam, id nam alias, eos velit odit sit. Consequuntur, qui a.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores unde doloremque atque soluta nihil iusto sequi voluptatum fugiat corrupti ipsam, id nam alias, eos velit odit sit. Consequuntur, qui a.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores unde doloremque atque soluta nihil iusto sequi voluptatum fugiat corrupti ipsam, id nam alias, eos velit odit sit. Consequuntur, qui a.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores unde doloremque atque soluta nihil iusto sequi voluptatum fugiat corrupti ipsam, id nam alias, eos velit odit sit. Consequuntur, qui a.</li>
            </ul>
        </div>
    </div>




    <footer>
        <?php
        include("./assets/reusable/footer.php");
        ?>
    </footer>



</body>

</html>