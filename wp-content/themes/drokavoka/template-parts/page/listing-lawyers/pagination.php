<nav aria-label="" class="add_top_20">
    <?php
    $total_user = $user_query->total_users;  
    $total_pages=ceil($total_user/$no);
    echo paginate_links(array(  
        'base' => get_pagenum_link(1) . '%_%',  
        'format' => '?paged=%#%',  
        'current' => $paged,  
        'total' => $total_pages,  
        'prev_text' => __('Précedant'),  
        'next_text' => __('Suivant'),
        'type'     => 'list',
        )); 
    ?>
</nav>
<!-- /pagination -->