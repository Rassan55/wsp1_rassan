<?php
include './resources/includes/db_conn.php';

// Skapar SQL-fråga för databasen
// Kopplar ihop table posts och users med att de har ID i båda tabellerna. Vilket gör att användar namnen syns De sista sakerna gör så att databsen hämtar de senaste inläggen.

if($pdo) {

// Hämtar data från databasen. Hämtar från post och users.
    $sql = 'SELECT p.ID, Slug, Headline, Username, Creation_time, Text, Likes FROM posts AS p JOIN users AS u ON p.User_ID = u.ID';

// Om knappen har ett värde så har $text och $order ett värde. $order är hur man sorterar inläggen. Medans $text är sökrutan.
    if(isset($_POST['search'])) {
        $text = $_POST['text'];
        $order =  $_POST['orderby'];

        // Kollar om $text är tom.
        if (!empty($text)) {
            // Om Text har variabeln  $text i sig någonstans. Kollar om det man skriver i sökrutan finns i databasen.
            $sql .= ' WHERE Text  LIKE "%' . $text . '%"';
        }

// sortera knappen
        $sql .= ' ORDER BY Creation_time ' . $order;
    }

// annars är det fallande som är default.
    else {
        $sql .= ' ORDER BY Creation_time DESC';
    }


    $model = array();
    // För varje $pdo som är query select allt från post, som $row
    foreach($pdo->query($sql) as $row) {
        $model += array(
            $row['Slug'] => array(
                'pID' =>$row['ID'],
                'title' => $row['Headline'],
                'author' => $row['Username'],
                'date' => $row['Creation_time'],
                'text' => $row['Text'],
                'likes' => $row['Likes']
            )
            // row ID = array som har  nyklar med värden.
        );
    }
}
else {
print_r($pdo->errorInfo());
}

?>
