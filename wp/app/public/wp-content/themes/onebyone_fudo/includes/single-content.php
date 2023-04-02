<?php
if( have_posts() ):
    while( have_posts() ) :the_post();
?>

<article>
  <div class="articleHeading">
    <p class="articleHeading__title"><?php the_title(); ?></p>
    <span class="articleHeading__date"><?php the_time( 'Y/m/d' ); ?></span>
  </div>

  <?php the_content(); ?>

</article>

<div class="articlePager">
  <ul class="articlePager__list">
    <?php
$next_post = get_next_post();
$prev_post = get_previous_post();
if( $prev_post ):
?>
    <!-- pager:start -->
    <li class="articlePager__item --prev">
      <a href="<?php echo get_permalink( $prev_post -> ID); ?>" class="articlePager__text">
        &lt; 前へ
      </a>
    </li>

    <?php
endif;
if( $next_post ):
?>

    <li class="articlePager__item --next">
      <a href="<?php echo get_permalink( $next_post -> ID); ?>" class="articlePager__text">
        次へ &gt;
      </a>
    </li>
    <?php
endif;
?>
  </ul>
</div>
<!-- pager:end -->


<?php
    endwhile;
endif;
?>