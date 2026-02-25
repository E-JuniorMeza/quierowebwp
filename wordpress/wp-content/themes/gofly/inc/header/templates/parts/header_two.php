  <?php

    use Egns\Helper\Egns_Helper;

    $header_logo             = Egns\Helper\Egns_Helper::egns_get_theme_option('header_logo', 'url');
    $page_header_logo        = Egns\Helper\Egns_Helper::egns_page_option_value('page_header_logo', 'url');
    $header_mobile_logo      = Egns\Helper\Egns_Helper::egns_get_theme_option('header_mobile_logo', 'url');
    $page_header_mobile_logo = Egns\Helper\Egns_Helper::egns_page_option_value('page_header_mobile_logo', 'url');
    ?>

  <header class="header-area style-2">
      <div class="container-fluid d-flex flex-nowrap align-items-center justify-content-between">
          <div class="logo-and-menu-area">
              <?php if (!empty($page_header_logo)): ?>
                  <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo">
                      <img src="<?php echo esc_url($page_header_logo); ?>" alt="<?php echo esc_attr__('logo-image', 'gofly'); ?>">
                  </a>
              <?php elseif (!empty($header_logo)): ?>
                  <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo">
                      <img src="<?php echo esc_url($header_logo); ?>" alt="<?php echo esc_attr__('logo-image', 'gofly'); ?>">
                  </a>
              <?php else:
                    Egns\Helper\Egns_Helper::get_theme_logo(NULL);
                endif; ?>
              <div class="main-menu">
                  <div class="mobile-logo-area d-xl-none d-flex align-items-center justify-content-between">
                      <?php if (!empty($page_header_mobile_logo)): ?>
                          <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-logo-wrap">
                              <img src="<?php echo esc_url($page_header_mobile_logo); ?>" alt="<?php echo esc_attr__('mobile-logo', 'gofly'); ?>">
                          </a>
                      <?php elseif (!empty($header_mobile_logo)): ?>
                          <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-logo-wrap">
                              <img src="<?php echo esc_url($header_mobile_logo); ?>" alt="<?php echo esc_attr__('mobile-logo', 'gofly'); ?>">
                          </a>
                      <?php else:
                            Egns\Helper\Egns_Helper::get_theme_logo(NULL);
                        endif; ?>
                      <div class="menu-close-btn">
                          <i class="bi bi-x"></i>
                      </div>
                  </div>
                  <?php \Egns\Helper\Egns_Helper::egns_get_theme_menu('primary-menu', false, '', '<i class="bi-caret-right-fill dropdown-icon"></i><i class="d-lg-none d-flex bi bi-plus dropdown-icon"></i>', 'menu-list', 3) ?>
                  <div class="contact-area d-xl-none d-flex">
                      <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('header_two_info_icon', 'url'))): ?>
                          <div class="icon">
                              <?php
                                echo Egns\Helper\Egns_Helper::gofly_display_icon_image(Egns\Helper\Egns_Helper::egns_get_theme_option('header_two_info_icon', 'url'), 'icon-image');
                                ?>
                          </div>
                      <?php endif; ?>
                      <div class="content">
                          <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('header_two_info_label'))): ?>
                              <span><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('header_two_info_label')); ?></span>
                          <?php endif; ?>
                          <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('header_two_info_link', 'text'))): ?>
                              <a href="<?php echo esc_url(Egns\Helper\Egns_Helper::egns_get_theme_option('header_two_info_link', 'url')); ?>"><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('header_two_info_link', 'text')); ?></a>
                          <?php endif; ?>
                      </div>
                  </div>
                  <?php if (Egns_Helper::egns_get_theme_option('header_two_login_switcher') == true) : ?>
                      <?php if (is_user_logged_in()) { ?>
                          <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="<?php esc_attr_e('My Account', 'gofly'); ?>" class="primary-btn1 black-bg d-xl-none d-flex">
                              <span>
                                  <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                      <g>
                                          <path
                                              d="M7.50105 7.78913C9.64392 7.78913 11.3956 6.03744 11.3956 3.89456C11.3956 1.75169 9.64392 0 7.50105 0C5.35818 0 3.60652 1.75169 3.60652 3.89456C3.60652 6.03744 5.35821 7.78913 7.50105 7.78913ZM14.1847 10.9014C14.0827 10.6463 13.9467 10.4082 13.7936 10.1871C13.0113 9.0306 11.8038 8.2653 10.4433 8.07822C10.2732 8.06123 10.0861 8.09522 9.95007 8.19727C9.23578 8.72448 8.38546 8.99658 7.50108 8.99658C6.61671 8.99658 5.76638 8.72448 5.05209 8.19727C4.91603 8.09522 4.72895 8.04421 4.5589 8.07822C3.19835 8.2653 1.97387 9.0306 1.20857 10.1871C1.05551 10.4082 0.919443 10.6633 0.817424 10.9014C0.766415 11.0034 0.783407 11.1225 0.834416 11.2245C0.970484 11.4626 1.14054 11.7007 1.2936 11.9048C1.53168 12.2279 1.78679 12.517 2.07592 12.7891C2.31401 13.0272 2.58611 13.2483 2.85824 13.4694C4.20177 14.4728 5.81742 15 7.48409 15C9.15076 15 10.7664 14.4728 12.1099 13.4694C12.382 13.2653 12.6541 13.0272 12.8923 12.7891C13.1644 12.517 13.4365 12.2279 13.6746 11.9048C13.8446 11.6837 13.9977 11.4626 14.1338 11.2245C14.2188 11.1225 14.2358 11.0034 14.1847 10.9014Z" />
                                      </g>
                                  </svg>
                                  <?php echo esc_html__('My Account', 'gofly'); ?>
                              </span>
                              <span>
                                  <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                      <g>
                                          <path
                                              d="M7.50105 7.78913C9.64392 7.78913 11.3956 6.03744 11.3956 3.89456C11.3956 1.75169 9.64392 0 7.50105 0C5.35818 0 3.60652 1.75169 3.60652 3.89456C3.60652 6.03744 5.35821 7.78913 7.50105 7.78913ZM14.1847 10.9014C14.0827 10.6463 13.9467 10.4082 13.7936 10.1871C13.0113 9.0306 11.8038 8.2653 10.4433 8.07822C10.2732 8.06123 10.0861 8.09522 9.95007 8.19727C9.23578 8.72448 8.38546 8.99658 7.50108 8.99658C6.61671 8.99658 5.76638 8.72448 5.05209 8.19727C4.91603 8.09522 4.72895 8.04421 4.5589 8.07822C3.19835 8.2653 1.97387 9.0306 1.20857 10.1871C1.05551 10.4082 0.919443 10.6633 0.817424 10.9014C0.766415 11.0034 0.783407 11.1225 0.834416 11.2245C0.970484 11.4626 1.14054 11.7007 1.2936 11.9048C1.53168 12.2279 1.78679 12.517 2.07592 12.7891C2.31401 13.0272 2.58611 13.2483 2.85824 13.4694C4.20177 14.4728 5.81742 15 7.48409 15C9.15076 15 10.7664 14.4728 12.1099 13.4694C12.382 13.2653 12.6541 13.0272 12.8923 12.7891C13.1644 12.517 13.4365 12.2279 13.6746 11.9048C13.8446 11.6837 13.9977 11.4626 14.1338 11.2245C14.2188 11.1225 14.2358 11.0034 14.1847 10.9014Z" />
                                      </g>
                                  </svg>
                                  <?php echo esc_html__('My Account', 'gofly'); ?>
                              </span>
                          </a>
                      <?php } else { ?>
                          <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="<?php _e('Login / Register', 'gofly'); ?>" class="primary-btn1 black-bg d-xl-none d-flex">
                              <span>
                                  <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                      <g>
                                          <path
                                              d="M7.50105 7.78913C9.64392 7.78913 11.3956 6.03744 11.3956 3.89456C11.3956 1.75169 9.64392 0 7.50105 0C5.35818 0 3.60652 1.75169 3.60652 3.89456C3.60652 6.03744 5.35821 7.78913 7.50105 7.78913ZM14.1847 10.9014C14.0827 10.6463 13.9467 10.4082 13.7936 10.1871C13.0113 9.0306 11.8038 8.2653 10.4433 8.07822C10.2732 8.06123 10.0861 8.09522 9.95007 8.19727C9.23578 8.72448 8.38546 8.99658 7.50108 8.99658C6.61671 8.99658 5.76638 8.72448 5.05209 8.19727C4.91603 8.09522 4.72895 8.04421 4.5589 8.07822C3.19835 8.2653 1.97387 9.0306 1.20857 10.1871C1.05551 10.4082 0.919443 10.6633 0.817424 10.9014C0.766415 11.0034 0.783407 11.1225 0.834416 11.2245C0.970484 11.4626 1.14054 11.7007 1.2936 11.9048C1.53168 12.2279 1.78679 12.517 2.07592 12.7891C2.31401 13.0272 2.58611 13.2483 2.85824 13.4694C4.20177 14.4728 5.81742 15 7.48409 15C9.15076 15 10.7664 14.4728 12.1099 13.4694C12.382 13.2653 12.6541 13.0272 12.8923 12.7891C13.1644 12.517 13.4365 12.2279 13.6746 11.9048C13.8446 11.6837 13.9977 11.4626 14.1338 11.2245C14.2188 11.1225 14.2358 11.0034 14.1847 10.9014Z" />
                                      </g>
                                  </svg>
                                  <?php echo esc_html__('Login', 'gofly'); ?>
                              </span>
                              <span>
                                  <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                      <g>
                                          <path
                                              d="M7.50105 7.78913C9.64392 7.78913 11.3956 6.03744 11.3956 3.89456C11.3956 1.75169 9.64392 0 7.50105 0C5.35818 0 3.60652 1.75169 3.60652 3.89456C3.60652 6.03744 5.35821 7.78913 7.50105 7.78913ZM14.1847 10.9014C14.0827 10.6463 13.9467 10.4082 13.7936 10.1871C13.0113 9.0306 11.8038 8.2653 10.4433 8.07822C10.2732 8.06123 10.0861 8.09522 9.95007 8.19727C9.23578 8.72448 8.38546 8.99658 7.50108 8.99658C6.61671 8.99658 5.76638 8.72448 5.05209 8.19727C4.91603 8.09522 4.72895 8.04421 4.5589 8.07822C3.19835 8.2653 1.97387 9.0306 1.20857 10.1871C1.05551 10.4082 0.919443 10.6633 0.817424 10.9014C0.766415 11.0034 0.783407 11.1225 0.834416 11.2245C0.970484 11.4626 1.14054 11.7007 1.2936 11.9048C1.53168 12.2279 1.78679 12.517 2.07592 12.7891C2.31401 13.0272 2.58611 13.2483 2.85824 13.4694C4.20177 14.4728 5.81742 15 7.48409 15C9.15076 15 10.7664 14.4728 12.1099 13.4694C12.382 13.2653 12.6541 13.0272 12.8923 12.7891C13.1644 12.517 13.4365 12.2279 13.6746 11.9048C13.8446 11.6837 13.9977 11.4626 14.1338 11.2245C14.2188 11.1225 14.2358 11.0034 14.1847 10.9014Z" />
                                      </g>
                                  </svg>
                                  <?php echo esc_html__('Login', 'gofly'); ?>
                              </span>
                          </a>
                      <?php } ?>
                  <?php endif; ?>
              </div>
          </div>
          <div class="nav-right">
              <div class="contact-and-search-area">
                  <div class="contact-area d-xl-flex d-none">
                      <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('header_two_info_icon', 'url'))): ?>
                          <div class="icon">
                              <?php echo Egns\Helper\Egns_Helper::gofly_display_icon_image(Egns\Helper\Egns_Helper::egns_get_theme_option('header_two_info_icon', 'url'), 'icon-image'); ?>
                          </div>
                      <?php endif; ?>
                      <div class="content">
                          <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('header_two_info_label'))): ?>
                              <span><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('header_two_info_label')); ?></span>
                          <?php endif; ?>
                          <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('header_two_info_link', 'text'))): ?>
                              <a href="<?php echo esc_url(Egns\Helper\Egns_Helper::egns_get_theme_option('header_two_info_link', 'url')); ?>"><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('header_two_info_link', 'text')); ?></a>
                          <?php endif; ?>
                      </div>
                  </div>
                  <div class="search-bar">
                      <div class="search-btn">
                          <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                              <g>
                                  <path d="M15.7417 14.6098L13.486 12.3621C14.7088 10.8514 15.3054 8.9291 15.1526 6.99153C14.9998 5.05396 14.1093 3.24888 12.6648 1.94851C11.2203 0.648146 9.33193 -0.0483622 7.38901 0.00261294C5.44609 0.0535881 3.59681 0.84816 2.22248 2.22248C0.84816 3.59681 0.0535881 5.44609 0.00261294 7.38901C-0.0483622 9.33193 0.648146 11.2203 1.94851 12.6648C3.24888 14.1093 5.05396 14.9998 6.99153 15.1526C8.9291 15.3054 10.8514 14.7088 12.3621 13.486L14.6098 15.7417C14.6839 15.8164 14.7721 15.8757 14.8692 15.9161C14.9664 15.9566 15.0705 15.9774 15.1758 15.9774C15.281 15.9774 15.3852 15.9566 15.4823 15.9161C15.5794 15.8757 15.6676 15.8164 15.7417 15.7417C15.8164 15.6676 15.8757 15.5794 15.9161 15.4823C15.9566 15.3852 15.9774 15.281 15.9774 15.1758C15.9774 15.0705 15.9566 14.9664 15.9161 14.8692C15.8757 14.7721 15.8164 14.6839 15.7417 14.6098ZM1.62572 7.60368C1.62572 6.42135 1.97632 5.26557 2.63319 4.2825C3.29005 3.29943 4.22368 2.53322 5.31601 2.08076C6.40834 1.62831 7.61031 1.50992 8.76992 1.74058C9.92953 1.97124 10.9947 2.54059 11.8307 3.37662C12.6668 4.21266 13.2361 5.27783 13.4668 6.43744C13.6974 7.59705 13.579 8.79902 13.1266 9.89134C12.6741 10.9837 11.9079 11.9173 10.9249 12.5742C9.94178 13.231 8.78601 13.5816 7.60368 13.5816C6.01822 13.5816 4.49771 12.9518 3.37662 11.8307C2.25554 10.7096 1.62572 9.18913 1.62572 7.60368Z"></path>
                              </g>
                          </svg>
                      </div>
                      <div class="search-input">
                          <div class="search-close"></div>
                          <form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" role="<?php echo esc_attr('search') ?>">
                              <div class="search-group">
                                  <div class="form-inner2">
                                      <input type="text" id="s" name="s" placeholder="<?php echo esc_attr__('Find Your Perfect Tour Package', 'gofly') ?>">
                                      <?php if (class_exists('Egns_Core')): ?><input type="hidden" name="post_type" value="tour" /><?php endif; ?>
                                      <button type="submit"><i class="bi bi-search"></i></button>
                                  </div>
                              </div>
                              <div class="quick-search">
                                  <ul>
                                      <li><?php echo esc_html_e('Quick Search: ', 'gofly') ?></li>
                                      <?php
                                        $recent_searches = get_recent_searches();
                                        $total_searches = count($recent_searches);
                                        foreach ($recent_searches as $key => $search) {
                                            $comma = ($key < $total_searches - 1) ? ',' : '';
                                            $url = add_query_arg(array('s' => $search, 'post_type' => 'tour',), home_url('/'));
                                            echo '<li><a href="' . esc_url($url) . '">' . esc_html($search) . $comma . '</a></li>';
                                        }
                                        ?>
                                  </ul>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
              <?php if (Egns_Helper::egns_get_theme_option('header_two_login_switcher') == true) : ?>
                  <?php if (is_user_logged_in()) { ?>
                      <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="<?php esc_attr_e('My Account', 'gofly'); ?>" class="primary-btn1 black-bg d-xl-flex d-none">
                          <span>
                              <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                  <g>
                                      <path
                                          d="M7.50105 7.78913C9.64392 7.78913 11.3956 6.03744 11.3956 3.89456C11.3956 1.75169 9.64392 0 7.50105 0C5.35818 0 3.60652 1.75169 3.60652 3.89456C3.60652 6.03744 5.35821 7.78913 7.50105 7.78913ZM14.1847 10.9014C14.0827 10.6463 13.9467 10.4082 13.7936 10.1871C13.0113 9.0306 11.8038 8.2653 10.4433 8.07822C10.2732 8.06123 10.0861 8.09522 9.95007 8.19727C9.23578 8.72448 8.38546 8.99658 7.50108 8.99658C6.61671 8.99658 5.76638 8.72448 5.05209 8.19727C4.91603 8.09522 4.72895 8.04421 4.5589 8.07822C3.19835 8.2653 1.97387 9.0306 1.20857 10.1871C1.05551 10.4082 0.919443 10.6633 0.817424 10.9014C0.766415 11.0034 0.783407 11.1225 0.834416 11.2245C0.970484 11.4626 1.14054 11.7007 1.2936 11.9048C1.53168 12.2279 1.78679 12.517 2.07592 12.7891C2.31401 13.0272 2.58611 13.2483 2.85824 13.4694C4.20177 14.4728 5.81742 15 7.48409 15C9.15076 15 10.7664 14.4728 12.1099 13.4694C12.382 13.2653 12.6541 13.0272 12.8923 12.7891C13.1644 12.517 13.4365 12.2279 13.6746 11.9048C13.8446 11.6837 13.9977 11.4626 14.1338 11.2245C14.2188 11.1225 14.2358 11.0034 14.1847 10.9014Z" />
                                  </g>
                              </svg>
                              <?php echo esc_html__('My Account', 'gofly'); ?>
                          </span>
                          <span>
                              <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                  <g>
                                      <path
                                          d="M7.50105 7.78913C9.64392 7.78913 11.3956 6.03744 11.3956 3.89456C11.3956 1.75169 9.64392 0 7.50105 0C5.35818 0 3.60652 1.75169 3.60652 3.89456C3.60652 6.03744 5.35821 7.78913 7.50105 7.78913ZM14.1847 10.9014C14.0827 10.6463 13.9467 10.4082 13.7936 10.1871C13.0113 9.0306 11.8038 8.2653 10.4433 8.07822C10.2732 8.06123 10.0861 8.09522 9.95007 8.19727C9.23578 8.72448 8.38546 8.99658 7.50108 8.99658C6.61671 8.99658 5.76638 8.72448 5.05209 8.19727C4.91603 8.09522 4.72895 8.04421 4.5589 8.07822C3.19835 8.2653 1.97387 9.0306 1.20857 10.1871C1.05551 10.4082 0.919443 10.6633 0.817424 10.9014C0.766415 11.0034 0.783407 11.1225 0.834416 11.2245C0.970484 11.4626 1.14054 11.7007 1.2936 11.9048C1.53168 12.2279 1.78679 12.517 2.07592 12.7891C2.31401 13.0272 2.58611 13.2483 2.85824 13.4694C4.20177 14.4728 5.81742 15 7.48409 15C9.15076 15 10.7664 14.4728 12.1099 13.4694C12.382 13.2653 12.6541 13.0272 12.8923 12.7891C13.1644 12.517 13.4365 12.2279 13.6746 11.9048C13.8446 11.6837 13.9977 11.4626 14.1338 11.2245C14.2188 11.1225 14.2358 11.0034 14.1847 10.9014Z" />
                                  </g>
                              </svg>
                              <?php echo esc_html__('My Account', 'gofly'); ?>
                          </span>
                      </a>
                  <?php } else { ?>
                      <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="<?php _e('Login / Register', 'gofly'); ?>" class="primary-btn1 black-bg d-xl-flex d-none">
                          <span>
                              <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                  <g>
                                      <path
                                          d="M7.50105 7.78913C9.64392 7.78913 11.3956 6.03744 11.3956 3.89456C11.3956 1.75169 9.64392 0 7.50105 0C5.35818 0 3.60652 1.75169 3.60652 3.89456C3.60652 6.03744 5.35821 7.78913 7.50105 7.78913ZM14.1847 10.9014C14.0827 10.6463 13.9467 10.4082 13.7936 10.1871C13.0113 9.0306 11.8038 8.2653 10.4433 8.07822C10.2732 8.06123 10.0861 8.09522 9.95007 8.19727C9.23578 8.72448 8.38546 8.99658 7.50108 8.99658C6.61671 8.99658 5.76638 8.72448 5.05209 8.19727C4.91603 8.09522 4.72895 8.04421 4.5589 8.07822C3.19835 8.2653 1.97387 9.0306 1.20857 10.1871C1.05551 10.4082 0.919443 10.6633 0.817424 10.9014C0.766415 11.0034 0.783407 11.1225 0.834416 11.2245C0.970484 11.4626 1.14054 11.7007 1.2936 11.9048C1.53168 12.2279 1.78679 12.517 2.07592 12.7891C2.31401 13.0272 2.58611 13.2483 2.85824 13.4694C4.20177 14.4728 5.81742 15 7.48409 15C9.15076 15 10.7664 14.4728 12.1099 13.4694C12.382 13.2653 12.6541 13.0272 12.8923 12.7891C13.1644 12.517 13.4365 12.2279 13.6746 11.9048C13.8446 11.6837 13.9977 11.4626 14.1338 11.2245C14.2188 11.1225 14.2358 11.0034 14.1847 10.9014Z" />
                                  </g>
                              </svg>
                              <?php echo esc_html__('Login', 'gofly'); ?>
                          </span>
                          <span>
                              <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                  <g>
                                      <path
                                          d="M7.50105 7.78913C9.64392 7.78913 11.3956 6.03744 11.3956 3.89456C11.3956 1.75169 9.64392 0 7.50105 0C5.35818 0 3.60652 1.75169 3.60652 3.89456C3.60652 6.03744 5.35821 7.78913 7.50105 7.78913ZM14.1847 10.9014C14.0827 10.6463 13.9467 10.4082 13.7936 10.1871C13.0113 9.0306 11.8038 8.2653 10.4433 8.07822C10.2732 8.06123 10.0861 8.09522 9.95007 8.19727C9.23578 8.72448 8.38546 8.99658 7.50108 8.99658C6.61671 8.99658 5.76638 8.72448 5.05209 8.19727C4.91603 8.09522 4.72895 8.04421 4.5589 8.07822C3.19835 8.2653 1.97387 9.0306 1.20857 10.1871C1.05551 10.4082 0.919443 10.6633 0.817424 10.9014C0.766415 11.0034 0.783407 11.1225 0.834416 11.2245C0.970484 11.4626 1.14054 11.7007 1.2936 11.9048C1.53168 12.2279 1.78679 12.517 2.07592 12.7891C2.31401 13.0272 2.58611 13.2483 2.85824 13.4694C4.20177 14.4728 5.81742 15 7.48409 15C9.15076 15 10.7664 14.4728 12.1099 13.4694C12.382 13.2653 12.6541 13.0272 12.8923 12.7891C13.1644 12.517 13.4365 12.2279 13.6746 11.9048C13.8446 11.6837 13.9977 11.4626 14.1338 11.2245C14.2188 11.1225 14.2358 11.0034 14.1847 10.9014Z" />
                                  </g>
                              </svg>
                              <?php echo esc_html__('Login', 'gofly'); ?>
                          </span>
                      </a>
                  <?php } ?>
              <?php endif; ?>
              <div class="sidebar-button mobile-menu-btn">
                  <svg width="20" height="18" viewBox="0 0 20 18" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1.29445 2.8421H10.5237C11.2389 2.8421 11.8182 2.2062 11.8182 1.42105C11.8182 0.635903 11.2389 0 10.5237 0H1.29445C0.579249 0 0 0.635903 0 1.42105C0 2.2062 0.579249 2.8421 1.29445 2.8421Z"></path>
                      <path d="M1.23002 10.421H18.77C19.4496 10.421 20 9.78506 20 8.99991C20 8.21476 19.4496 7.57886 18.77 7.57886H1.23002C0.550421 7.57886 0 8.21476 0 8.99991C0 9.78506 0.550421 10.421 1.23002 10.421Z"></path>
                      <path d="M18.8052 15.1579H10.2858C9.62563 15.1579 9.09094 15.7938 9.09094 16.5789C9.09094 17.3641 9.62563 18 10.2858 18H18.8052C19.4653 18 20 17.3641 20 16.5789C20 15.7938 19.4653 15.1579 18.8052 15.1579Z"></path>
                  </svg>
              </div>
          </div>
      </div>
  </header>