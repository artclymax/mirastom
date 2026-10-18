<?php
$page = 'options';

$title = get_field('doctors_title', $page) ?? '';
$descr = get_field('doctors_descr', $page) ?? '';
$btn = get_field('doctors_cta', $page) ?? '';
$list = get_field('doctors_list', $page) ?? '';
?>
<?php if ($list): ?>
	<section class="section doctors pt-0" id="doctors">
		<div class="container doctors__container">
			<div class="doctors__header section-header">
				<h2 class="section-header__title title-1">
					<?php echo esc_html($title) ?>
				</h2>
				<div class="section-header__descr">
					<?php echo wp_kses_post($descr) ?>
				</div>
			</div>
			<div class="swiper doctors-swiper" data-swiper="{'slidesPerView': 'auto', 'spaceBetween': 22}">
				<div class="swiper-wrapper doctors-swiper__wrapper">
					<?php foreach ($list as $item): ?>
						<div class="swiper-slide doctors-slide">
							<div class="doctors-slide__wrapper">
								<div class="doctors-slide__image image-box">
									<?php echo wp_get_attachment_image(
										$item['image']['ID'],
										'large',
										false,
										array(
											'class' => 'img',
											'alt' => $item['image']['alt'] ?: $item['name']
										)
									); ?>
								</div>
								<div class="doctors-slide__content">
									<h3 class="doctors-slide__title title-4">
										<?php echo esc_html($item['name']) ?>
									</h3>
									<p class="doctors-slide__position">
										<?php echo esc_html($item['position']) ?>
									</p>
									<p class="doctors-slide__exp">
										<?php echo esc_html($item['exp']) ?>
									</p>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="swiper-pagination doctors-swiper__pagination visible-mobile" data-swiper-pagination=".doctors-swiper"></div>
			</div>
			<?php if ($btn): ?>
				<div class="doctors__btn-box">
					<div class="descr doctors__subtitle title-4">
						<?php echo wp_kses_post($btn['descr'])?>
					</div>
					<a class="btn doctors__btn" href="<?php echo esc_attr($btn['link']['url']) ?>">
						<?php echo esc_html($btn['link']['title']) ?>
					</a>
				</div>
			<?php endif; ?>

		</div>
	</section>
<?php endif; ?>