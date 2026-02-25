<?php

namespace Egns\Inc;

use Egns\Helper\Egns_Helper;

class Header_Helper extends Egns_Helper
{

    /**
     * Initializes a singleton instance
     *
     * @return \Header_Helper
     */
    public static function init()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Main construcutor 
     *
     * @return void
     */
    public function __construct() {}


    /**
     * Get common information header topbar 
     * 
     * @return data
     */

    public static function mobile_contact_info()
    { ?>
        <?php foreach ((array) self::egns_get_theme_option('topbar_contact_info') as $item) : ?>
            <?php
            $contactType = isset($item['topbar_contact_type']) ? $item['topbar_contact_type'] : 'default_value';
            // Check if any of the contact information fields is not empty
            $isNotEmpty = (
                ($contactType === 'phone' && !empty($item['topbar_phone_info'])) ||
                ($contactType === 'email' && !empty($item['topbar_email_info'])) ||
                ($contactType === 'others' && !empty($item['topbar_custom_info']))
            );
            if ($isNotEmpty) :
            ?>
                <?php if ($contactType === 'phone') : ?>
                    <li>
                        <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $item['topbar_phone_info']); ?>">
                            <img src="<?php echo esc_url($item['topbar_phone_icon_svg']['url']); ?>" alt="<?php echo esc_attr__('icon', 'gofly') ?>">
                            <?php echo esc_html($item['topbar_phone_info']); ?>
                        </a>
                    </li>
                <?php elseif ($contactType === 'email') : ?>
                    <li>
                        <a href="mailto:<?php echo esc_attr($item['topbar_email_info']); ?>">
                            <img src="<?php echo esc_url($item['topbar_email_icon_svg']['url']); ?>" alt="<?php echo esc_attr__('icon', 'gofly') ?>">
                            <?php echo esc_html($item['topbar_email_info']); ?>
                        </a>
                    </li>
                <?php elseif ($contactType === 'others') : ?>
                    <li>
                        <a href="<?php echo esc_url($item['topbar_custom_link']['url']); ?>">
                            <img src="<?php echo esc_url($item['topbar_custom_icon_svg']['url']); ?>" alt="<?php echo esc_attr__('icon', 'gofly') ?>">
                            <?php echo esc_html($item['topbar_custom_info']); ?>
                        </a>
                    </li>
                <?php endif ?>
                <!-- END  -->
            <?php endif ?>
        <?php endforeach; ?>

