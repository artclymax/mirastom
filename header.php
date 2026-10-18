<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="wrapper">
		<?php
		$email = get_field('contacts_email', 'options') ?? '';
		$address = get_field('contacts_address', 'options') ?? '';
		$phones = get_field('contacts_phones', 'options') ?? '';
		$btn = get_field('header_btn', 'options') ?? '';
		?>
		<header class="header" data-auto-calc="header, height">
			<div class="container header__container">
				<div class="header__body">
					<div class="header__logo logo">
						<?php mx_logo(); ?>
					</div>
					<div class="header__contacts">
						<address class="header__address descr hidden-tablet title-4">
							<?php echo wp_kses_post($address) ?>
						</address>
						<?php get_template_part('partials/phones', null, ['class' => 'header__phones', 'has_text' => false, 'length_phones' => 1]); ?>
						<?php get_template_part('partials/messengers', null, ['class' => 'header__messengers hidden-tablet']); ?>
					</div>
					<a class="header__btn btn hidden-tablet" href="<?php echo esc_url($btn['url']) ?>">
						<?php echo esc_html($btn['title']) ?>
					</a>
					<button class="header__burger-btn burger-btn visible-tablet" type="button"
						aria-label="Открыть/закрыть меню">
						<span></span>
					</button>
				</div>
			</div>
			<div class="container header__container-menu">
				<nav class="header__menu header-menu">
					<?php
					$menu = wp_nav_menu(
						array(
							'theme_location' => 'header-menu',
							'container' => false,
							'menu_class' => 'header-menu__list',
							'depth' => 1
						)
					);
					echo htmlspecialchars($menu); ?>
					<a class="header__btn btn visible-tablet" href="<?php echo esc_url($btn['url']) ?>">
						<?php echo esc_html($btn['title']) ?>
					</a>
				</nav>
			</div>
		</header>
		<main class="main">
			<?php if (!is_front_page() && !is_404() && !is_page('thank-you')): ?>
				<?php get_template_part('partials/hero-page'); ?>
			<?php endif; ?>