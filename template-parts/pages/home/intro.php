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

  <div class="theme-container pt-20 md:pt-24 xl:pt-36">
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
      <div class="col-span-2 md:col-span-6 xl:col-span-12 -mx-8 md:-mx-9 xl:-mx-12 pt-40">

        <div class="intro-slider bg-Mint relative">
          <div class="intro-slider__inner px-8 md:px-14 xl:px-20 mx-auto xl:max-w-[1920px] py-64 md:pt-48 md:pb-64 xl:pt-64 xl:pb-56">

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

            
            <?php endif; ?>

          </div>
          <div class="intro-slider__pagination">
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
            </div>
        </div>

      </div>
    </div>
    <?php endif; ?>

  </div>
</section>
