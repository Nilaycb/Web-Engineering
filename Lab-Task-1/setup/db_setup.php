<?php
require_once(__DIR__ . "/db_setup.func.php");

$step = 0;

if (isset($_GET['step'])) {
    $step = $_GET['step'];
}

switch($step) {
    case 1: 
        if(create_db() != null) {
            echo "Database created!";
            echo '<br>';
            echo '<a href="?step=2">Create Table</a>';
        }
        else {
            echo "Database creation failed!";
            echo '<br>';
            echo '<a href="?step=1">Try creating database again!</a>';
            echo '<br>';
            echo '<a href="?step=2">Skip</a>';
        }
        break;

    case 2: 
        if(create_table() != null) {
            echo "Table created!";
            echo '<br>';
            echo '<a href="?step=3">Finish Setup</a>';
        }
        else {
            echo "Table creation failed!";
            echo '<br>';
            echo '<a href="?step=2">Try creating table again!</a>';
            echo '<br>';
            echo '<a href="?step=3">Skip</a>';
        }
        break;

    case 3: 
        echo "Setup complete!";
        echo '<br>';
        echo '<a href="/">GO HOME</a>';
        break;
    
    default:
        echo 'SETUP';
        echo '<br>';
        echo '<a href="?step=1">Create Database</a>';
}