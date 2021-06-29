<?php

/* 
 *  @name   isUserRegistered()
 *  @desc   Checks if a user is registered
 *  @params $user - The username to be checked in the database
 *  @return TRUE if the user is registered in the database;
 *          otherwise, FALSE
 */
function db_addStudent($conn, $params)
    {   
        $query_str =
        "INSERT INTO students (id_num, last_name, first_name, phone_num, password) VALUES " .
        "('$params[0]', '$params[1]', '$params[2]', '$params[3]', '$params[4]');";
        
        $result = mysqli_query($conn, $query_str);
        if ($result == TRUE)
        {
            echo "You are now registered! Click <a href=\"login_student.php\">here</a> to proceed to log-in.<br/>";
        }
        if ($result == FALSE)
        {
            echo "You are not part of the Official List of Students. Please contact the Registrar for more information";
        }
        return;
    }

function db_addTeacher($conn, $params)
    {   
        $query_str =
        "INSERT INTO students (ID_num, last_name, first_name, email, password) VALUES " .
        "('$params[0]', '$params[1]', '$params[2]', '$params[3]', '$params[4]');";
        
        $result = mysqli_query($conn, $query_str);
        if ($result == TRUE)
        {
            echo "You are now registered! Click <a href=\"login_teacher.php\">here</a> to proceed to log-in.<br/>";
        }
        if ($result == FALSE)
        {
            echo "You are not part of the Official List of Teachers. Please contact your Department for this.";
        }
        return;
    }

function isStudentRegistered($student)
{
    $conn = db_connect();

    $columns    = "*";
    $table      = "ol_students";
    $conditions = "WHERE student_ID = '$student'";
    $selectStr = "SELECT $columns FROM $table $conditions";
    
    $result = mysqli_query($conn, $selectStr);
    if ($result == FALSE)
    {
        echo "Error: " . mysqli_error($conn);
        return false;
    }
    $row = mysqli_fetch_row($result);
    if ($row == NULL)
    {
        return false;
    }
    db_disconnect($conn);
    return true;
}

function isTeacherRegistered($teacher)
{
    $conn = db_connect();

    $columns    = "*";
    $table      = "ol_teachers";
    $conditions = "WHERE teacher_ID = '$teacher'";
    $selectStr = "SELECT $columns FROM $table $conditions";
    
    $result = mysqli_query($conn, $selectStr);
    if ($result == FALSE)
    {
        echo "Error: " . mysqli_error($conn);
        return false;
    }
    $row = mysqli_fetch_row($result);
    if ($row == NULL)
    {
        return false;
    }
    db_disconnect($conn);
    return true;
}

function checkStudentPassword($student, $inputPassword)
{
    $conn = db_connect();

    $columns   = "password";
    $table     = "students";
    $conditions = "WHERE id_num = '$student'";
    $selectStr = "SELECT $columns FROM $table $conditions";
    $result = mysqli_query($conn, $selectStr);
    if ($result == FALSE)
    {
        echo "Error: " . mysqli_error($conn);
        return false;
    }
    $row = mysqli_fetch_row($result);
    if ($row == NULL)
    {
        return false;
    }

    $dbPassword = $row[0];
    if ($inputPassword == $dbPassword)
    {
        return true;
    }
    db_disconnect($conn);
    return false;
}

function checkTeacherPassword($teacher, $inputPassword)
{
    $conn = db_connect();

    $columns   = "password";
    $table     = "teachers";
    $conditions = "WHERE ID_num = '$teacher'";
    $selectStr = "SELECT $columns FROM $table $conditions";
    $result = mysqli_query($conn, $selectStr);
    if ($result == FALSE)
    {
        echo "Error: " . mysqli_error($conn);
        return false;
    }
    $row = mysqli_fetch_row($result);
    if ($row == NULL)
    {
        return false;
    }

    $dbPassword = $row[0];
    if ($inputPassword == $dbPassword)
    {
        return true;
    }
    db_disconnect($conn);
    return false;
}

function getIdFromUsername($conn, $username)
{
    $query = "SELECT id_num FROM students WHERE id_num LIKE '$username'";
    $result = mysqli_query($conn, $query);
    if ($result == FALSE)
    {
        echo "User not found: $username";
        echo "<br>";
        return NULL;
    }

    /* Check how many rows we have in the result --
       accept only 1 result */
    if (mysqli_num_rows($result) > 1)
    {
        echo "More than one result";
        echo "<br>";
        return NULL;
    }

    $row = mysqli_fetch_row($result);
    return $row[0];
}

function getUsernameFromId($conn, $userId)
{
    $query = "SELECT username FROM t_users WHERE id = '$userId'";
    $result = mysqli_query($conn, $query);
    if ($result == FALSE)
    {
        echo "User ID not found: $userId";
        echo "<br>";
        return NULL;
    }

    /* Check how many rows we have in the result --
       accept only 1 result */
    if (mysqli_num_rows($result) > 1)
    {
        echo "More than one result";
        echo "<br>";
        return NULL;
    }

    $row = mysqli_fetch_row($result);
    return $row[0];
}

function student_profile($conn, $username)
    {
        $select_str= "SELECT * from students WHERE id_num = '$username';";
        $result = mysqli_query($conn, $select_str);
        
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID Number</th>";
    echo "<th>Last Name</th>";
    echo "<th>First Name </th>";
    echo "<th>Phone Number</th>";;
    echo "<th>Password </th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    $actionStr = $_SERVER['PHP_SELF'];                          // TODO
    
    while ( $row = mysqli_fetch_row($result) )
    {
        echo "<tr>";
        for ($i = 0; $i < count($row); $i++)
        {
            echo "<td>" . $row[$i] . "</td>";
        }

    }
    echo "</tbody>";
    echo "</table>";
        
    }

?>
