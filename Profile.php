<?php
//List with the accepted users
$user_list = [
    1 => ["name" => "Pepe", "password" => "123passPepe"],
    2 => ["name" => "Maria", "password" => "MariaLoginPass"],
    3 => ["name" => "Marco", "password" => "321Marco"],
    4 => ["name" => "Alba", "password" => "Alba_Pass123"],
    5 => ["name" => "Admin", "password" => "AdminPassABC123."]
];
//Boolean that controls if the edit form is showing
$showForm = false;


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: Login.php?redirected=true");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["close"])) {
        session_unset();
        header("Location: Login.php?redirected=true");
    } elseif (isset($_POST["home"])) {
        header("Location: Home.php");
    } elseif (isset($_POST["edit"])) {
        $showForm = true;
    } elseif (isset($_POST["cancel"])) {
        $showForm = false;
    } elseif (isset($_POST["confirm"])) {
        $_SESSION["user"] = test_input($_POST["name"]);
        $_SESSION["email"] = test_input($_POST["email"]);
        $_SESSION["adress"] = test_input($_POST["adress"]);
        $_SESSION["phone"] = test_input($_POST["phone"]);
        $showForm = false;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="./styles/profileStyle.css">

</head>

<body>
    <header>
        <div class="simpleData">
            <div class="userIcon">
                <img src="./assets/icons/user_64.png" alt="User icon 64px">
                <h3><?php echo $_SESSION["user"] ?></h3>
            </div>

            <h1>Profile</h1>
        </div>

        <div class="navProfile">
            <div class="optionContainer">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <button name="close" id="bCloSess">Close Session</button>
                    <button name="home" id="bHome">Home</button>
                </form>

            </div>
        </div>
    </header>

    <div class="content">
        <div class="nonEditableData">
            <div class="dataField">
                <span class="dataName">User name:</span>
                <span class="data"> <?php echo $_SESSION["user"] ?></span>
            </div>
            <div class="dataField">
                <span class="dataName">Email:</span>
                <span class="data"> <?php echo isset($_SESSION["email"]) &&  $_SESSION["email"] != "" ? $_SESSION["email"] : " Field not set"; ?></span>
            </div>
            <div class="dataField">
                <span class="dataName">Adress:</span>
                <span class="data"> <?php echo isset($_SESSION["adress"]) &&  $_SESSION["adress"] != ""  ? $_SESSION["adress"] : " Field not set"; ?></span>
            </div>
            <div class="dataField">
                <span class="dataName">Phone number:</span>
                <span class="data"> <?php echo isset($_SESSION["phone"]) &&  $_SESSION["phone"] != ""  ? $_SESSION["phone"] : " Field not set"; ?></span>
            </div>
        </div>

        <?php if ($showForm): ?>
            <form class="editForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="dataField">
                    <span class="dataName">User name:</span>
                    <input type="text" name="name" value="<?php echo $_SESSION["user"] ?>">
                </div>
                <div class="dataField">
                    <span class="dataName">Email:</span>
                    <input type="email" name="email" value="<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : " "; ?>">
                </div>
                <div class="dataField">
                    <span class="dataName">Adress:</span>
                    <input type="text" name="adress" value="<?php echo isset($_SESSION["adress"]) ? $_SESSION["adress"] : " "; ?>">
                </div>
                <div class="dataField">
                    <span class="dataName">Phone number:</span>
                    <input type="number" name="phone" value="<?php echo isset($_SESSION["phone"]) ? $_SESSION["phone"] : " "; ?>">
                </div>

                <div class="btnOptions">
                    <button type="submit" name="cancel" id="bCancel">Cancel</button>
                    <button type="submit" name="confirm" id="bConfirm">Confirm</button>
                </div>
            </form>
        <?php endif; ?>

    </div>

    <?php if (!$showForm): ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <button name="edit" id="bEdit">Edit profile</button>
        </form>
    <?php endif; ?>

    <footer>
        <?php
        include("./assets/reusable/footer.php")
        ?>
    </footer>
</body>

</html>