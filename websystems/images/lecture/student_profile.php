<?php 
    include "functions.php";
    include "functionsUser.php";
    if (checkUserAccessCookie() == false)
    {
        echo "Sorry, you are not logged in yet. ";
        echo "Click <a href=\"login.php\">here</a> to access the login page.<br/>";

        /* The 'exit' command will prevent the rest of the page from loading
         *  once called */
        exit;
    }

    $username = getDefaultUserFromCookie();
?>
<html>
<head>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
</head>
<body>
    <div class="container">
        <section clss="header">
            <h2 class="title">Home.</h2>
        </section>
<?php 
            $conn = db_connect();
            student_profile($conn, $username);
            db_disconnect($conn);
?>
        <a href="login.php">Login</a> |
        <a href="index_student.php">Home</a> |
        <a href="register.php">Register</a> |
        <a href="showCourses.php">Show Courses</a> |
        <a href="logout.php">Logout</a>

    </div>
</body>
</html>
