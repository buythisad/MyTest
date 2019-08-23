<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>

<section class="block-wrapper p-30">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="error-page text-center col ts-grid-box">
						<div class="error-code">
							<h2>
								<strong><?php esc_html_e('404', 'vinkmag'); ?></strong>
							</h2>
						</div>
						<div class="error-message">
							<h3><?php esc_html_e('Sorry! The Page Not Found.', 'vinkmag'); ?></h3>
						</div>
						<div class="error-body">
							<h4><?php esc_html_e('The link you followed probably broken or the page has been removed.','vinkmag'); ?></h4>
							<a href="<?php echo esc_url(home_url()); ?>" class="btn btn-primary"><?php esc_html_e('Back to Home', 'vinkmag'); ?></a>
						</div>
					</div>
				</div>

			</div>
			<!-- Row end -->


		</div>
		<!-- Container end -->
   </section>
   
<?php get_footer(); ?>