<?php
function add_query_vars_filter($vars)
{
    // Custom query vars
    $vars[] .= 'vs_country';
    $vars[] .= 'vs_category';
    $vars[] .= 'vs_citizen';
    $vars[] .= 'vs_resident';
    $vars[] .= 'tr_location';
    $vars[] .= 'inOut';
    $vars[] .= 'tr_types';
    $vars[] .= 'tr_destination';
    $vars[] .= 'ht_location';
    $vars[] .= 'ht_checkInOutdate';
    $vars[] .= 'ht_daterange';
    $vars[] .= 'exp_destination';
    $vars[] .= 'exp_category';

    return $vars;
}
add_filter('query_vars', 'add_query_vars_filter');


function egns_search_filter_query($query)
{

    // Search post visa
    if ($query->is_post_type_archive('visa') && $query->is_main_query() && !is_admin()) {

        $vs_country  = get_query_var('vs_country');
        $vs_category = get_query_var('vs_category');
        $vs_citizen  = get_query_var('vs_citizen');
        $vs_resident = get_query_var('vs_resident');



        // Start Taxonomy Query 
        $tax_query_array = array('relation' => 'AND');

        if (!empty($vs_country)) {
            $vs_country ? array_push($tax_query_array, array('taxonomy' => 'visa-countries', 'field' => 'name', 'terms' => $vs_country)) : null;
        }
        if (!empty($vs_category)) {
            $vs_category ? array_push($tax_query_array, array('taxonomy' => 'visa-category', 'field' => 'name', 'terms' => $vs_category)) : null;
        }
        if (!empty($vs_citizen)) {
            $vs_citizen ? array_push($tax_query_array, array('taxonomy' => 'visa-citizenships', 'field' => 'name', 'terms' => $vs_citizen)) : null;
        }
        if (!empty($vs_resident)) {
            $vs_resident ? array_push($tax_query_array, array('taxonomy' => 'visa-residents', 'field' => 'name', 'terms' => $vs_resident)) : null;
        }

        // final tax_query
        $query->set('tax_query', $tax_query_array);
    }


    // Search post tour
    if ($query->is_post_type_archive('tour') && $query->is_main_query() && !is_admin()) {

        $tr_location    = get_query_var('tr_location');
        $tr_inOut       = get_query_var('inOut');
        $strdate        = date_i18n("m/d/Y", strtotime($tr_inOut));
        $tr_destination = get_query_var('tr_destination');
        $tr_types       = get_query_var('tr_types');

        // Start Meta Query
        $meta_query_array = array('relation' => 'AND');

        if (!empty($tr_location)) {
            $tr_location ? array_push($meta_query_array, array('key' => 'EGNS_TOUR_META_ID', 'value' => $tr_location, 'compare' => 'LIKE')) : null;
        }
        // Skip from search 
        // if (!empty($tr_inOut)) {
        //     $tr_inOut ? array_push($meta_query_array, array('key' => 'EGNS_TOUR_META_ID', 'value' => $strdate, 'compare' => 'LIKE')) : null;
        // }
        if (!empty($tr_destination)) {
            $tr_destination ? array_push($meta_query_array, array('key' => 'EGNS_TOUR_META_ID', 'value' => $tr_destination, 'compare' => 'LIKE')) : null;
        }

        // final meta_query
        $query->set('meta_query', $meta_query_array);



        // Start Taxonomy Query 
        $tax_query_array = array('relation' => 'AND');

        if (!empty($tr_types)) {
            $tr_types ? array_push($tax_query_array, array('taxonomy' => 'tour-type', 'field' => 'name', 'terms' => $tr_types)) : null;
        }

        // final tax_query
        $query->set('tax_query', $tax_query_array);
    }


    // Search post hotel
    if ($query->is_post_type_archive('hotel') && $query->is_main_query() && !is_admin()) {

        $ht_location       = get_query_var('ht_location');
        $ht_checkInOutdate = get_query_var('ht_checkInOutdate');
        $checkIn           = explode(' - ', $ht_checkInOutdate);
        $date              = date_i18n("m/d/Y", strtotime($checkIn[0]));

        $ht_daterange      = get_query_var('ht_daterange');
        $daterangecheckIn  = explode(' - ', $ht_daterange);
        $daterangedate     = date_i18n("m/d/Y", strtotime($daterangecheckIn[0]));

        // Start Meta Query
        $meta_query_array = array('relation' => 'AND');

        // Skip from search 
        // if (!empty($ht_checkInOutdate)) {
        //     $ht_checkInOutdate ? array_push($meta_query_array, array('key' => 'EGNS_HOTEL_META_ID', 'value' => $date, 'compare' => 'LIKE')) : null;
        // }
        // Skip from search 
        // if (!empty($ht_daterange)) {
        //     $ht_daterange ? array_push($meta_query_array, array('key' => 'EGNS_HOTEL_META_ID', 'value' => $daterangedate, 'compare' => 'LIKE')) : null;
        // }

        // final meta_query
        $query->set('meta_query', $meta_query_array);


        // Start Taxonomy Query 
        $tax_query_array = array('relation' => 'AND');

        if (!empty($ht_location)) {
            $ht_location ? array_push($tax_query_array, array('taxonomy' => 'hotel-location', 'field' => 'name', 'terms' => $ht_location)) : null;
        }

        // final tax_query
        $query->set('tax_query', $tax_query_array);
    }


    // Search post experience
    if ($query->is_post_type_archive('experience') && $query->is_main_query() && !is_admin()) {

        $exp_destination = get_query_var('exp_destination');
        $exp_category    = get_query_var('exp_category');
        $exp_inOut        = get_query_var('inOut');
        $expdate         = date_i18n("m/d/Y", strtotime($exp_inOut));

        // Start Meta Query
        $meta_query_array = array('relation' => 'AND');

        if (!empty($exp_destination)) {
            $exp_destination ? array_push($meta_query_array, array('key' => 'EGNS_EXPERIENCE_META_ID', 'value' => $exp_destination, 'compare' => 'LIKE')) : null;
        }
        // Skip from search 
        // if (!empty($exp_inOut)) {
        //     $exp_inOut ? array_push($meta_query_array, array('key' => 'EGNS_EXPERIENCE_META_ID', 'value' => $expdate, 'compare' => 'LIKE')) : null;
        // }

        // final meta_query
        $query->set('meta_query', $meta_query_array);


        // Start Taxonomy Query 
        $tax_query_array = array('relation' => 'AND');

        if (!empty($exp_category)) {
            $exp_category ? array_push($tax_query_array, array('taxonomy' => 'experience-category', 'field' => 'name', 'terms' => $exp_category)) : null;
        }

        // final tax_query
        $query->set('tax_query', $tax_query_array);
    }
    // End 


}
add_action('pre_get_posts', 'egns_search_filter_query');
