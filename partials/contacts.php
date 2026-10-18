<?php
$page = 'options';

$title = get_field('contacts_title', $page) ?? '';
$map = get_field('contacts_map', $page) ?? '';

$title_address = get_field('contacts_title_address', $page) ?? '';
$address = get_field('contacts_address', $page) ?? '';

$title_phone = get_field('contacts_title_phone', $page) ?? '';
$phones = get_field('contacts_phones', $page) ?? '';

$title_messengers = get_field('contacts_title_messengers', $page) ?? '';
$messengers = get_field('contacts_messengers', $page) ?? '';

$title_time = get_field('contacts_title_time', $page) ?? '';
$time = get_field('contacts_time', $page) ?? '';

?>
<section class="section contacts pt-0" id="contacts">
	<div class="container contacts__container">
		<div class="contacts__header section-header">
			<h2 class="section-header__title title-1">
				<?php echo esc_html($title) ?>
			</h2>
		</div>
		<div class="contacts__wrapper">
			<ul class="contacts__list">
				<?php if ($address): ?>
					<li class="contacts__item contacts-item icon icon--address-blue">
						<div class="contacts-item__wrapper">
							<h3 class="contacts-item__title title-4">
								<?php echo esc_html($title_address) ?>
							</h3>
							<div class="contacts-item__descr descr">
								<?php echo wp_kses_post($address) ?>
							</div>
						</div>
					</li>
				<?php endif; ?>
				<?php if ($phones): ?>
					<li class="contacts__item contacts-item icon icon--phone-blue">
						<div class="contacts-item__wrapper">
							<h3 class="contacts-item__title title-4">
								<?php echo esc_html($title_phone) ?>
							</h3>
							<?php get_template_part('partials/phones', null, ['class' => 'contacts__phones']); ?>
						</div>
					</li>
				<?php endif; ?>
				<?php if ($time): ?>
					<li class="contacts__item contacts-item icon icon--time-blue">
						<div class="contacts-item__wrapper">
							<h3 class="contacts-item__title title-4">
								<?php echo esc_html($title_time) ?>
							</h3>
							<div class="contacts-item__descr descr">
								<?php echo wp_kses_post($time) ?>
							</div>
						</div>
					</li>
				<?php endif; ?>
				<?php if ($messengers): ?>
					<li class="contacts__item contacts-item icon icon--messengers-blue">
						<div class="contacts-item__wrapper">
							<h3 class="contacts-item__title title-4">
								<?php echo esc_html($title_messengers) ?>
							</h3>
							<?php get_template_part('partials/messengers', null, ['class' => 'contacts__messengers']); ?>
						</div>
					</li>
				<?php endif; ?>
			</ul>
			<div class="contacts__map">
				<?php echo wp_kses($map, [
					'iframe' => [
						'src' => true,
						'width' => true,
						'height' => true,
						'style' => true,
						'allowfullscreen' => true,
						'loading' => true,
					],
				]) ?>
			</div>
		</div>
	</div>
</section>