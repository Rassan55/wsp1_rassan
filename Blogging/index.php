<?php
// We tell the page to require a file called functions
require ('resources/includes/view.php');
require ('resources/includes/model.php');

// Set header correct without using HTML
header("Content-type: text/html; charset=utf-8");

// Set variables
$error = '';
$content = '';

// Get value from url for key page
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL);

if(empty($page)) {
	$header = 'Start';
    $content = 'Välkommen till Labb 2! Här övar vi på PHP för att bli duktiga webbserverprogrammerare. Detta är andra labben men första labben i en serie labbar som tillsammans bygger vidare på detta projekt som vi påbörjar här. Ett enkelt PHP-projekt men väl strukturerat och genomtänkt konstruerat.';
    include ('resources/templates/page-template.php');
}

// Om $page har värdet blogg så är $header blogg.
elseif($page == "blogg"){
	$header = 'Blogg';
	// Om $post har värdet som filter_input kräver så får $post det värdet. filter_input kräver att det finns de tre variblerna som står efter det.
	$post = filter_input(INPUT_GET, 'post', FILTER_SANITIZE_URL);

	if (empty($post)) {
		$template = 'all-blog-posts';
	}

	elseif (!empty($post)) {
		$template = 'single-blog-post';

		//  foreach skriver ut om det finns model och det har en key, med värde.
		// if lägger till ex extra sak som måste vara med för att det ska skriva ut. Slug måste finnas i $post.
		foreach ($model as $key => $value){
			if ($model[$key]['slug'] == $post) {
				$title = $model[$key]['title'];
				$author = $model[$key] ['author'];
				$date =  $model[$key] ['date'];
				$message =  $model[$key] ['text'];
			}
		}
	}

	require ('resources/templates/' . $template . '-template.php');
}
elseif($page == "kontakt") {
	$header = 'Kontakt';
    $content = '<div class="content">Du når oss på epost@labb2.se</div>';
    include ('resources/templates/page-template.php');
}
else {
	$header = 'ERROR - 404';
	$error = "Den sökta sidan finns inte";
	include ('resources/templates/page-template.php');
}


?>
