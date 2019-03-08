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
	$template = 'all-blog-posts';

	// Om $post har värdet som filter_input kräver så får $post det värdet. filter_input kräver att det finns de tre variblerna som står efter det.
	$post = filter_input(INPUT_GET, 'post', FILTER_SANITIZE_URL);

// Om det finns key för $post och $model. Skapas variblerna med värdena som står här under.
	if (array_key_exists($post, $model)) {
		$template = 'single-blog-post';
		$postid = $model[$post]['pID'];
		$title = $model[$post]['title'];
		$author = $model[$post]['author'];
		$date = $model[$post]['date'];
		$message = $model[$post]['text'];
	}

// Om sidan inte finns så får man error 404 meddelande.
	elseif(!empty($post)) {
		$template = 'page';
		$header = 'ERROR  404';
		$error = 'Sidan existerar inte';
	}

// Den kod som står här under till error koden är för att göra rubrikerna som är på sidan. 
	require ('resources/templates/' . $template . '-template.php');
}
elseif($page == "posta") {
	$header = 'Skapa inlägg';
    include ('resources/templates/posta-template.php');
}
elseif($page == "kontakt") {
	$header = 'Kontakt';
    $content = 'Du når oss på epost@labb2.se';
    include ('resources/templates/page-template.php');
}
// Sidan finns inte med texten 404.
else {
	$header = 'ERROR - 404';
	$error = "Den sökta sidan finns inte";
	include ('resources/templates/page-template.php');
}


?>
