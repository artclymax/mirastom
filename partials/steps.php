<?php
$page = 'options';

$title = get_field('step_title', $page) ?? '';
$descr = get_field('steps_descr', $page) ?? '';
$btn = get_field('steps_btn', $page) ?? '';
$list = get_field('steps_list', $page) ?? '';

?>
<?php if ($list): ?>
	<section class="steps" id="steps">
		<div class="container steps__container">
			<div class="steps__header section-header">
				<h2 class="section-header__title title-1">
					<?php echo esc_html($title) ?>
				</h2>
				<div class="section-header__descr descr">
					<?php echo wp_kses_post($descr) ?>
				</div>
			</div>
			<ul class="steps__list grid">
				<?php foreach ($list as $index => $item): ?>
					<li class="steps__item steps-item">
						<div class="steps-item__icon">
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
						<p class="steps-item__step-number">
							Шаг <?php echo esc_html(++$index) ?>
						</p>
						<h3 class="steps-item__title">
							<?php
							$lines = array_filter(array_map('trim', explode("\n", $item['title']))); ?>
							<?php foreach ($lines as $line): ?>
								<span>
									<?= esc_html($line); ?>
								</span>
							<?php endforeach; ?>
						</h3>
						<div class="steps-item__text descr">
							<?php echo wp_kses_post($item['descr']) ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
<?php endif; ?>