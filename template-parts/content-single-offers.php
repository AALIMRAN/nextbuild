
	<div class="tab-pane <?php for ($x = 0; $x <= 10; $x++) {if ($x == 1) { echo 'active';}}  ?>" id="<?php $categories = get_the_terms( 'offers-categories' ); foreach ($categories as $category){echo esc_attr($category->slug);}?>">
				<?php the_content(); ?>
	</div><!-- end tab-pane -->

