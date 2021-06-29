<?php 
    include "functions.php";
    if (checkUserAccessCookie() == false)
    {
        echo "Sorry, you are not logged in yet. ";
        echo "Click <a href=\"login_student.php\">here</a> to access the login page.<br/>";

        /* The 'exit' command will prevent the rest of the page from loading
         *  once called */
        exit;
    }

    $username = getDefaultUserFromCookie();
    setcookie("userAccess", $username, time() - 3600); /* Setting the expire time to a
                                                        *  negative value (i.e. past)
                                                        *  deletes the cookie */
?>
<html>
<head>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
</head>
<body>
    <div class="container">
        <section clss="header">
            <h2 class="title">Logout.</h2>
        </section>
        <p> Logout successful. Click <a href="login.php">here</a> to return to the login page.</p>
    </div>
</body>
</html>

