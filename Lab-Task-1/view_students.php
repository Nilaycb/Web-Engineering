<?php 
require_once(__DIR__ . "/class/Student.class.php");
require_once(__DIR__ . "/db_connection.php");

$student = new Student($conn);
$students = $student->view_students(); //LIMIT 0, 10 (default)
echo "Students: <br>";
foreach($students as $key => $val) {
    echo "<br>";
    echo "<b>ID</b>: ".$val->id."    <b>FirstName</b>: ".$val->firstname."    <b>LastName</b>: ".$val->lastname."";
    echo "<br>";
}
