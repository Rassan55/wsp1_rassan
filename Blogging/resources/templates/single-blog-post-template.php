<?php
//Include Meta
require ('resources/includes/head.php');

//Include Header
require ('resources/views/header.php');

navigation($header);

//Content
echo '<div class="content">';
echo '<h2>' . $title . $error . '</h2>';
echo '<p class="author">' . $author . '</p>';
echo '<p class="date">' . $date . '</p>';
echo '<p class="message">' . $message . '</p>';
echo '</div>';

//Inlcude Footer
require ('resources/views/footer.php');


?>
