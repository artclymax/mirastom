<?php
$page = 'options';

$messengers = get_field('contacts_messengers', $page) ?? [];
$class = $args['class'] ?? '';
?>

<?php if (!empty($messengers)): ?>
	<ul class="messengers <?php echo esc_attr($class); ?> ">
		<?php foreach ($messengers as $item): ?>
			<li class="messengers__item">
				<a class="messengers__link" href="<?php echo esc_attr($item['phone']); ?>" aria-label="Мессенджер">
					<?php echo wp_get_attachment_image(
						$item['image']['ID'],
						'large',
						false,
						array(
							'class' => 'img',
							'alt' => $item['image']['alt'] ?: 'Мессенджер'
						)
					); ?>
				</a>
			</li>

		<?php endforeach; ?>
	</ul>
<?php endif; ?>