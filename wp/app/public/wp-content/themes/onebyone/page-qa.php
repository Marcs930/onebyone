<?php get_header(); ?>
<!-- <body> -->

<div class="container">

  <?php get_template_part('includes/header') ?>

  <!-- CONTENTS: START -->

  <main class="main ">
    <div class="pageHead js-scrollTransTarget --qa">
      <picture>
        <source media="(min-width:769px)" srcset="./assets/img/qa/qa-pageHead_pc.jpg">
        <source media="(max-width:480px)" srcset="./assets/img/qa/qa-pageHead_sp.jpg">
        <source media="(max-width:768px)" srcset="./assets/img/qa/qa-pageHead_tab.jpg">
        <img src="./assets/img/qa/qa-pageHead.jpg" alt="">
      </picture>
      <!-- <img src="./assets/img/qa/qa-pageHead.jpg" alt=""> -->
      <div class="wrapper pageHead__inner">
        <h2 class="pageHead__title">
          よくあるご質問
          <span>FAQ</span>
        </h2>
      </div>
    </div>

    <div class="breadcrumb">
      <div class="wrapper">
        <ul class="breadcrumb__list">
          <li class="breadcrumb__item">
            <a href="" class="breadcrumb__text">トップページ</a>
          </li>
          <li class="breadcrumb__item --current">
            <span class="breadcrumb__text">よくあるご質問</span>
          </li>
        </ul>
      </div>
    </div>

    <section class="qa-qa">
      <div class="wrapper">
        <dl class="qa-qa__list">
          <dt class="qa-qa__question ">
            質問文です質問文です質問文です質問文です質問文です質問文です質問文です質問文です質問文です<br>
            質問ぶん
            質問文です質問文です質問文です質問文です質問文です質問文です質問文です質問文です質問文です<br>
            質問ぶん
          </dt>
          <dd class="qa-qa__answer">回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です
          </dd>

        </dl>
        <dl class="qa-qa__list">
          <dt class="qa-qa__question ">
            質問文です質問文です質問文です質問文です質問文です質問文です質問文です質問文です質問文です<br>
            質問ぶん
            質問文です質問文です質問文です質問文です質問文です質問文です質問文です質問文です質問文です<br>
            質問ぶん
          </dt>
          <dd class="qa-qa__answer">回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です
          </dd>

        </dl>
        <dl class="qa-qa__list">
          <dt class="qa-qa__question ">
            質問文です質問文です質問文です質問文です質問文です質問文です質問文です質問文です質問文です<br>
            質問ぶん
            質問文です質問文です質問文です質問文です質問文です質問文です質問文です質問文です質問文です<br>
            質問ぶん
          </dt>
          <dd class="qa-qa__answer">回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です回答です
          </dd>

        </dl>
      </div>
    </section>

  </main>

  <!-- CONTENTS: END -->
  <?php get_template_part('includes/footer') ?>


</div><!-- /.container -->



<!-- </body> -->
<?php get_footer(); ?>