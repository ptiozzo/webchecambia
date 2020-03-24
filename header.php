<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<title>
			<?php

			if (!is_front_page()){
				wp_title('');
				echo " | ";
				bloginfo('name');
			} else {
				bloginfo('name');
				echo " | ";
				bloginfo( 'description' );
			}
			?>

		</title>

		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<meta name="title" content="<?php bloginfo( 'name' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/png" href="">

		<?php wp_head(); ?>
	</head>

  <header>
    HEADER
  </header>

  <div id="swup" class="swuptransition">