    <?php
    } // End mobile contact info


    /**
     * Search style (only product) 
     * *
     * $layout return search style
     * *
     * @return data
     */
    public static function product_search()
    {
    ?>

        <!-- convert search only for woocommerce -->
        <div class="search-area">
            <form role="<?php echo esc_attr('search') ?>" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <div class="form-inner">
                    <input type="text" placeholder="Search your product here" name="s" value="<?php echo get_search_query(); ?>">
                    <input type="hidden" name="post_type" value="product" />
                    <button type="submit">
                        <svg width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.20349 0.448242C5.41514 0.45124 3.70089 1.16299 2.43633 2.42755C1.17178 3.6921 0.460029 5.40635 0.457031 7.1947C0.458526 8.98456 1.16943 10.7008 2.43399 11.9675C3.69855 13.2342 5.41364 13.948 7.20349 13.9525C8.79089 13.9525 10.2536 13.3941 11.4101 12.47L15.0578 16.1179C15.2002 16.2503 15.3882 16.3223 15.5825 16.3189C15.7768 16.3155 15.9622 16.2369 16.0998 16.0997C16.2374 15.9625 16.3165 15.7773 16.3204 15.583C16.3243 15.3887 16.2528 15.2005 16.1208 15.0578L12.4731 11.407C13.4325 10.2138 13.9556 8.72863 13.9556 7.19753C13.9556 3.47848 10.9225 0.448242 7.20349 0.448242ZM7.20349 1.9506C10.1118 1.9506 12.4533 4.28919 12.4533 7.1947C12.4533 10.1002 10.1118 12.453 7.20349 12.453C4.29514 12.453 1.95656 10.1087 1.95656 7.20037C1.95656 4.29202 4.29514 1.9506 7.20349 1.9506Z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <?php
    } // End product_search



    /**
     * My Account
     * *
     * $layout return account button style
     * *
     * @return data
     */
    public static function my_account($layout = '')
    {
        if ($layout == 'one') { ?>
            <?php if (is_user_logged_in()) { ?>
                <a class="login-btn btn-hover d-lg-flex d-none" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                    <svg width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.50035 9.09302C5.99384 9.09302 3.95384 7.05302 3.95384 4.54651C3.95384 2.04 5.99384 0 8.50035 0C11.0069 0 13.0469 2.04 13.0469 4.54651C13.0469 7.05302 11.0069 9.09302 8.50035 9.09302ZM8.50035 1.18605C6.65012 1.18605 5.13989 2.69628 5.13989 4.54651C5.13989 6.39674 6.65012 7.90698 8.50035 7.90698C10.3506 7.90698 11.8608 6.39674 11.8608 4.54651C11.8608 2.69628 10.3506 1.18605 8.50035 1.18605ZM15.2924 17C14.9683 17 14.6994 16.7312 14.6994 16.407C14.6994 13.6791 11.9162 11.4651 8.50035 11.4651C5.08454 11.4651 2.30128 13.6791 2.30128 16.407C2.30128 16.7312 2.03244 17 1.70826 17C1.38407 17 1.11523 16.7312 1.11523 16.407C1.11523 13.0307 4.42826 10.2791 8.50035 10.2791C12.5724 10.2791 15.8855 13.0307 15.8855 16.407C15.8855 16.7312 15.6166 17 15.2924 17Z" />
                    </svg>
                    <?php _e('My Account', 'gofly'); ?>
                    <span></span>
                </a>
            <?php } else { ?>
                <a class="login-btn btn-hover d-lg-flex d-none" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                    <svg width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.50035 9.09302C5.99384 9.09302 3.95384 7.05302 3.95384 4.54651C3.95384 2.04 5.99384 0 8.50035 0C11.0069 0 13.0469 2.04 13.0469 4.54651C13.0469 7.05302 11.0069 9.09302 8.50035 9.09302ZM8.50035 1.18605C6.65012 1.18605 5.13989 2.69628 5.13989 4.54651C5.13989 6.39674 6.65012 7.90698 8.50035 7.90698C10.3506 7.90698 11.8608 6.39674 11.8608 4.54651C11.8608 2.69628 10.3506 1.18605 8.50035 1.18605ZM15.2924 17C14.9683 17 14.6994 16.7312 14.6994 16.407C14.6994 13.6791 11.9162 11.4651 8.50035 11.4651C5.08454 11.4651 2.30128 13.6791 2.30128 16.407C2.30128 16.7312 2.03244 17 1.70826 17C1.38407 17 1.11523 16.7312 1.11523 16.407C1.11523 13.0307 4.42826 10.2791 8.50035 10.2791C12.5724 10.2791 15.8855 13.0307 15.8855 16.407C15.8855 16.7312 15.6166 17 15.2924 17Z" />
                    </svg>
                    <?php _e('My Account', 'gofly'); ?>
                    <span></span>
                </a>
            <?php } ?>

        <?php } elseif ($layout == 'two') { ?>
            <div class="btn-area d-lg-none d-flex">
                <?php if (is_user_logged_in()) { ?>
                    <a class="login-btn btn-hover" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                        <svg width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.50035 9.09302C5.99384 9.09302 3.95384 7.05302 3.95384 4.54651C3.95384 2.04 5.99384 0 8.50035 0C11.0069 0 13.0469 2.04 13.0469 4.54651C13.0469 7.05302 11.0069 9.09302 8.50035 9.09302ZM8.50035 1.18605C6.65012 1.18605 5.13989 2.69628 5.13989 4.54651C5.13989 6.39674 6.65012 7.90698 8.50035 7.90698C10.3506 7.90698 11.8608 6.39674 11.8608 4.54651C11.8608 2.69628 10.3506 1.18605 8.50035 1.18605ZM15.2924 17C14.9683 17 14.6994 16.7312 14.6994 16.407C14.6994 13.6791 11.9162 11.4651 8.50035 11.4651C5.08454 11.4651 2.30128 13.6791 2.30128 16.407C2.30128 16.7312 2.03244 17 1.70826 17C1.38407 17 1.11523 16.7312 1.11523 16.407C1.11523 13.0307 4.42826 10.2791 8.50035 10.2791C12.5724 10.2791 15.8855 13.0307 15.8855 16.407C15.8855 16.7312 15.6166 17 15.2924 17Z" />
                        </svg>
                        <?php _e('My Account', 'gofly'); ?>
                        <span></span>
                    </a>
                <?php } else { ?>
                    <a class="login-btn btn-hover" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                        <svg width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.50035 9.09302C5.99384 9.09302 3.95384 7.05302 3.95384 4.54651C3.95384 2.04 5.99384 0 8.50035 0C11.0069 0 13.0469 2.04 13.0469 4.54651C13.0469 7.05302 11.0069 9.09302 8.50035 9.09302ZM8.50035 1.18605C6.65012 1.18605 5.13989 2.69628 5.13989 4.54651C5.13989 6.39674 6.65012 7.90698 8.50035 7.90698C10.3506 7.90698 11.8608 6.39674 11.8608 4.54651C11.8608 2.69628 10.3506 1.18605 8.50035 1.18605ZM15.2924 17C14.9683 17 14.6994 16.7312 14.6994 16.407C14.6994 13.6791 11.9162 11.4651 8.50035 11.4651C5.08454 11.4651 2.30128 13.6791 2.30128 16.407C2.30128 16.7312 2.03244 17 1.70826 17C1.38407 17 1.11523 16.7312 1.11523 16.407C1.11523 13.0307 4.42826 10.2791 8.50035 10.2791C12.5724 10.2791 15.8855 13.0307 15.8855 16.407C15.8855 16.7312 15.6166 17 15.2924 17Z" />
                        </svg>
                        <?php _e('My Account', 'gofly'); ?>
                        <span></span>
                    </a>
                <?php } ?>
            </div>
        <?php } elseif ($layout == 'three') { ?>
            <?php if (is_user_logged_in()) { ?>
                <a class="login-btn btn-hover d-lg-flex d-none" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                    <i class="bi bi-person-circle"></i>
                    <?php _e('My Account', 'gofly'); ?>
                    <span></span>
                </a>
            <?php } else { ?>
                <a class="login-btn btn-hover d-lg-flex d-none" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                    <i class="bi bi-person-circle"></i>
                    <?php _e('My Account', 'gofly'); ?>
                    <span></span>
                </a>
            <?php } ?>
        <?php } elseif ($layout == 'four') { ?>
            <div class="btn-area d-lg-none d-flex">
                <?php if (is_user_logged_in()) { ?>
                    <a class="login-btn btn-hover" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                        <i class="bi bi-person-circle"></i>
                        <?php _e('My Account', 'gofly'); ?>
                        <span></span>
                    </a>
                <?php } else { ?>
                    <a class="login-btn btn-hover" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                        <i class="bi bi-person-circle"></i>
                        <?php _e('My Account', 'gofly'); ?>
                        <span></span>
                    </a>
                <?php } ?>
            </div>
        <?php } elseif ($layout == 'five') { ?>
            <?php if (is_user_logged_in()) { ?>
                <a class="login-btn d-lg-flex d-none" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                    <div class="icon">
                        <svg width="19" height="19" viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.0001 9.49996C18.0001 14.1944 14.1945 18 9.50004 18C4.80552 18 1 14.1944 1 9.49996C1 4.80543 4.80552 0.999913 9.50004 0.999913C14.1945 0.999913 18.0001 4.80543 18.0001 9.49996Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12.9007 8.36671C12.9007 10.2445 11.3785 11.7667 9.50064 11.7667C7.62273 11.7667 6.10059 10.2445 6.10059 8.36671C6.10059 6.48897 7.62273 4.96672 9.50064 4.96672C11.3785 4.96672 12.9007 6.48897 12.9007 8.36671Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M4.42676 16.3221C4.69869 13.7615 6.86539 11.7667 9.49811 11.7667C12.1309 11.7667 14.2976 13.7616 14.5694 16.3222" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <span><?php _e('My Account', 'gofly'); ?></span>
                </a>
            <?php } else { ?>
                <a class="login-btn d-lg-flex d-none" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                    <div class="icon">
                        <svg width="19" height="19" viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.0001 9.49996C18.0001 14.1944 14.1945 18 9.50004 18C4.80552 18 1 14.1944 1 9.49996C1 4.80543 4.80552 0.999913 9.50004 0.999913C14.1945 0.999913 18.0001 4.80543 18.0001 9.49996Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12.9007 8.36671C12.9007 10.2445 11.3785 11.7667 9.50064 11.7667C7.62273 11.7667 6.10059 10.2445 6.10059 8.36671C6.10059 6.48897 7.62273 4.96672 9.50064 4.96672C11.3785 4.96672 12.9007 6.48897 12.9007 8.36671Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M4.42676 16.3221C4.69869 13.7615 6.86539 11.7667 9.49811 11.7667C12.1309 11.7667 14.2976 13.7616 14.5694 16.3222" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <span><?php _e('My Account', 'gofly'); ?></span>
                </a>
            <?php } ?>
        <?php } elseif ($layout == 'six') { ?>
            <div class="btn-area d-lg-none d-flex">
                <?php if (is_user_logged_in()) { ?>
                    <a class="primary-btn4 black-bg btn-hover" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                        <svg width="19" height="19" viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.0001 9.49996C18.0001 14.1944 14.1945 18 9.50004 18C4.80552 18 1 14.1944 1 9.49996C1 4.80543 4.80552 0.999913 9.50004 0.999913C14.1945 0.999913 18.0001 4.80543 18.0001 9.49996Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12.9007 8.36671C12.9007 10.2445 11.3785 11.7667 9.50064 11.7667C7.62273 11.7667 6.10059 10.2445 6.10059 8.36671C6.10059 6.48897 7.62273 4.96672 9.50064 4.96672C11.3785 4.96672 12.9007 6.48897 12.9007 8.36671Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M4.42676 16.3221C4.69869 13.7615 6.86539 11.7667 9.49811 11.7667C12.1309 11.7667 14.2976 13.7616 14.5694 16.3222" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <?php _e('My Account', 'gofly'); ?>
                        <span></span>
                    </a>
                <?php } else { ?>
                    <a class="primary-btn4 black-bg btn-hover" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                        <svg width="19" height="19" viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.0001 9.49996C18.0001 14.1944 14.1945 18 9.50004 18C4.80552 18 1 14.1944 1 9.49996C1 4.80543 4.80552 0.999913 9.50004 0.999913C14.1945 0.999913 18.0001 4.80543 18.0001 9.49996Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12.9007 8.36671C12.9007 10.2445 11.3785 11.7667 9.50064 11.7667C7.62273 11.7667 6.10059 10.2445 6.10059 8.36671C6.10059 6.48897 7.62273 4.96672 9.50064 4.96672C11.3785 4.96672 12.9007 6.48897 12.9007 8.36671Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M4.42676 16.3221C4.69869 13.7615 6.86539 11.7667 9.49811 11.7667C12.1309 11.7667 14.2976 13.7616 14.5694 16.3222" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <?php _e('My Account', 'gofly'); ?>
                        <span></span>
                    </a>
                <?php } ?>
            </div>
        <?php } elseif ($layout == 'seven') { ?>
            <?php if (is_user_logged_in()) { ?>
                <a class="login-btn d-lg-flex d-none" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                    <div class="icon">
                        <svg width="19" height="19" viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.0001 9.49996C18.0001 14.1944 14.1945 18 9.50004 18C4.80552 18 1 14.1944 1 9.49996C1 4.80543 4.80552 0.999913 9.50004 0.999913C14.1945 0.999913 18.0001 4.80543 18.0001 9.49996Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12.9007 8.36671C12.9007 10.2445 11.3785 11.7667 9.50064 11.7667C7.62273 11.7667 6.10059 10.2445 6.10059 8.36671C6.10059 6.48897 7.62273 4.96672 9.50064 4.96672C11.3785 4.96672 12.9007 6.48897 12.9007 8.36671Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M4.42676 16.3221C4.69869 13.7615 6.86539 11.7667 9.49811 11.7667C12.1309 11.7667 14.2976 13.7616 14.5694 16.3222" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <span><?php _e('My Account', 'gofly'); ?></span>
                </a>
            <?php } else { ?>
                <a class="login-btn d-lg-flex d-none" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                    <div class="icon">
                        <svg width="19" height="19" viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.0001 9.49996C18.0001 14.1944 14.1945 18 9.50004 18C4.80552 18 1 14.1944 1 9.49996C1 4.80543 4.80552 0.999913 9.50004 0.999913C14.1945 0.999913 18.0001 4.80543 18.0001 9.49996Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12.9007 8.36671C12.9007 10.2445 11.3785 11.7667 9.50064 11.7667C7.62273 11.7667 6.10059 10.2445 6.10059 8.36671C6.10059 6.48897 7.62273 4.96672 9.50064 4.96672C11.3785 4.96672 12.9007 6.48897 12.9007 8.36671Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M4.42676 16.3221C4.69869 13.7615 6.86539 11.7667 9.49811 11.7667C12.1309 11.7667 14.2976 13.7616 14.5694 16.3222" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <span><?php _e('My Account', 'gofly'); ?></span>
                </a>
            <?php } ?>
        <?php } elseif ($layout == 'eight') { ?>
            <div class="btn-area d-lg-none d-flex">
                <?php if (is_user_logged_in()) { ?>
                    <a class="primary-btn5 white-bg btn-hover" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                        <svg width="19" height="19" viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.0001 9.49996C18.0001 14.1944 14.1945 18 9.50004 18C4.80552 18 1 14.1944 1 9.49996C1 4.80543 4.80552 0.999913 9.50004 0.999913C14.1945 0.999913 18.0001 4.80543 18.0001 9.49996Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12.9007 8.36671C12.9007 10.2445 11.3785 11.7667 9.50064 11.7667C7.62273 11.7667 6.10059 10.2445 6.10059 8.36671C6.10059 6.48897 7.62273 4.96672 9.50064 4.96672C11.3785 4.96672 12.9007 6.48897 12.9007 8.36671Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M4.42676 16.3221C4.69869 13.7615 6.86539 11.7667 9.49811 11.7667C12.1309 11.7667 14.2976 13.7616 14.5694 16.3222" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <?php _e('My Account', 'gofly'); ?>
                        <span></span>
                    </a>
                <?php } else { ?>
                    <a class="primary-btn5 white-bg btn-hover" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                        <svg width="19" height="19" viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.0001 9.49996C18.0001 14.1944 14.1945 18 9.50004 18C4.80552 18 1 14.1944 1 9.49996C1 4.80543 4.80552 0.999913 9.50004 0.999913C14.1945 0.999913 18.0001 4.80543 18.0001 9.49996Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12.9007 8.36671C12.9007 10.2445 11.3785 11.7667 9.50064 11.7667C7.62273 11.7667 6.10059 10.2445 6.10059 8.36671C6.10059 6.48897 7.62273 4.96672 9.50064 4.96672C11.3785 4.96672 12.9007 6.48897 12.9007 8.36671Z" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M4.42676 16.3221C4.69869 13.7615 6.86539 11.7667 9.49811 11.7667C12.1309 11.7667 14.2976 13.7616 14.5694 16.3222" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <?php _e('My Account', 'gofly'); ?>
                        <span></span>
                    </a>
                <?php } ?>
            </div>
<?php }
        // End loop

    } // End account 




} //end main class

Header_Helper::init();
