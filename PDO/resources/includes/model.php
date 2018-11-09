<?php
// variabler för anslutning till databasen.
$host = 'Localhost';
$dbname = 'blogg';
$user = 'Admin';
$password = 'qJcCBGOQ5erl8p4Y';

// Deklarerar vår variabel $sql för att undvika errors i ett senare skede.
$sql = '';

// variabel för sortering av data som hämtas från databasen.
$attr = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

// Variabel för att ange vart vi ansluter och hur teckenkodningen skall se ut.
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

// Skapar ett ny PDO-objekt som används när vi arbetar mot databasen.
$pdo = new PDO($dsn, $user, $password, $attr);

// Skapar SQL-fråga för databasen
// Kopplar ihop table posts och users med att de har ID i båda tabellerna. Vilket gör att användar namnen syns De sista sakerna gör så att databsen hämtar de senaste inläggen.
$sql = 'SELECT * FROM posts JOIN users ON posts.User_ID = users.ID ORDER BY Creation_time DESC';

if($pdo) {

    $model = array();
    // För varje $pdo som är query select allt från post, som $row
    foreach($pdo->query($sql) as $row) {
        $model += array(
            $row['ID'] => array(
                'slug' => $row['Slug'],
                'title' => $row['Headline'],
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
