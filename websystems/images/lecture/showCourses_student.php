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
    if (isset($_POST['code']))
    {
        $code = $_POST['code'];

        $conn = db_connect();
        $student = getIdFromUsername($conn, $username);
        addEnrollmentRecord($conn, $code, $student);
        db_disconnect($conn);
    }

    $conn = db_connect();
    displayCourses($conn);
    db_disconnect($conn);
?>


        <a href="login_student.php">Login</a> |
        <a href="index_student.php">Home</a> |
        <a href="student_profile.php">Profile</a> |
        <a href="logout.php">Logout</a>

    </div>
</body>
</html>

