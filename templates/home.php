<?php 
global $page;
$page = basename(__FILE__, '.php');
if (isset($_GET['showFav']))
{
	searchShowFav($_GET['showFav']);
}

function searchShowFav($showFav)
{
	require_once(dirname(dirname(__FILE__)).'\manager_bd.php');
	unset($_GET['showFav']);
	showFav();
	exit();
}
?>
<section class="marvel_characters">
	<header class="marvel_characters__search">
		<form id="marvel-characters-search" action="">
			<input type="text" placeholder="Nome do personagem Marvel" class="marvel_characters__search_name" id="s">
			<input type="hidden"a href="" class="marvel_characters__search_favorites" id="s-favorites"/>
			<a href="?showFav" id="showFav" class="marvel_characters__search_favorites" >Exibir favoritos!</a>
		</form>
	</header>
	
	<article class="marvel_characters__content">
		<h1 class="marvel_characters__content_title">Marvel Characters</h2>
		
		<article class="api_content">
			
		</article>
		
		<div class="loader">
			<div class="loader_a"></div>
			<div class="loader_b"></div>
		</div>
	</article>
</section>