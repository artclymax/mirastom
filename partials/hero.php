<?php
$page = 'options';

$label = get_field('hero_label', $page) ?? '';
$title = get_field('hero_title', $page) ?? get_bloginfo('name');
$descr = get_field('hero_descr', $page) ?? get_bloginfo('description');
$btn = get_field('hero_btn', $page) ?? '';
$note = get_field('hero_note', $page) ?? '';
$list = get_field('hero_list', $page) ?? '';
$photo = get_field('hero_photo', $page) ?? '';
$image = get_field('hero_image', $page) ?? '';

$params = [
	'slidesPerView' => 'auto',
	'spaceBetween' => 10,
	'breakpoints' => [
		'768' => [
			'spaceBetween' => 22,
		]
	]
];

$json = json_encode($params);
?>
<section class="hero jarallax" id="hero" style="background-image: url('<?php echo esc_url($image) ?>');">
	<div class="container hero__container">
		<div class="hero__body">
			<p class="hero__label"><?php echo esc_html($label) ?></p>
			<div class="hero__content">
				<h2 class="hero__title title-1 descr">
					<?php echo wp_kses_post($title) ?>
				</h2>
				<div class="hero__descr descr">
					<?php echo wp_kses_post($descr) ?>
				</div>
			</div>
			<a class="hero__btn btn" href="<?php echo esc_url($btn['url']) ?>">
				<?php echo esc_html($btn['title']) ?>
			</a>
			<p class="hero__note">
				<?php echo esc_html($note) ?>
			</p>
		</div>

		<div class="hero__photo image-box">
			<?php echo wp_get_attachment_image(
				$photo['ID'],
				'large',
				false,
				array(
					'class' => 'img',
					'alt' => $photo['alt'] ?: esc_html($label)
				)
			); ?>
		</div>
		<div class="hero__swiper">

			<div class="swiper hero-swiper" data-swiper="<?php echo esc_attr($json); ?>">
				<div class="swiper-wrapper hero-swiper__wrapper">
					<?php foreach ($list as $item): ?>
						<div class="swiper-slide hero-slide">
							<div class="hero-slide__wrapper">
								<h3 class="hero-slide__title title-1">
									<?php echo esc_html($item['title']) ?>
								</h3>
								<div class="hero-slide__descr descr">
									<?php echo wp_kses_post($item['descr']) ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>