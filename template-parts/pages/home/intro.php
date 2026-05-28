<?php
/**
 * Intro Section in the Home Page Template.
 *
 * @package erlebnisbad
 * @subpackage Section
 * @since 1.0.0
 */

?>
<section id="section-intro" class="section-intro bg-white<?php echo get_field( 'intro_enable_info_block' ) ? ' has-info-block' : ''; ?>">

  <div class="theme-container pt-36 md:pt-24 xl:pt-36">
    <div class="theme-grid text-center justify-items-center">
        <div class="col-span-2 md:col-start-1 md:col-span-6 xl:col-start-4 xl:col-span-6">
            <h2 class="title-main text-Black pb-8 md:pb-12 xl:pb-10 max-w-[300px] md:max-w-[630px] xl:max-w-[760px]"><?php the_field( 'intro_title' ); ?></h2>
        </div>
        <div class="col-span-2 md:col-start-2 md:col-span-4 xl:col-start-4 xl:col-span-6">
            <p class="text-Black"><?php the_field( 'intro_text' ); ?></p>
        </div>
    </div>

    <?php if ( get_field( 'intro_enable_info_block' ) ) : ?>
    <div class="theme-grid">
      <div class="col-span-2 md:col-span-6 xl:col-span-12 -mx-8 md:-mx-9 xl:-mx-12 pt-20">

        <div class="section-intro__waves" aria-hidden="true">
          <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 112" fill="none" class="hidden xl:block stroke-Mint">
            <path vector-effect="non-scaling-stroke" stroke-width="1" fill="none" d="M0 34.278c177.226-13.588 415.148-21.865 704.479 2.616C1077.92 68.492 1374.62 139.138 1920 97.379"/>
            <path vector-effect="non-scaling-stroke" stroke-width="1" fill="none" d="M0 24.898c129.904-13.713 366.954-40.302 688.542-13.164C1034.17 40.901 1292.27 114.468 1920 20.26"/>
          </svg>

          <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 834 78" fill="none" class="hidden md:block xl:hidden stroke-Mint">
            <path vector-effect="non-scaling-stroke" stroke-width="1" fill="none" d="M0 27.5697C76.6105 21.795 163.846 20.8075 261.008 29.1947C333.358 35.4401 401.244 45.8467 470.663 55.2689C540.088 64.692 611.061 73.133 689.62 75.4574C734.846 76.7955 782.589 76.1047 834 72.4076"/>
            <path vector-effect="non-scaling-stroke" stroke-width="1" fill="none" d="M0 8.67224C69.385 0.292662 153.135 -3.75241 250.021 4.57556C304.374 9.24755 355.375 17.0375 407.52 24.0892C459.67 31.1418 512.979 37.4577 571.986 39.1908C646.999 41.394 731.233 36.1881 834 15.6635"/>
          </svg>

          <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 397 49" fill="none" class="block md:hidden stroke-Mint">
            <path vector-effect="non-scaling-stroke" stroke-width="1" fill="none" d="M0 22.7432C39.5866 18.2382 83.9886 16.7359 133.104 20.6036C175.153 23.9148 214.858 30.5673 255.371 36.4161C295.892 42.266 337.239 47.3148 382.62 47.4346C387.368 47.4471 392.16 47.4049 397 47.3047"/>
            <path vector-effect="non-scaling-stroke" stroke-width="1" fill="none" d="M0 6.82524C35.7565 0.917851 77.6237 -2.09297 125.433 1.64848C157.024 4.12075 186.854 9.09688 217.282 13.4698C247.718 17.8438 278.77 21.6173 312.852 21.6973C338.787 21.7582 366.483 19.6762 397 14.0918"/>
          </svg>
        </div>

        <div class="intro-slider bg-Mint relative">
          <div class="intro-slider__inner px-8 md:px-9 xl:px-12 mx-auto xl:max-w-[1920px] py-16 md:py-20 xl:pt-36 xl:pb-56">

            <?php if ( have_rows( 'intro_info_block' ) ) : ?>
            <div class="intro-slider__swiper swiper">
              <div class="swiper-wrapper">
                <?php while ( have_rows( 'intro_info_block' ) ) : the_row(); ?>
                <div class="swiper-slide">
                  <div class="grid grid-cols-2 md:grid-cols-6 xl:grid-cols-12 gap-x-5 md:gap-x-4 xl:gap-x-5 items-start">
                    <div class="col-span-2 md:col-span-3 xl:col-start-2 xl:col-span-4 text-left">
                      <h3 class="title-main text-white"><?php the_sub_field( 'title' ); ?></h3>
                    </div>
                    <div class="col-span-2 md:col-span-3 xl:col-start-7 xl:col-span-5 text-left mt-8 md:mt-0">
                      <p class="text-white mb-8"><?php the_sub_field( 'text' ); ?></p>
                      <?php
                      $link = get_sub_field( 'button' );
                      if ( $link ) :
                          $link_url    = $link['url'];
                          $link_title  = $link['title'];
                          $link_target = $link['target'] ?: '_self';
                      ?>
                      <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <?php endwhile; ?>
              </div>
            </div>

            <button class="intro-slider__prev" aria-label="<?php esc_attr_e( 'Previous', 'digid' ); ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="31" height="17" viewBox="0 0 31 17" fill="none" class="scale-x-[-1]" aria-hidden="true">
                <path d="M13.6394 4.95379C17.7041 3.57604 15.0846 0.418682 17.6137 0.0168392C19.016 -0.205953 21.9956 1.82167 25.1956 3.74824C27.7675 5.29659 30.666 6.86343 30.9761 8.39817C31.318 10.0898 27.9222 11.551 24.8343 13.4499C21.6348 15.4175 18.8083 17.4962 17.6134 16.8943C15.2652 15.7115 17.6137 12.5888 12.8264 11.8425C4.697 10.8092 -5.16121e-07 11.0963 -7.51996e-07 8.39817C-9.87871e-07 5.70007 9.57465 6.33154 13.6394 4.95379Z" fill="currentColor"/>
              </svg>
            </button>
            <button class="intro-slider__next" aria-label="<?php esc_attr_e( 'Next', 'digid' ); ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="31" height="17" viewBox="0 0 31 17" fill="none" aria-hidden="true">
                <path d="M13.6394 4.95379C17.7041 3.57604 15.0846 0.418682 17.6137 0.0168392C19.016 -0.205953 21.9956 1.82167 25.1956 3.74824C27.7675 5.29659 30.666 6.86343 30.9761 8.39817C31.318 10.0898 27.9222 11.551 24.8343 13.4499C21.6348 15.4175 18.8083 17.4962 17.6134 16.8943C15.2652 15.7115 17.6137 12.5888 12.8264 11.8425C4.697 10.8092 -5.16121e-07 11.0963 -7.51996e-07 8.39817C-9.87871e-07 5.70007 9.57465 6.33154 13.6394 4.95379Z" fill="currentColor"/>
              </svg>
            </button>
            <?php endif; ?>

          </div>
        </div>

      </div>
    </div>
    <?php endif; ?>

  </div>
</section>
