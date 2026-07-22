<!--- posts -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-posts relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="c-main max-w-[1200px] mx-auto px-4">

		<div class="__content max-w-2xl  mb-12">
			<h2 data-gsap-element="title" class="text-primary __header mb-6">{{ $posts_settings['title'] }}</h2>
			@if(!empty($posts_settings['text']))
			<div data-gsap-element="txt" class="mb-8 prose mx-auto">
				{!! $posts_settings['text'] !!}
			</div>
			@endif

			@if (!empty($posts_settings['button']))
			<a data-gsap-element="btn" class="inline-flex items-center text-white rounded-full py-3 px-6 hover:bg-[#1e40af] transition-all duration-300" href="{{ $posts_settings['button']['url'] }}">
				{{ $posts_settings['button']['title'] }}
			</a>
			@endif
		</div>

		<div data-gsap-element="grid-layout" class="__posts-grid relative w-full">
			@if(!empty($posts))
			<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
				@foreach($posts as $post)
				<div class="group relative bg-white radius shadow-sm hover:shadow-md transition-all duration-300 flex flex-col text-left h-full overflow-hidden p-10">

					@if($show_image && has_post_thumbnail($post->ID))
					<x-picture
						:image="get_post_thumbnail_id($post->ID)"
						figure-class="m-0 aspect-video overflow-hidden flex-shrink-0"
						class="w-full h-full object-cover radius-img" />
					@endif

					<div class="flex flex-col flex-1">
						@php
							$_cats = get_the_terms($post->ID, 'category') ?: [];
							$_excluded = ['baza-wiedzy', 'uncategorized'];
							$post_cats = array_filter($_cats, fn($_c) => !in_array($_c->slug, $_excluded));
						@endphp
						@if (!empty($post_cats))
						<div class="flex gap-2 flex-wrap mt-6 mb-1">
							@foreach ($post_cats as $_c)
							<p class="text-xs font-semibold text-primary bg-primary-lighter/20 rounded-full px-4 py-2">{{ $_c->name }}</p>
							@endforeach
						</div>
						@endif
						<h6 class="text-primary mb-4 {{ !empty($post_cats) ? '' : 'mt-6' }} line-clamp-2">
							{{ get_the_title($post->ID) }}
						</h6>

						<a href="{{ get_permalink($post->ID) }}" class="mt-auto inline-flex items-center justify-center w-11 h-11 rounded-full bg-secondary group-hover:bg-secondary-hover transition-colors after:absolute after:inset-0 after:z-10">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#60102E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<path d="M7 17L17 7"/>
								<path d="M7 7h10v10"/>
							</svg>
						</a>
					</div>

				</div>
				@endforeach
			</div>
			@else
			<div class="no-posts bg-white p-6 radius text-center text-gray-400 shadow-sm">
				Brak postów do wyświetlenia.
			</div>
			@endif
		</div>

	</div>
</section>