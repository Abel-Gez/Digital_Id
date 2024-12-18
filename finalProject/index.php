<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylePage.css">
</head>

<body>
    <header>
        <div class="logo-div">
            <img src="logo.png" class="logo">
        </div>

        <di class="header-text">
            <p class="title">DIGITAL ID MANAGEMENT SYSTEM</p>
        </di>
    </header>

    <div class="main">
        <div class="form_container">
            <form method="post">

                <h1 class="txt2" id="header">Login Form</h1>
                <div class="input-group">
                    <label for="username">Username: </label>
                    <input type="text" class="username" name="username" maxlength="16" required>
                    <br><br>
                    <label for="password">Password: </label>
                    <input type="password" class="password" name="password" maxlength="12" required>

                    <p class="error" id="error"></p>
                </div>

                <div class="btn-container">
                    <button class="btn" name="login">Login</button>
                    <button class="btn" name="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // var nameInput = document.querySelector('.username');
        // var UserName = nameInput.value;

        // var pwdInput = document.querySelector('.password');
        // var Password = pwdInput.value;

        // if (UserName == "admin" && Password == "Admin") {
        <?php
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (strcmp($username, "admin") == 0) {
                if (strcmp($password, "Admin") == 0) {
                    header('Location: scanner.php');
                    exit();
                } else {
                    $errorText = "Invalid username or password";
                    echo "<p id=\"error\">$errorText</p>";
                }
            } elseif (strcmp($username, "security") == 0) {
                if (strcmp($password, "Security") == 0) {
                    header('Location: generator.php');
                    exit();
                }
            }
        } elseif (isset($_POST['reset'])) {
            $_POST['username'] = "";
            $_POST['passeord'] = "";
        }
        ?>
        // }
        // if (UserName != "admin" || Password != "Admin") {
        //     document.querySelector('.error')
        //         .innerHTML = "Invalid username or password";
        // }
    </script>



</body>

<footer>
    <p>COPYRIGHT 2024. @AB&sup2; web solution. All Rights Reserved.</p>
</footer>

</html>