<?php 
    $conn = pg_connect("postgres://oywrudztdbmebr:6282c1bfa9623322e43ea586597efbfbe6d9b80dd8ea31dee7d766a4eec36587@ec2-34-193-113-223.compute-1.amazonaws.com:5432/d74ilv63n2givj
    ")
            or die("Can not connect database".pg_connect_errormessage());
?>