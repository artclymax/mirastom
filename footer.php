<?php
$logo = get_field('footer_logo', 'options') ?? '';
$descr = get_field('footer_descr', 'options') ?? get_bloginfo('description');
$nav = get_field('footer_title_nav', 'options') ?? '';
$contacts = get_field('footer_title_contacts', 'options') ?? '';
$btn = get_field('footer_btn', 'options') ?? '';
$year = get_field('footer_year', 'options') ?? '';
$copy = get_field('footer_copy', 'options') ?? '';
$links = get_field('footer_links', 'options') ?? '';

$phones = get_field('contacts_phones', 'options') ?? '';
$address = get_field('contacts_address', 'options') ?? '';
$messengers = get_field('contacts_messengers', 'options') ?? '';
?>
</main>

<footer class="footer">
	<div class="footer__container container">
		<div class="footer__top">
			<div class="footer__info">
				<div class="footer__logo logo">
					<?php if ($logo) {
						echo '<a href="' . esc_url(home_url('/')) . '">' . wp_get_attachment_image($logo['ID'], 'large', false, array('class' => 'img', 'alt' => get_bloginfo('name') ?: '')) . '</a>';
					} else {
						mx_logo();
					} ?>
				</div>
				<div class="footer__descr descr">
					<?php echo wp_kses_post($descr) ?>
				</div>
			</div>
			<nav class="footer__menu footer-menu">
				<h3 class="footer__title title-4">
					<?php echo esc_html($nav) ?>
				</h3>
				<?php
				$menu = wp_nav_menu(
					array(
						'theme_location' => 'footer-menu',
						'container' => false,
						'menu_class' => 'footer-menu__list',
						'depth' => 1
					)
				);
				echo htmlspecialchars($menu); ?>
			</nav>
			<div class="footer__contacts">
				<h3 class="footer__title title-4">
					<?php echo esc_html($contacts) ?>
				</h3>
				<ul class="footer__contacts-list">
					<?php if ($address): ?>
						<li class="footer__contacts-item footer-contacts-item icon icon--address">
							<div class="footer-contacts-item__wrapper">
								<div class="footer-contacts-item__descr descr">
									<?php echo wp_kses_post($address) ?>
								</div>
							</div>
						</li>
					<?php endif; ?>
					<?php if ($phones): ?>
						<li class="footer__contacts-item footer-contacts-item icon icon--phone">
							<div class="footer-contacts-item__wrapper">
								<?php get_template_part('partials/phones', null, ['class' => 'footer-contacts__phones']); ?>
							</div>
						</li>
					<?php endif; ?>
					<?php if ($messengers): ?>
						<li class="footer__contacts-item footer-contacts-item">
							<div class="footer-contacts-item__wrapper">
								<?php get_template_part('partials/messengers', null, ['class' => 'footer-contacts-item__messengers']); ?>
							</div>
						</li>
					<?php endif; ?>
					<?php if ($btn): ?>
						<li class="footer__contacts-item footer-contacts-item">
							<div class="footer-contacts-item__wrapper">
								<a class="footer-contacts-item__btn btn btn--white" href="<?php echo esc_attr($btn['url']) ?>">
									<?php echo esc_html($btn['title']) ?>
								</a>
							</div>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		<div class="footer__bottom">
			<small class="footer__copy">&copy; <?php echo get_bloginfo('name') ?>,
				<?php echo esc_html($year) ?>-<?php echo date('Y') . '. ' . esc_html($copy) ?></small>
			<?php if ($links): ?>
				<div class="footer__links">
					<?php foreach ($links as $item): ?>
						<a class="footer__link link" href="<?php echo esc_url($item['link']['url']) ?>" target="_blank">
							<?php echo esc_html($item['link']['title']) ?>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</footer>

<?php get_template_part('partials/cookie-banner') ?>

<?php wp_footer(); ?>
</body>

</html>