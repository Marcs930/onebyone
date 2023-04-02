<section class="idx-news">
  <div class="wrapper">
    <h2 class="sectionTitle">
      <span>News</span>
      ニュース
    </h2>

    <ul class="newsList">

      <?php
$news_posts = get_specific_posts('post', 'category', 'news', 3)
?>

      <?php
if ($news_posts->have_posts()):
  while ($news_posts->have_posts()): $news_posts->the_post();
    ?>

      <li class="newsList__item">
        <span class="newsList__date"><?php echo get_the_date(); ?></span>
        <a href="<?php the_permalink();?>" class="newsList__title"><?php the_title();?></a>
      </li>
      <!-- <li class="newsList__item">
		        <span class="newsList__date">2022.10.30</span>
		        <a href="" class="newsList__title">年末年始の営業時間について</a>
		      </li>
		      <li class="newsList__item">
		        <span class="newsList__date">2022.10.30</span>
		        <a href="" class="newsList__title">年末年始の営業時間について</a>
		      </li> -->

      <?php
  endwhile;
endif;
wp_reset_postdata();
?>

    </ul>
    <div class="flex">
      <a class="btnUnderLine">
        お知らせ一覧へ
      </a>
    </div>
  </div>
</section>