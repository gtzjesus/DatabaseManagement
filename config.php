<?php
/**
 * CS 4342 Database Management
 * @author Jesus Gutierrez
 * @since 2/12/20
 * @version 1.0
 * Description: The purpose of this file is to serve as the configuration settings for the database connection. Here we configure the host, db, username, and password and initiate the connection.
 */

$host = "ilinkserver.cs.utep.edu";
$db = 's20pm_team2';   # enter your team database here.

$username = "jgutierrez32";  # enter your username here.
$password = "Marzeyda!7231";  # enter your password here.

/**
 * Making the connection to the database.
 * Parameters - host, username, password, team database.
 */
$conn = new mysqli($host, $username, $password, $db);

/**
 * Validating the connection to server.
 */
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>