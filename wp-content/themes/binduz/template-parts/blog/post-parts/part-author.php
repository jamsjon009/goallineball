<?php

    if ( binduz_option( 'blog_single_author_box', 'no' ) == 'no' ) {
        return;
    }
   
    $data             = get_the_author_meta( 'binduz-user-options', get_the_author_meta( 'ID' ) );
    $user_designation = isset($data['user_designation']) ? $data['user_designation'] : '';

?>

<div class="binduz-er-author-user-area">
        <div class=" container">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="binduz-er-author-box">
                        <div class="binduz-er-thumb">
                              <?php
                                  if ( is_author() ) {
                                      $size = 240;
                                  } else {
                                      $size = 80;
                                  }
                              ?>
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), $size ); ?>
                            <span><?php echo count_user_posts( get_the_author_meta( 'ID' ) ) ?> <?php echo esc_html__( 'Post', '' ) ?><span>
                        </div>
                        <div class="binduz-er-content">
                           <?php echo wpautop( esc_html( get_the_author_meta( 'user_description' ) ) ); ?>
                            <div class="binduz-er-meta-author">
                                <span><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?><span><?php  echo esc_html( $user_designation ); ?></span></span>
                            </div>
                        </div>
                        <div class="binduz-er-author-contact d-flex align-content-center">
                            <?php binduz_social_share_style3()?>
                            <div class="binduz-er-contact-link">
                                <a href="<?php echo esc_url( get_the_author_meta( 'user_url' ) ); ?>"><?php echo esc_html__( 'Contact With Me', 'binduz' ); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


