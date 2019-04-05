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
        
        register_taxonomy('lawyer_specialte','post', array(
            'hierarchical' => true,
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'lawyer_specialte' ),
        ));
        
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

    // REGISTER CITY TAXONOMY 
    add_action( 'init', 'register_city_taxonomy');
    function register_city_taxonomy() {
        $labels = array(
            'name' => _x( 'Villes', 'taxonomy general name' ),
            'singular_name' => _x( 'Ville', 'taxonomy singular name' ),
            'search_items' =>  __( 'Rechercher la ville' ),
            'all_items' => __( 'Tout Les Villes' ),
            'edit_item' => __( 'Modifier La ville' ), 
            'update_item' => __( 'Mettre à jour La ville' ),
            'add_new_item' => __( 'Ajouter une ville' ),
            'new_item_name' => __( 'Nouveau ville' ),
            'menu_name' => __( 'Villes' ),
        );    
        
        register_taxonomy('cities','post', array(
            'hierarchical' => false,
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'cities' ),
        ));
        
    }
    	
    // REGISTER CITY TAXONOMY END 
?>