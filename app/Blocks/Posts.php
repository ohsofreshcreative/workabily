<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class Posts extends Block
{
	public $name = 'Baza wiedzy - Ostatnie wpisy';
	public $description = 'posts';
	public $slug = 'posts';
	public $category = 'formatting';
	public $icon = 'admin-post';
	public $keywords = ['posts', 'category', 'wpisy', 'kategoria'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => true,
		'jsx' => true,
	];

	public function fields()
	{
		$posts = new FieldsBuilder('posts');

		$posts
			->setLocation('block', '==', 'acf/posts') // ważne!
			/*--- FIELDS ---*/
			->addTab('Treści', ['placement' => 'top'])
			->addGroup('posts_settings', ['label' => ''])

			->addText('title', ['label' => 'Tytuł'])
			->addTextarea('text', [
				'label' => 'Opis',
				'rows' => 2,
				'new_lines' => 'br',
			])

			->addLink('button', [
				'label' => 'Przycisk',
				'return_format' => 'array',
			])

			->addTrueFalse('show_image', [
				'label' => 'Pokaż obrazek',
				'default_value' => 1,
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])

			->addTrueFalse('show_excerpt', [
				'label' => 'Pokaż fragment treści',
				'default_value' => 0,
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])

			->endGroup()

			/*--- USTAWIENIA BLOKU ---*/

			->addTab('Ustawienia bloku', ['placement' => 'top'])
			->addText('section_id', [
				'label' => 'ID',
			])
			->addText('section_class', [
				'label' => 'Dodatkowe klasy CSS',
			])
			->addTrueFalse('nolist', [
				'label' => 'Brak punktatorów',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('flip', [
				'label' => 'Odwrotna kolejność',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('wide', [
				'label' => 'Szeroka kolumna',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('nomt', [
				'label' => 'Usunięcie marginesu górnego',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('gap', [
				'label' => 'Większy odstęp',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addSelect('background', [
				'label' => 'Kolor tła',
				'choices' => [
					'none' => 'Brak (domyślne)',
					'section-white' => 'Białe',
					'section-light' => 'Jasne',
					'section-gray' => 'Szare',
					'section-brand' => 'Marki',
					'section-gradient' => 'Gradient',
					'section-dark' => 'Ciemne',
				],
				'default_value' => 'none',
				'ui' => 0, // Ulepszony interfejs
				'allow_null' => 0,
			]);

		return $posts;
	}

	public function with()
	{
		$posts_settings = get_field('posts_settings');
		$show_image = $posts_settings['show_image'] ?? true;
		$show_excerpt = $posts_settings['show_excerpt'] ?? false;

		$args = [
			'post_type'           => 'post',
			'posts_per_page'      => 2,
			'post_status'         => 'publish',
			'orderby'             => 'date',
			'order'               => 'DESC',
			'ignore_sticky_posts' => 1,
		];

		$query = new \WP_Query($args);
		$posts = $query->posts;

		$fields = [
			'posts_settings' => $posts_settings,
			'posts'          => $posts,
			'show_image'     => $show_image,
			'show_excerpt'   => $show_excerpt,

			'section_id'    => get_field('section_id'),
			'section_class' => get_field('section_class'),

			'flip'   => (bool) get_field('flip'),
			'wide'   => (bool) get_field('wide'),
			'nomt'   => (bool) get_field('nomt'),
			'gap'    => (bool) get_field('gap'),
			'nolist' => (bool) get_field('nolist'),

			'background' => get_field('background') ?: 'none',
		];

		$fields['sectionClass'] = SectionClasses::fromMap($fields, [
			'flip'   => 'order-flip',
			'wide'   => 'wide',
			'nomt'   => '!mt-0',
			'gap'    => 'wider-gap',
			'nolist' => 'no-list',
		]);

		return $fields;
	}
}
