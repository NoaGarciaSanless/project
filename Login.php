<?php

include("./assets/dataFolder/data.php");

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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

    if (empty($_POST["name"])  || empty($_POST["password"])) {
        $errInputs = true;

        if (empty($_POST["name"])) {
            $errName = true;
        } else {
            setcookie("userName", $_POST["name"], time() + 3600);
        }
        if (empty($_POST["password"])) {
            $errPass = true;
        }
    } else {
        $userName = test_input($_POST["name"]);
        $userPass = test_input($_POST["password"]);

        //Checks if the user is valid
        $user = checkUser($userName, $userPass, $user_list);

        if ($user == false) {
            $err = true;
            $user = "none";
        } else {
            session_start();
            $_SESSION['user'] = $user;
            header("Location: Home.php");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="./styles/loginStyle.css">
</head>

<body>
    <header>
        <h1>Login</h1>
    </header>

    <?php
    if (isset($err) && $err == true) {
        echo '<p class="err"> The user or the password are wrong, please introduce a valid login to continue</p>';
    }

    if (isset($errInputs) && $errInputs == true) {
        echo '<p class="err"> You need to specify a user and a password to login</p>';
    }


    if (isset($_GET["redirected"]) && $_GET["redirected"] == true) {
        echo '<p> You have logged out!</p>';
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="field">
            User name:
            <input type="text" name="name" value="<?php echo isset($_COOKIE["userName"]) ? htmlspecialchars($_COOKIE["userName"]) : ''; ?>">

            <?php if (isset($errName) && $errName == true): ?>
                <p class="err">*</p><br>
            <?php endif ?>

        </div>

        <div class="field">
            Password:
            <input type="password" name="password">
            <?php if (isset($errPass) && $errPass == true): ?>
                <p class="err">*</p><br>
            <?php endif ?>
        </div>
        <br>

        <input type="submit" name="confirm" id="bLogin" value="Login">
    </form>


    <footer>
        <p>Login page</p>
    </footer>



</body>

</html>