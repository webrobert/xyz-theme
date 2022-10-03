
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<footer id="colophon" class="site-footer bg-slate-200 py-6 px-4 sm:px-8" role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>

	<a class="text-gray-500 text-sm cursor-default" href="/wp-admin/post-new.php">
		&copy; <?php echo date_i18n( 'Y' );?> <?php echo get_bloginfo( 'name' );?>. All rights reserved.
	</a>
</footer>

</div>

<?php wp_footer(); ?>
</body>
</html>
