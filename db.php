<?php
// Opens a connection to a MySQL server.
$connect=mysqli_connect("localhost", 'root', '','library');
if (!$connect)
{
    die('Not connected : ' . mysqli_connect_error());
}

?>