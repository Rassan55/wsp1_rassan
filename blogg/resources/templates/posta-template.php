
<?php
// Include Meta
require ('resources/includes/head.php');

// Include Header
require ('resources/views/header.php');

navigation($header);

require './resources/includes/db_conn.php';
//SQL-fråga

// Hämtar users från databasen
$sql = 'SELECT Username FROM users';

// gör en array för users
$users = array();
foreach($pdo->query($sql) as $row) {
// lägger till $row på array
    array_push($users, $row['Username']);
}


// Formulär för att göra inlägg. I formuläret är det användare, titel och text.
echo <<<POST
    <div class="content">
        <h2>Posta inlägg</h2>
        <form method="POST">
            <label for="username">Användare</label>
            <select id="username" name="username">
POST;
            foreach ($users as $user){
                echo "<option value='{$user}'>{$user}</option>";
            }
            echo <<<POST
            </select>
            <label for="headline">Titel</label>
            <input type="text" id="headline" name="headline" placeholder="Vad är inläggets rubrik...">

            <label for="message">Inlägg</label>
            <textarea id="message" name="message" placeholder="Författa ditt inlägg" style="height:170px; max-width:100%; min-width:100%;"></textarea>
            <input type="submit" value="Submit"
            name="submit">
        </form>
    </div>
POST;
// Om post är satt med värdet submit. Då ska den göra variblerna nedan med de satta värdena.
if (isset($_POST['submit'])) {
    // Kräver funktionen.
    require './resources/includes/slugify.php';
    $headline = $_POST['headline'];
    $username = $_POST['username'];
    $text = $_POST['message'];
    $slug = slugify($headline);

// Skapar variabeln $sql. Den hämtar ID från users där Username är lika med $username.
    $sql = "SELECT ID FROM users WHERE Username = '{$username}'";

// För varje resultat ifrån databasen skriver den det som en rad.
    foreach($pdo->query($sql) as $row) {
        $userid = $row['ID'];
    }

// $sql variabeln får ett nytt värde. Den sätter varibler på värden i databasen.
    $sql = "INSERT INTO posts (User_ID, Slug, Headline, Text) VALUES ({$userid}, '{$slug}', '{$headline}', '{$text}')";

// Om det funkar så skrivs det bra annars fel. 
    if($pdo->query($sql)) {
        echo "<br> Bra!";
    }
    else {
        echo "<br> Fel!";
    }
}

// Inlcude Footer
require ('resources/views/footer.php');
?>
