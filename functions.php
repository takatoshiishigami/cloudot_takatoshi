<?php 

/* カスタム投稿タイプ */
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'books', /* post-type */
		array(
			'labels' => array(
			'name' => __( '本' ),
			'singular_name' => __( '本' )
		),
		'public' => true,
		'menu_position' =>5,
    'has_archive' => true,
    'rewrite' => array('slug' => '本'),
    'supports' => array('title','editor','thumbnail',
                        'excerpt','author',
                        'comments','revisions')
    )
	);
}

   
//カスタムタクソノミー、カテゴリタイプ
  register_taxonomy(
    'bookcat', 
    'books', 
    array(
      'hierarchical' => true, 
      'update_count_callback' => '_update_post_term_count',
      'label' => '本のカテゴリー',
      'singular_label' => '本１',
      'public' => true,
      'show_ui' => true
    )
  );

?>