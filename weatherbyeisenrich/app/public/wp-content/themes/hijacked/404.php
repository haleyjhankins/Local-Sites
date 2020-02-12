<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Hijacked
 */

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <section class="error-404 not-found grey-bg pd100">
      <div class="row">
      <div class="medium-12 columns mb5">

      <header class="page-header">
        <h1 class="page-title">That page can't be found.</h1>
      </header><!-- .page-header -->
      </div>

      <div class="medium-12 columns">
        <h4 class="mb2"><a href="/">Click here to return to the homepage.</a></h4>
        <h4><a href="/contact">Or Contact Us if you have a question.</a></h4>
      </div>

      </div>


      </section><!-- .error-404 -->

    </main><!-- #main -->
  </div><!-- #primary -->

  <?php get_footer(); ?>
