<article id="post-<?php the_ID(); ?>" <?php post_class('quote bg-gray-100 block aspect-[9/6] relative flex flex-col justify-between rounded-lg'); ?>>

    <div class="pb-4 space-y-2 flex flex-col grow relative">
        <div class="entry-summary px-4 flex flex-grow items-center relative">
            <a class="absolute inset-0 flex-none" href="<?php echo get_permalink(); ?>" rel="bookmark"></a>
            <span class="opacity-10 block rotate-6 justify-self-start h-[200px]"
                  style="font-size:350px; z-index:1; line-height: .75; position: absolute !important; top: -10px; left:-20px">"</span>

            <div class="prose text-base prose">
                <blockquote class="font-normal border-none px-2"
                            style="quotes: none">
                    <?php the_excerpt(); ?>
                    <cite class="ml-auto"><?php the_title(); ?></cite>
                </blockquote>
            </div>
        </div>

	</div>
</article>
