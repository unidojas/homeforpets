<?php 
    include "functions.php";
    if (checkUserAccessCookie() == false)
    {
        echo "Sorry, you are not logged in yet. ";
        echo "Click <a href=\"login_teacher.php\">here</a> to access the login page.<br/>";

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
        <p> Congratulations, <?php echo $username ?>, you are logged in and have
            access to this page. </p>
        <a href="login.php">Login</a> |
        <a href="register_teacher.php">Register</a> |
        <a href="showCourses_teacher.php">Show Courses</a> |
        <a href="teacher_profile.php">Show Profile</a> |
        <a href="logout.php">Logout</a>

    </div>
</body>
</html>
