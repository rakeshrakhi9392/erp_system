<?php
// Start the session
session_start();

// Include the database connection file
include 'db_connect.php'; // Ensure this file contains the code to connect to your database

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $enrollment_number = $_POST['enrollment_number'];
    $password = $_POST['password'];

    // Query the database for the student's information
    $stmt = $conn->prepare('SELECT * FROM students WHERE enrollment_number = ?');
    $stmt->bind_param('s', $enrollment_number);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a student with the given enrollment number exists
    if ($result->num_rows == 1) {
        // Fetch the student data
        $student = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $student['password'])) {
            // Password is correct, set session variables and redirect to the dashboard
            $_SESSION['student_id'] = $student['id'];
            $_SESSION['enrollment_number'] = $student['enrollment_number'];
            header('Location: index.html');
            exit();
        } else {
            // Incorrect password
            echo "Invalid credentials. Please try again.";
        }
    } else {
        // No student found with the given enrollment number
        echo "Invalid credentials. Please try again.";
    }
}
?>
