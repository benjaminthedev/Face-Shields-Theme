<?php
	global $thegem_page_title_template_data;
	$thegem_use_custom = get_post($thegem_page_title_template_data['title_template']);
	$thegem_q = new WP_Query(array('p' => $thegem_page_title_template_data['title_template'], 'post_type' => 'thegem_title', 'post_status' => 'private'));
?>
<div id="page-title" class="page-title-block custom-page-title">
	<div class="container">
		<?php if($thegem_page_title_template_data['title_template'] && $thegem_use_custom && $thegem_q->have_posts()) : $thegem_q->the_post(); ?>
			<?php the_content(); ?>
		<?php wp_reset_postdata(); endif; ?>
	</div>
	<div class="page-title-alignment-<?php echo $thegem_page_title_template_data['title_alignment']; ?>"><?php echo $thegem_page_title_template_data['breadcrumbs_output']; ?></div>
</div>