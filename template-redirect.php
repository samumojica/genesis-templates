<?php
/*
 * Template Name: Redirector salvation
 * Description: This template will redirect to its parent page
 */


    $rp = new WP_Query(array(
        'post_parent'   => get_the_id(),
        'post_type'     => 'page',
        'order'         => 'asc',
        'orderby'       => 'menu_order'
    ));

    if ($rp->have_posts())
        while ( $rp->have_posts() ) { 
            $rp->the_post(); 
            wp_redirect(get_permalink(get_the_id()) , 301 );
            exit;
        } 

    wp_redirect(dirname(home_url($wp->request)) , 301 );
    exit;
