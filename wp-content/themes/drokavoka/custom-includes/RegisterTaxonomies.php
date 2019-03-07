<?php

    // Register Specialties Taxonomy START
    add_action( 'init', 'create_lawyers_specialties_taxonomy');
 
    function create_lawyers_specialties_taxonomy() {
        $labels = array(
            'name' => _x( 'Spécialité d\'avocat', 'taxonomy general name' ),
            'singular_name' => _x( 'Spécialité d\'avocat', 'taxonomy singular name' ),
            'search_items' =>  __( 'Rechercher la spécialité' ),
            'all_items' => __( 'Tout Les Spécialités' ),
            'parent_item' => __( 'La Spécialité mére' ),
            'parent_item_colon' => __( 'La Spécialité:' ),
            'edit_item' => __( 'Modifier La Spécialité' ), 
            'update_item' => __( 'Mettre à jour La Spécialité' ),
            'add_new_item' => __( 'Ajouter La Spécialité' ),
            'new_item_name' => __( 'Nouveau spécialité' ),
            'menu_name' => __( 'Spécialités' ),
        );    
        
        register_taxonomy('lawyer_specialte','user', array(
            'hierarchical' => true,
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'lawyer_specialte' ),
        ));
        
    }
    
    add_action( 'admin_menu', 'add_avocat_specialite_admin_page' );

    function add_avocat_specialite_admin_page() {
        $taxonomy = get_taxonomy( "lawyer_specialte" );
        add_users_page(
            esc_attr( $taxonomy->labels->menu_name ),//page title
            esc_attr( $taxonomy->labels->menu_name ),//menu title
            $taxonomy->cap->manage_terms,//capability
            'edit-tags.php?taxonomy=' . $taxonomy->name//menu slug
        );
    }

    function add_lawyer_specialte_columns($columns){
        $columns['image'] = 'Image';
        
        return $columns;
    }
    add_filter('manage_edit-lawyer_specialte_columns', 'add_lawyer_specialte_columns');
    
    function add_lawyer_specialte_content($content){
        $content = 'test';
        return $content;
    }
    add_filter('manage_lawyer_specialte_custom_column', 'add_lawyer_specialte_content');
    // Register Specialties Taxonomy END


?>