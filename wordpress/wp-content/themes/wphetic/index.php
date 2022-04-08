<?php
 function debug($var)
 {
     echo "<pre>";
     print_r($var);
     echo "</pre>";
     die();
 }
?>

<?php
	// init var for post
	$categories =  get_terms(array(
		'taxonomy' => 'nationalite',
	));
?>

<?php 

$args = array(
    'post_type'=> 'recipe'
);              

$the_query = new WP_Query( $args );

?>

<?php get_header(); ?>
<?php if (have_posts()) : ?>
	<div class="index">
		<div class="d-f filter">
			<p>Filtres :</p>
			<ul class="d-f list_ctn">
				<li class="filter-tag" data-category="all">Tout</li>
				<?php foreach($categories as $categorie) : ?>
					<li class="filter-tag" data-category="<?= $categorie->slug ?>"> <?= $categorie->name ?></li>
				<?php endforeach ?>
			</ul>
		</div>
		<div class="post_ctn">
			<?php while ( $the_query->have_posts() ) : 
				$the_query->the_post();  ?>
				<?php
					// init var for post
					$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ) );
					// $categories_item =  get_the_category(get_the_ID());
					$categories_item = get_the_terms( $post->ID, 'nationalite' ); 
					// $categories = get_categories($args);
					$articleCategory = '';
					foreach ($categories_item as $category){
						$articleCategory = $articleCategory . ' ' . $category->slug;
					}
				?>
					<div class="post_card" data-category="<?= $articleCategory ?>">
						<div class="img" style="--bg-image: url(<?= $thumbnail[0] ?>)">
						</div>
						<h2 class="title"><?php the_title(); ?></h2>
						<div class="d-f">
							<?php
							 foreach($categories_item as $categorie) : ?>
								<p class='item'> <?= $categorie->name ?></p>
							<?php endforeach ?>
						</div>
						<a href="<?php the_permalink(); ?>" class="link-action"></a>
					</div>
				<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>
<?php get_footer(); ?>

<script>
let filterTags = document.querySelectorAll('.filter-tag');
var filter;
let cards = document.querySelectorAll('.post_card');
const list_ctn = document.querySelector('.list_ctn');

function display(el, disp = 'block' ){
	el.style.display = disp;
}

list_ctn.addEventListener('click', (e) => {
	let elementCategory = e.target.dataset.category;
	cards.forEach(card => {
		let currentCategory = card.dataset.category; 
		currentCategory.includes(elementCategory) || elementCategory === 'all' ? display(card, 'block') : display(card, 'none');
    });})
</script>
