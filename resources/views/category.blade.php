@extends('layouts.app')

@section('content')

@php
$term = get_queried_object();
$categories = get_categories();

$category_header = get_field('category_header', $term);
$category_description = get_field('category_description', $term);
$category_image = get_field('category_image', $term);

$bottom = get_field('bottom', 'option');

// Pobranie pól ACF dla sekcji 'bottom'
$section_id = $bottom['section_id'] ?? '';
$section_class = $bottom['section_class'] ?? '';
$flip = $bottom['flip'] ?? false;

// Przygotowanie klas CSS
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';

// Wygenerowanie unikalnego ID dla SVG
$unique_id = 'clip_'.uniqid();
@endphp

<div class="hero category-header relative overflow-hidden">
	<img class="absolute z-1 opacity-30 top-1/2 -translate-y-1/2 right-[5%]" src="{{ get_template_directory_uri() }}/resources/images/glow-shape.svg" />
	<div class="absolute inset-0 bg-primary"></div>

	<div data-gsap-element="bread" class="__breadcrumb mb-4">
		@if (function_exists('yoast_breadcrumb'))
		{!! yoast_breadcrumb('<p id="breadcrumbs">','</p>') !!}
		@endif
	</div>
	<div class="__wrapper c-main relative z-10 pt-60 pb-26">
		<div class="__content w-full md:w-2/3">
			<h2 class="text-white m-header">
				{!! $category_header ?: get_the_archive_title() !!}
			</h2>
			@if ($category_description)
			<div class="text-white text-xl md:text-2xl">
				{!! $category_description !!}
			</div>
			@endif
		</div>
		<div id="category-tabs" class="category-tabs z-20 relative mt-4">
			<div class="flex flex-wrap gap-2 items-center">
				<p class="text-white">Filtruj według kategorii:</p>
				<div class="flex flex-wrap gap-2 items-center">
					<a href="/category/baza-wiedzy" @class(['__tab flex-shrink-0 block rounded-full px-4 py-2', 'bg-white'=> is_category('baza-wiedzy'), 'bg-white/50' => !is_category('baza-wiedzy')])>Baza wiedzy</a>
					@foreach($categories as $category)
					@if($category->name !== 'Baza wiedzy')
					@php $isActive = $term && $term->term_id === $category->term_id; @endphp
					<a href="{{ get_category_link($category->term_id) }}" @class(['__tab flex-shrink-0 block rounded-full px-4 py-2', 'bg-white'=> $isActive, 'bg-white/50' => !$isActive])>{{ $category->name }}</a>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
</div>

</div>



@php
// Znajdź featured post: najnowszy przypięty w tej kategorii lub pierwszy z queried posts
$featured_post = null;
$sticky_ids = get_option('sticky_posts', []);
$is_first_page = get_query_var('paged') <= 1;

	if ($is_first_page && !empty($sticky_ids)) {
	$sticky_args=[ 'post__in'=> $sticky_ids,
	'posts_per_page' => 1,
	'orderby' => 'date',
	'order' => 'DESC',
	'post_status' => 'publish',
	];
	if ($term && isset($term->term_id)) {
	$sticky_args['cat'] = $term->term_id;
	}
	$sticky_q = new WP_Query($sticky_args);
	if ($sticky_q->have_posts()) {
	$featured_post = $sticky_q->posts[0];
	}
	}

	if ($is_first_page && !$featured_post && !empty($wp_query->posts)) {
	$featured_post = $wp_query->posts[0];
	}

	$featured_id = $featured_post ? $featured_post->ID : null;
	@endphp

	@if ($featured_post && $is_first_page)
	<div class="c-main relative z-10 !-mt-14">
		<a href="{{ get_permalink($featured_post->ID) }}" class="group flex flex-col md:flex-row items-center gap-6 md:gap-10 bg-white radius shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden relative p-6 md:p-10">
			@if (has_post_thumbnail($featured_post->ID))
			<div class="md:w-1/2">
				<x-picture
					:image="get_post_thumbnail_id($featured_post->ID)"
					figure-class="h-full m-0"
					class="w-full h-full object-cover radius-img" />
			</div>
			@endif
			<div class="flex flex-col md:w-1/2">
				@php
				$_fcats = get_the_terms($featured_post->ID, 'category') ?: [];
				$_fexcluded = ['baza-wiedzy', 'uncategorized'];
				$_fcats_filtered = array_filter($_fcats, fn($_c) => !in_array($_c->slug, $_fexcluded));
				@endphp
				@if (!empty($_fcats_filtered))
				<div class="flex gap-2 flex-wrap mb-3">
					@foreach ($_fcats_filtered as $_c)
					<p class="text-xs font-semibold text-primary bg-primary-lighter/20 rounded-full px-4 py-2">{{ $_c->name }}</p>
					@endforeach
				</div>
				@endif
				<h3 class="text-h6 md:text-h3 text-primary line-clamp-3 mb-4">{{ get_the_title($featured_post->ID) }}</h3>
				<div class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-secondary group-hover:bg-secondary-hover transition-colors self-start">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#60102E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<path d="M7 17L17 7" />
						<path d="M7 7h10v10" />
					</svg>
				</div>
			</div>
		</a>
	</div>
	@endif

	@if (have_posts())
	<div class="__posts c-main !mt-10 posts grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
		@while (have_posts())
		@php the_post(); @endphp
		@if (get_the_ID() !== $featured_id)
		@includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
		@endif
		@endwhile
	</div>

	{{-- {!! get_the_posts_navigation() !!} --}}
	{!! the_posts_pagination() !!}
	@else
	<div class="mt-20 mb-20">
		<div class="c-main">
			<h3 class="">Brak wpisów w tej kategorii.</h3>
			<a class="main-btn m-btn" href="/wszystkie-wpisy/">Sprawdź wszystkie wpisy</a>
		</div>
	</div>
	@endif

	<!-- bottom-block -->
	@php
	$g_obottom = get_field('g_obottom', 'option');
	$form = true;
	$sectionClass = '';
	$section_id = '';
	$section_class = '';
	$background = 'none';
	@endphp
	@include('blocks.bottom')

	@endsection