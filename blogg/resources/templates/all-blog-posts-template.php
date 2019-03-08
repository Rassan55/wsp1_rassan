<?php
//Include Meta
require ('resources/includes/head.php');

//Include Header
require ('resources/views/header.php');

navigation($header);

//Content
echo '<div class="content">';
echo '<h2>Alla blogginlägg</h2>';
?>

<form method="post">
    <input type="text" name="text" placeholder="search"><br>

    <input type="radio" name="orderby" value="DESC" checked="checked">fallande<br>

    <input type="radio" name="orderby" value="ASC">stigande<br>

    <input type="submit" name="search" value="search"><br>

</form>
<?php
echo $error;



foreach ($model as $key => $value){
    $text = $value["text"];
    $text = explode(' ', $text);
    $text = array_slice($text, 0,10);
    $text = implode(' ', $text);
?>
<!-- Skriver ut våra inlägg som visar varje inlägg. -->
<div class="post">
    <h3><?php echo $value['title']; ?>  </h3>
    <p class="author">Författare: <?php echo $value['author']; ?></p>
    <p class="date">Datum:  <?php echo $value['date']; ?> </p>
    <p class="message"><?php echo $text?> <!-- Inläggets 10 första ord --> ... <a href="index.php?page=blogg&post=<?php echo $key; ?>">Läs mer</a></p>
</div>

<?php
}
echo '</div>';

//Inlcude Footer
require ('resources/views/footer.php');


?>
