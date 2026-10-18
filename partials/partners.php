<?php
$page = 'options';

$title = get_field('partners_title', $page) ?? '';
$list = get_field('partners_list', $page) ?? '';
?>
<?php if ($list): ?>
	<section class="section partners" id="partners">
		<div class="container partners__container">
			<div class="partners__header section-header">
				<h2 class="section-header__title title-1">
					<?php echo esc_html($title) ?>
				</h2>
			</div>
		</div>
		<div class="partners__running-line running-line" data-running-line>
			<ul class="running-line__list" data-running-line-list>
				<?php foreach ($list as $item): ?>
					<li class="running-line__item">
						<?php echo wp_get_attachment_image(
							$item['image']['ID'],
							'large',
							false,
							array(
								'class' => 'img',
								'alt' => $item['image']['alt'] ?: $title
							)
						); ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
<?php endif; ?>