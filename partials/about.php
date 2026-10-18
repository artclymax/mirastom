<?php
$page = 'options';

$title = get_field('about_title', $page) ?? '';
$descr = get_field('about_descr', $page) ?? '';
$note = get_field('about_note', $page) ?? '';
$list = get_field('about_gallery', $page) ?? '';
$image = get_field('about_image', $page) ?? '';

?>
<section class="section about jarallax pt-0" id="about" style="background-image: url('<?php echo esc_url($image) ?>');">
	<div class="container about__container">
		<div class="about__header section-header">
			<h2 class="section-header__title title-1">
				<?php echo esc_html($title) ?>
			</h2>
		</div>
		<div class="about__content">
			<?php if ($list): ?>
				<div class="about__swiper">
					<div class="swiper about-swiper" data-swiper="{'slidesPerView': 1, 'spaceBetween': 22}">
						<div class="swiper-wrapper about-swiper__wrapper">
							<?php foreach ($list as $item): ?>
								<div class="swiper-slide about-slide">
									<a class="about-slide__wrapper-link image-box" data-fancybox
										href="<?php echo esc_url(wp_get_attachment_url($item['image']['ID'])); ?>">
										<?php echo wp_get_attachment_image(
											$item['image']['ID'],
											'large',
											false,
											array(
												'class' => 'img',
												'alt' => $item['image']['alt'] ?: $title
											)
										); ?>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
						<div class="swiper-pagination about-swiper__pagination visible-mobile"
							data-swiper-pagination=".about-swiper"></div>
					</div>
					<div class="about-swiper__nav hidden-mobile">
						<button class="swiper-btn swiper-btn__prev about-swiper__btn about-swiper__btn-prev" type="button"
							aria-label="Назад" data-swiper-btn-prev=".about-swiper">
							<svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M9.43945 0.439453C10.0252 -0.146333 10.9748 -0.146333 11.5605 0.439453C12.1462 1.02525 12.1463 1.9748 11.5605 2.56055L5.12109 9H21C21.8284 9.00006 22.5 9.67161 22.5 10.5C22.4999 11.3283 21.8283 11.9999 21 12H5.12109L11.5605 18.4395C12.1462 19.0252 12.1463 19.9748 11.5605 20.5605C10.9748 21.1463 10.0252 21.1462 9.43945 20.5605L0.439453 11.5605C-0.146333 10.9748 -0.146333 10.0252 0.439453 9.43945L9.43945 0.439453Z"
									fill="#0F3693" />
							</svg>
						</button>
						<button class="swiper-btn swiper-btn__next about-swiper__btn about-swiper__btn-next" type="button"
							aria-label="Вперёд" data-swiper-btn-next=".about-swiper">
							<svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M10.9395 0.439453C11.5252 -0.146333 12.4748 -0.146333 13.0605 0.439453L22.0605 9.43945C22.6463 10.0252 22.6463 10.9748 22.0605 11.5605L13.0605 20.5605C12.4748 21.1463 11.5252 21.1463 10.9395 20.5605C10.3537 19.9748 10.3537 19.0252 10.9395 18.4395L17.3789 12H1.5C0.671611 12 6.13297e-05 11.3284 0 10.5C0 9.67157 0.671573 9 1.5 9H17.3789L10.9395 2.56055C10.3537 1.97478 10.3537 1.02524 10.9395 0.439453Z"
									fill="#0F3693" />
							</svg>
						</button>
					</div>
				</div>
			<?php endif; ?>
			<div class="about__descr descr title-4">
				<?php echo wp_kses_post($descr) ?>
			</div>
		</div>
		<div class="about__note descr title-4 t-center hidden-mobile">
			<?php echo wp_kses_post($note) ?>
		</div>
	</div>
</section>