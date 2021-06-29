<?php
    include "functions.php";
    if (checkUserAccessCookie() == true)
    {
        $defaultUser = getDefaultUserFromCookie();

        echo "You are already logged in as $defaultUser.<br/>";
        echo "Click <a href=\"index.php\">here</a> to go back to the main site.<br/>";
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
            <h2 class="title">Teacher Registration</h2>
        </section>

        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
            ID Number <input type="text" name="idnumber"><br/>
            Last Name <input type="text" name="lastname"><br/>
            First Name <input type="text" name="firstname"><br/>
            Email Address <input type="text" name="emailadd"><br/>
            Password <input type="text" name="password"><br/>
            <input type="submit" name="regSubmit" value="Register"/>
        </form>
<?php
    if (isset($_POST["idnumber"]))
    {
        $params = array ();
        $params[]= $_POST["idnumber"];
        $params[]= $_POST["lastname"];
        $params[]= $_POST["firstname"];
        $params[]= $_POST["emailadd"];
        $params[]= $_POST["password"];
        
        $conn = db_connect();
        db_addTeacher($conn, $params);
        db_disconnect($conn);
    }
?>
</div>
</body>
</html>
