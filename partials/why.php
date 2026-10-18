<?php
$page = 'options';

$title = get_field('why_title', $page) ?? '';
$descr = get_field('why_descr', $page) ?? '';
$list = get_field('why_list', $page) ?? '';
$image = get_field('why_image', $page) ?? '';

?>
<?php if ($list): ?>
	<section class="why jarallax" id="why" style="background-image: url('<?php echo esc_url($image) ?>');">
		<div class="container why__container">
			<div class="why__header section-header">
				<h2 class="section-header__title title-1">
					<?php echo esc_html($title) ?>
				</h2>
				<div class="section-header__descr descr t-center">
					<?php echo wp_kses_post($descr) ?>
				</div>
			</div>
			<ul class="why__list grid">
				<?php foreach ($list as $item): ?>
					<li class="why__item services-item why-item">
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
			</ul>
		</div>
	</section>
<?php endif; ?>