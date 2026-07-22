<?php

/*--- CPT - Oferty ---*/

add_action('init', function () {
	register_post_type('offer', [
		'label'         => 'Oferty',
		'labels'        => [
			'name'               => 'Oferty',
			'singular_name'      => 'Oferta',
			'menu_name'          => 'Oferty',
			'all_items'          => 'Wszystkie oferty',
			'add_new'            => 'Dodaj nową',
			'add_new_item'       => 'Dodaj nową ofertę',
			'edit_item'          => 'Edytuj ofertę',
			'new_item'           => 'Nowa oferta',
			'view_item'          => 'Zobacz ofertę',
			'view_items'         => 'Zobacz oferty',
			'search_items'       => 'Szukaj ofert',
			'not_found'          => 'Nie znaleziono ofert',
			'not_found_in_trash' => 'Brak ofert w koszu',
			'parent_item_colon'  => 'Oferta nadrzędna:',
		],
		'public'        => true,
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-cart',
		'menu_position' => 20,
		'supports'      => ['title', 'editor', 'thumbnail', 'excerpt'],
		'show_in_rest'  => true,
		'rewrite'       => ['slug' => 'offer', 'with_front' => false],
	]);
});

add_action('init', function () {
	register_taxonomy('offer_category', ['offer'], [
		'label'        => 'Kategorie ofert',
		'labels'       => [
			'name'              => 'Kategorie ofert',
			'singular_name'     => 'Kategoria oferty',
			'search_items'      => 'Szukaj kategorii',
			'all_items'         => 'Wszystkie kategorie',
			'parent_item'       => 'Kategoria nadrzędna',
			'parent_item_colon' => 'Kategoria nadrzędna:',
			'edit_item'         => 'Edytuj kategorię',
			'update_item'       => 'Aktualizuj kategorię',
			'add_new_item'      => 'Dodaj nową kategorię',
			'new_item_name'     => 'Nazwa nowej kategorii',
			'menu_name'         => 'Kategorie',
		],
		'hierarchical' => true,
		'public'       => true,
		'show_in_rest' => true,
		'rewrite'      => ['slug' => 'kategoria-oferty', 'with_front' => false],
	]);
});
