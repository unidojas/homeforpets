<?php
    include "functions.php";
    if (checkUserAccessCookie() == true)
    {
        $defaultUser = getDefaultUserFromCookie();

        echo "You are already logged in as $defaultUser.<br/>";
        echo "Click <a href=\"index_student.php\">here</a> to go back to the main site.<br/>";
        echo "Click <a href=\"logout.php\">here</a> to logout.<br/>";

        /* The 'exit' command will prevent the rest of the page from loading
         *  once called */
        exit;
    }
?>
<?php include "functionsUser.php"; ?>
<html>
<head>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
</head>
<body>
    <div class="container">
        <section clss="header">
            <h2 class="title">Login.</h2>
        </section>

        <?php $defaultUser = getDefaultUser(); ?>

        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
            ID Number: <input type="text" name="username" value="<?php echo $defaultUser; ?>"><br/>
            Password <input type="text" name="password"><br/>
            <input type="submit" name="loginSubmit" value="Login"/>
        </form>
<?php
    if (isSubmitButtonClicked())
    {
        $student = $_POST["username"];
        $password = $_POST["password"];

        processPostParams($student, $password);
    }
?>

<?php
    function processPostParams($student, $password)
    {
        if (isStudentRegistered($student) == false)
        {
            echo "Are you a new user, $student?<br/>";
            echo "Register <a href=\"register_student.php\">here</a>!<br/>";
            return;
        }
        if (checkStudentPassword($student, $password) == false)
        {
            echo "Incorrect Password";

            return;
        }
        echo "Welcome back, $student! ";
        echo "Click <a href=\"index_student.php\">here</a> to access the main site.<br/>";
        setcookie("userLogin", $student, time() + (60 * 60));
        setcookie("userAccess", $student,time() + (60 * 60)); 
        return;
    }

    function getDefaultUser()
    {
        if (isSubmitButtonClicked() == false)
        {
            return getDefaultUserFromCookie();
        }
        if (isset($_POST["username"]))
        {
            return $_POST["username"];
        }

        return "";
    }

    function isSubmitButtonClicked()
    {
        return (isset($_POST["loginSubmit"]));
    }
?>
    </div>
</body>
</html>
