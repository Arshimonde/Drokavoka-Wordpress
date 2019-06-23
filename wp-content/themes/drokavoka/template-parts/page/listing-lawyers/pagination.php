<nav aria-label="" class="add_top_20">
    <?php
    $total_user = $user_query->total_users;  
    $total_pages=ceil($total_user/$no);
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $url_params_regex = '/\?.*?$/';
    preg_match($url_params_regex, get_pagenum_link(), $url_params);
    $base   = !empty($url_params[0]) ? preg_replace($url_params_regex, '', get_pagenum_link()).'%_%/'.$url_params[0] : get_pagenum_link().'%_%';
    $format = 'page/%#%';
    echo paginate_links(array(  
        'base' => $base,  
        'format' => $format,  
        'current' => $paged,  
        'total' => $total_pages,  
        'prev_text' => __('Précedant'),  
        'next_text' => __('Suivant'),
        'type'     => 'list',
        'prev_next' => true
    )); 
    ?>
</nav>
<!-- /pagination -->