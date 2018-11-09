<?php
//Include Meta
require ('resources/includes/head.php');

//Include Header
require ('resources/views/header.php');

navigation($header);

//Content
echo '<div class="content">';
echo '<h2>Alla blogginlägg</h2>';
echo $error;

foreach ($model as $key => $value){
?>

<div class="post">
    <h3><?php echo $value['title']; ?>  </h3>
    <p class="author">Författare: <?php echo $value['author']; ?></p>
    <p class="date">Datum:  <?php echo $value['date']; ?> </p>
    <p class="message">Här kommer själva inlägget men inte i sin helhet... <!-- Inläggets 50 första tecken --> <a href="index.php?page=blogg&post=<?php echo $value['slug']; ?>">Läs mer</a></p>
</div>

<?php
}
echo '</div>';

//Inlcude Footer
require ('resources/views/footer.php');
?>
