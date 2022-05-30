</main>
<?php
    if (isset($_GET['id']))
    {
        searchFav($_GET['id']);
    }

    function searchFav($id)
    {
		require_once(dirname(dirname(dirname(__FILE__))).'\manager_bd.php');

        fav($id);
		header("Location: /");
		die();
    }
?>
	<footer id="footer">
		
	</footer>

	<script type="text/javascript" src="./assets/js/min/lib-min.js"></script>
	<script type="text/javascript" src="./assets/js/min/app-min.js"></script>
	
	<script type="text/x-jsrender" id="charactersTemplate">
		<article class="marvel_characters__content__character">
			{{if thumbnail}}
				<figure class="marvel_characters__content__character_image">
					<img src="{{:thumbnail.path}}/portrait_medium.{{:thumbnail.extension}}" alt="{{:name}}">
				</figure>
			{{/if}}
			<div class="marvel_characters__content__character_content">

				<form id="marvel-characters-search" action="">
					<a href="?id={{:id}}" id="s-addfavorites">Favorito</a>
				</form>

				<h2 class="marvel_characters__content__character_title">{{:name}}</h2>
				{{:id}}
				{{if description}}
					<div class="marvel_characters__content__character_info">
						<h3 class="marvel_characters__content__character_subtitle">Description</h3>
						<p>{{:description}}</p>
					</div>
				{{/if}}
				
				{{if stories && stories.available}}
					<div class="marvel_characters__content__character_stories">
						<h3 class="marvel_characters__content__character_subtitle">Some Stories</h3>
						<ul class="marvel_characters__content__character_list">
						{{for stories.items end=5}}
						 	<li>{{>name}}</li>
						{{/for}}
						</ul>
					</div>
				{{/if}}
			</div>
		</article>
	</script>

	<script type="text/x-jsrender" id="errorTemplate">
		<p>
			<b>{{:status}}</b><br>
			{{:message}}
		</p>
	</script>

	<script type="text/javascript">
		<?php $currentPage = $page; ?>
		jQuery( document ).ready( function($){
			<?php echo "App.pages.{$page}($); "; ?>
		});
	</script>

</body>
</html>