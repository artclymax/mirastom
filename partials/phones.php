<?php
$page = 'options';

$phones = get_field('contacts_phones', $page) ?? [];
$has_text = $args['has_text'] ?? true;
$length_phones = $args['length_phones'] ?? -1;
$class = $args['class'] ?? '';

// считаем лимит
$limit = ($length_phones === -1)
	? count($phones)
	: $length_phones + 1;
?>

<?php if (!empty($phones)): ?>
	<ul class="phones <?php echo esc_attr($class); ?> ">
		<?php foreach ($phones as $i => $item): ?>

			<?php if ($i >= $limit)
				break; ?>

			<li class="phones__item">
				<a class="phones__link link" href="tel:+<?php echo esc_attr(correct_phone($item['phone'])); ?>">
					<?php if ($has_text): ?>
						<span><?php echo esc_html($item['operator']); ?></span>
					<?php endif; ?>
					<span><?php echo esc_html($item['phone']); ?></span>
				</a>
			</li>

		<?php endforeach; ?>
	</ul>
<?php endif; ?>