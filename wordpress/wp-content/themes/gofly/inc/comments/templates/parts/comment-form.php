<div class="inquiry-form">
    <?php
    // Custom comments_args here: https://codex.wordpress.org/Function_Reference/comment_form
    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : '');

    $comments_args = array(
        'title_reply' => '<h2 class="comment-title">' . esc_html__('Leave A Comment:', 'gofly') . '</h2>',
        'fields'     => apply_filters('comment_form_default_fields', array(
            'author' => '<div class="col-md-6 form-inner two mb-20 name"><label>' . esc_html__('Full Name*', 'gofly') . '</label><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author'])
                . '" placeholder="' . esc_attr__('Enter your name', 'gofly') . '" ' . esc_html($aria_req) . '></div>',

            'email' => '<div class="col-md-6 form-inner two mb-20 email"><label>' . esc_html__('Your Email*', 'gofly') . '</label><input  id="email" name="email" type="email"  value="' . esc_attr($commenter['comment_author_email'])
                . '" placeholder="' . esc_attr__('Enter your email', 'gofly') . '" ' . esc_html($aria_req) . '></div>',
        )),
        'comment_field' => ' <div class="row"><div class="col-12 form-inner two mb-15"><label>' . esc_html__('Message*', 'gofly') . '</label><textarea class=" text__area" id="comment" name="comment" cols="45" rows="8" placeholder="' . esc_attr__('Your Message', 'gofly') . '"></textarea></div></div>',

        'submit_button' => '<div class="form-inner">
        <button type="submit" class="primary-btn1">
            <span>' 
                . esc_html__('Post Comment', 'gofly') . 
            '<svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
            </svg></span>
            <span>'
                . esc_html__('Post Comment', 'gofly') .
            '<svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
            </svg>
        </span>
        </button>
    </div>',

        'class_submit' => 'primary-btn1',
        'label_submit' => esc_html__('Post Comment', 'gofly'), 
        'format'       => 'xhtml'
    );
    ?>
    <?php
    comment_form($comments_args);
    ?>
</div>