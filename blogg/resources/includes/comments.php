<?php
include './resources/includes/db_conn.php';

// Skapar SQL-fråga för databasen
// Kopplar ihop table posts och users med att de har ID i båda tabellerna. Vilket gör att användar namnen syns De sista sakerna gör så att databsen hämtar de senaste inläggen.


if($pdo) {


    $sql = "SELECT c.ID, Username, Creation_time, Text, Likes FROM comments AS c JOIN users AS u ON c.User_ID = u.ID WHERE c.Post_ID = {$postid} ORDER BY Creation_time DESC";

    $comments = array();
    // För varje $pdo som är query select allt från post, som $row
    foreach($pdo->query($sql) as $row) {
        $comments += array(
            $row['ID'] => array(
                'author' => $row['Username'],
                'date' => $row['Creation_time'],
                'text' => $row['Text'],
                'likes' => $row['Likes']
            )
            // row ID = array som har  nyklar med värden.
        );
    }
} else {
print_r($pdo->errorInfo());
}

?>
