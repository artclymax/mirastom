<?php
$page = 'options';

$title = get_field('page404_title', $page) ?? '';
$descr = get_field('page404_descr', $page) ?? '';
$btn = get_field('page404_btn', $page) ?? '';
$image = get_field('page404_image', $page) ?? '';

?>
<section class="page-404 jarallax" id="page-404" style="background-image: url('<?php echo esc_url($image) ?>');">
	<div class="container page-404__container">
		<h1 class="page-404__title title-1">
			<?php echo esc_html($title) ?>
		</h1>
		<div class="page-404__descr descr title-3">
			<?php echo wp_kses_post($descr) ?>
		</div>
		<a class="page-404__btn btn" href="<?php echo esc_url($btn['url']) ?>">
			<?php echo esc_html($btn['title']) ?>
		</a>
	</div>
</section>