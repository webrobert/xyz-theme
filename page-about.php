<?php get_header(); ?>

<section class="sm:min-h-screen flex items-center">
	<div class="my-8 grid grid-cols-12 mx-8 sm:mx-12 xl:ml-20" style="margin-bottom: 20vh">
        <h3 class="entry-title text-4xl md:text-5xl lg:text-6xl col-span-12 sm:col-span-10 md:col-span-7 pr-4"
            style="line-height: 1.5">
            Robert Wayne is a venture builder, investor, steward, advisor... he makes things; companies, systems... pizza.
        </h3>

        <ul class="social text-xl xl:text-2xl flex flex-col justify-end gap-2 lg:ml-12
                   col-start-10 row-start-2 md:row-start-1 md:col-start-11 col-span-2 mb-4
                   mt-12 sm:mt-0">
            <li><a href="https://twitter.com/webrobert" target="_blank" class="underline decoration-solid">
                    Twitter</a></li>
            <li><a href="https://www.linkedin.com/in/rwayne/" target="_blank" class="underline decoration-solid">
                    LinkedIn</a></li>
            <li><a href="https://vero.co/webrobert" target="_blank" class="underline decoration-solid">
                    Vero</a></li>
        </ul>
    </div>
</section>

<section class=" flex items-center min-h-[450px] border-t border-b border-white bg-white bg-opacity-20">
    <div class="mx-auto prose sm:prose-lg md:prose-2xl md:max-w-4xl prose-zinc opacity-50 p-8 md:p-0">
        <blockquote>
            <p>A master in the art of living draws no sharp distinction between his work and his play, his labour and
                his leisure, his mind and his body, his education and his recreation. He hardly knows which is which.
                He simply pursues his vision of excellence through whatever he is doing and leaves others to determine
                whether he is working or playing. To himself he always seems to be doing both.</p>
            <cite>Lawrence Pearsall Jacks</cite>
        </blockquote>
    </div>
</section>

<div class="my-12 mx-8 sm:mx-12 flex items-center">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('md:grid grid-cols-12 items-center'); ?>>
            <figure class="col-span-5 col-start-7 flex items-center">
		        <?php twenty_twenty_one_post_thumbnail(); ?>
            </figure>

            <div class="mt-8 md:mt-0 order-first entry-content prose prose-xl col-start-2 col-span-4">
                <?php the_content(); ?>
            </div>

        </article>

        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php
get_footer();
