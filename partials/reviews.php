<?php
$page = 'options';

$title = get_field('reviews_title', $page) ?? '';
$descr = get_field('reviews_descr', $page) ?? '';
$list = get_field('reviews_list', $page) ?? '';
$btn = get_field('reviews_btn', $page) ?? '';
$image = get_field('reviews_image', $page) ?? '';

?>
<?php if ($list): ?>
	<section class="section reviews" id="reviews" style="background-image: url('<?php echo esc_url($image) ?>');">
		<div class="container reviews__container">
			<div class="reviews__header section-header">
				<h2 class="section-header__title title-1">
					<?php echo esc_html($title) ?>
				</h2>
				<div class="section-header__descr descr">
					<?php echo wp_kses_post($descr) ?>
				</div>
			</div>
			<div class="swiper reviews-swiper" data-swiper="{'slidesPerView': 'auto', 'spaceBetween': 24}">
				<div class="swiper-wrapper reviews-swiper__wrapper">
					<?php foreach ($list as $item): ?>
						<div class="swiper-slide reviews-slide">
							<div class="reviews-slide__wrapper">
								<div class="reviews-slide__header">
									<h3 class="reviews-slide__name title-4">
										<?php echo esc_html($item['name']); ?>
									</h3>

									<div class="reviews-slide__rating">
										<?php
										$rating = !empty($item['rating']) ? (int) $item['rating'] : 5;
										$rating = max(0, min(5, $rating));

										for ($i = 0; $i < $rating; $i++):
											?>
											<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path
													d="M15.9987 20.0888L22.5943 24.8888L20.0698 17.1377L26.6654 12.4443H18.5765L15.9987 4.44434L13.4209 12.4443H5.33203L11.9276 17.1377L9.40314 24.8888L15.9987 20.0888Z"
													fill="#71C3CE" />
											</svg>
										<?php endfor; ?>
									</div>
									<a class="reviews-slide__link" href="<?php echo esc_attr($item['link']['link']['url']) ?>"
										aria-label="Перейти" target="_blank">
										<?php echo wp_get_attachment_image(
											$item['link']['image']['ID'],
											'large',
											false,
											array(
												'class' => 'img',
												'alt' => $item['link']['image']['alt'] ?: $item['name']
											)
										); ?>
									</a>
								</div>
								<div class="reviews-slide__descr descr">
									<?php echo wp_kses_post($item['descr']) ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>

				</div>
				<div class="swiper-pagination reviews-swiper__pagination visible-mobile"
					data-swiper-pagination=".reviews-swiper"></div>
			</div>
			<a class="reviews__btn icon icon--after icon--arrow-next title-4" href="<?php echo esc_attr($btn['url']) ?>">
				<span class="link">
					<?php echo esc_html($btn['title']) ?>
				</span>
			</a>
		</div>
	</section>
<?php endif; ?>