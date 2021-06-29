<?php

function displayCourses($conn)
{
    $columns        = "I.course_ID, I.course_name, I.course_description, Z.last_name";
    $table          = "courses I";
    $joinTable      = "ol_teachers U";
    $joinTable2     = "teachers Z";
    $joinCondition  = "I.course_ID = U.course_ID AND U.teacher_ID = Z.ID_num";
    $conditions     = "sold='N'"; /* Show only un-sold items (`sold`='N') */

    $query = 
    "SELECT $columns 
       FROM $table
     INNER JOIN $joinTable
     INNER JOIN $joinTable2
         ON $joinCondition";

    $result = mysqli_query($conn, $query);
    if ($result == FALSE)
    {
        echo "Invalid query: " . $conn->error;
        echo "<br/>";
        return;
    }

    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Course ID</th>";
    echo "<th>Course Name</th>";
    echo "<th>Course Description</th>";
    echo "<th>Teacher</th>";
    echo "<th>____</th>";
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

        echo "<td>";                                            // TODO
        echo "<form method=\"POST\" action=\"$actionStr\">";    // TODO
        echo "<input type=\"hidden\" name=\"code\" value=\"$row[0]\">";
        echo "<input type=\"submit\" value=\"Enlist\">";          // TODO
        echo "</form>";                                         // TODO
        echo "</td>";                                           // TODO
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}

function displayTeacherCourses($conn, $username)
{
    $columns        = "I.course_ID, I.course_name, I.course_description, Z.last_name";
    $table          = "courses I";
    $joinTable      = "ol_teachers U";
    $joinTable2     = "teachers Z";
    $joinCondition  = "I.course_ID = U.course_ID AND U.teacher_ID = '$username'";

    $query = 
    "SELECT $columns 
       FROM $table
       JOIN $joinTable
       JOIN $joinTable2
       WHERE $joinCondition";

    $result = mysqli_query($conn, $query);
    if ($result == FALSE)
    {
        echo "Invalid query: " . $conn->error;
        echo "<br/>";
        return;
    }

    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Course ID</th>";
    echo "<th>Course Name</th>";
    echo "<th>Course Description</th>";
    echo "<th>Teacher</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
}

function getCourseTeacher($conn, $code)
{
    $query = "SELECT teacher_ID FROM ol_teachers WHERE course_ID='$code'";
    $result = mysqli_query($conn, $query);
    if ($result == FALSE)
    {
        echo "Invalid query: " . $conn->error;
        echo "<br/>";
        return FALSE;
    }

    $row = mysqli_fetch_row($result);

    /* Returns the owner id for the matching item */
    return $row[0];
}

function addEnrollmentRecord($conn, $code, $student) {
    $teacher = getCourseTeacher($conn, $code);  
    if ($teacher == FALSE)
    {
        return;
    }
    $table = "enrollment_transactions";
    $cols  = "course_ID, student_ID, teacher_ID";
    $values = "'$code', '$student', '$teacher'";
    $query  = "INSERT INTO $table ($cols) VALUES ($values)";

    $result = mysqli_query($conn, $query);
    if ($result == FALSE)
    {
        echo "Invalid query: " . $conn->error;
        echo "<br/>";
        return;
    }

    return;
}
?>
