<?php
//List with the accepted users
include("./assets/dataFolder/data.php");

// Values for the default form
$proName = "";
$proDesc = "";

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

    if (isset($_POST["bSend"]) && !empty($_POST["problem"])) {
        $sent = true;
    } else {
        $errFB = true;
    }

    if (isset($_POST["bClear"])) {
        $errFB = false;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback page</title>
    <link rel="stylesheet" href="./styles/feedbackStyle.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="./assets/img/logoPhp.png" alt="Web page logo">
            <h1>Feedback</h1>
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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat tenetur id a facere consequatur dolorum ex nam amet nihil, eos sapiente dolores, eius aut, hic numquam laudantium illum velit quaerat.</p>
        </div>
        <form class="fform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

            <div class="inputContainer">
                <span>Problem found: </span>
                <input type="text" name="problem" id="problemInput" value="<?php echo htmlspecialchars($proName); ?>">
            </div>
            <div class="inputContainer">
                <span>Problem <br>description: </span>
                <textarea name="problemDesc" id="proDescInput"><?php echo htmlspecialchars($proDesc); ?></textarea>
            </div>
            <div class="result">
                <?php if (isset($sent) && $sent == true): ?>
                    <span>Thanks for your feedback!</span>
                <?php endif ?>
                <?php if (isset($errFB) && $errFB == true): ?>
                    <span>You need to specify a problem</span>
                <?php endif ?>
                <div class="opt">

                    <input type="submit" name="bClear" id="bClear" value="Clear">
                    <input type="submit" name="bSend" id="bSend" value="Send">
                </div>
            </div>

        </form>
    </div>



    <footer>
        <?php
        include("./assets/reusable/footer.php");
        ?>
    </footer>



</body>

</html>