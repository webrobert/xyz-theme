
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<footer id="colophon" class="site-footer bg-slate-200 py-6 px-4 sm:px-8" role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>

	<div class="text-gray-500">
		&copy; <?php echo date_i18n( 'Y' );?> <?php echo get_bloginfo( 'name' );?>. All rights reserved.
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
