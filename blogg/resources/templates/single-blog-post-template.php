<?php
//Include Meta
require ('resources/includes/head.php');

//Include Header
require ('resources/views/header.php');

require ('./resources/includes/comments.php');

navigation($header);

//Content
//Skriver ut och concatenation variablerna
echo '<div class="content">';
echo '<h2>' . $title . $error . '</h2>';
echo '<p class="author">' . $author . '</p>';
echo '<p class="date">' . $date . '</p>';
echo '<p class="message">' . $message . '</p>';
echo '<h3> Kommentarer! </h3>';

//En loop för kommentarer.

foreach ($comments as $key => $value){
    //if ($postid == $value['post']) {
?>
        <div class="post">
            <p class="author">Författare: <?php echo $value['author']; ?></p>
            <p class="date">Datum:  <?php echo $value['date']; ?> </p>
            <p class="message"> <?php echo $value['text']; ?> </p>
            <p class="likes">Likes:  <?php echo $value['likes']; ?> </p>

        </div>
        <!-- <$post = $model[$key]['Post_ID'];
        // $author = $model[$key]['Username'];
        // $date = $model[$key] ['Creation_time'];
        // $text =  $model[$key] ['Text'];
        // $likes =  $model[$key] ['Likes'];


<?php
    //}

}

echo '</div>';

//Inlcude Footer
require ('resources/views/footer.php');
?>
