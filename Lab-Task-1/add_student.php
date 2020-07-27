<?php 
require_once(__DIR__ . "/class/Student.class.php");
require_once(__DIR__ . "/db_connection.php");

if(!empty($_POST['firstname']) && !empty($_POST['lastname'])) {
    $fname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);

    $student = new Student($conn);
    if($student->add($fname, $lname)) {
        echo "Student record added!";
        echo "<br>";
    }
    else {
        echo "Coudn't add the student! Try agian.";
        echo "<br>";
    }
}
elseif((empty($_POST['firstname']) || empty($_POST['lastname'])) && isset($_POST['submit'])) {
    echo "Fill up required fields!";
    echo "<br>";
}

?>

<form action="add_student.php" method="POST" name="student_add_form">
    <input name="firstname" type="text" placeholder="First Name"><br>
    <input name="lastname" type="test" placeholder="Last Name"><br>
    <button name="submit" type="submit" value="Submit">Submit</button><br>
</form>