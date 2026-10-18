<?php
$page = 'options';

$title = get_field('services_title', $page) ?? '';
$descr = get_field('services_descr', $page) ?? '';
$list = get_field('services_list', $page) ?? '';
$btn = get_field('services_btn', $page) ?? '';

?>
<?php if ($list): ?>
	<section class="services" id="services">
		<div class="container services__container">
			<div class="services__header section-header">
				<h2 class="section-header__title title-1">
					<?php echo esc_html($title) ?>
				</h2>
				<div class="section-header__descr descr">
					<?php echo wp_kses_post($descr) ?>
				</div>
			</div>
			<ul class="services__list grid">
				<?php foreach ($list as $item): ?>
					<li class="services__item services-item">
						<div class="services-item__header">
							<div class="services-item__icon">
								<?php echo wp_get_attachment_image(
									$item['image']['ID'],
									'large',
									false,
									array(
										'class' => 'img',
										'alt' => $item['image']['alt'] ?: $item['title']
									)
								); ?>
							</div>
							<h3 class="services-item__title title-4">
								<?php echo esc_html($item['title']) ?>
							</h3>
						</div>
						<div class="services-item__descr descr">
							<?php echo wp_kses_post($item['descr']) ?>
						</div>
					</li>
				<?php endforeach; ?>
				<li class="services__item services-item services-item--btn"
					style="background-image: url('<?php echo esc_attr($btn['image']) ?>');">
					<div class="services-item__wrapper">
						<h3 class="services-item__title title-4">
							<?php echo esc_html($btn['title']) ?>
						</h3>
						<a class="btn btn--light services-item__btn" href="<?php echo esc_attr($btn['link']['url']) ?>">
							<?php echo esc_html($btn['link']['title']) ?>
						</a>
					</div>
				</li>
			</ul>
		</div>
	</section>
<?php endif; ?>