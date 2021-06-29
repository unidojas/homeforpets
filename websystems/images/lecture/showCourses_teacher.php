<?php 
    include "functions.php";
    if (checkUserAccessCookie() == false)
    {
        echo "Sorry, you are not logged in yet. ";
        echo "Click <a href=\"login.php\">here</a> to access the login page.<br/>";
        exit;
    }

    $username = getDefaultUserFromCookie();
?>
<?php 
    include "functionsCourses.php";
    include "functionsUser.php"; 
?>
<html>
<head>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
</head>
<body>
    <div class="container">
        <section clss="header">
            <h2 class="title">Available Courses</h2>
        </section>

<?php

    $conn = db_connect();
    displayTeacherCourses($conn, $username);
    db_disconnect($conn);
?>


        <a href="login_teacher.php">Login</a> |
        <a href="index_teacher.php">Home</a> |
        <a href="teacher_profile.php">Profile</a> |
        <a href="logout.php">Logout</a>

    </div>
</body>
</html>

