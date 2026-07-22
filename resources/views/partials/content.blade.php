<article class="{{ implode(' ', get_post_class('__card h-full')) }}">

	<div class="group relative bg-white radius shadow-sm hover:shadow-md transition-all duration-300 flex flex-col gap-6 text-left h-full overflow-hidden p-6 md:p-10">

		@if (has_post_thumbnail())
		<x-picture
			:image="get_post_thumbnail_id()"
			figure-class="m-0 aspect-video overflow-hidden flex-shrink-0"
			class="w-full h-full object-cover radius-img" />
		@endif

		<div class="flex flex-col flex-1">
			@php
				$_cats = get_the_terms(get_the_ID(), 'category') ?: [];
				$_excluded = ['baza-wiedzy', 'uncategorized'];
				$post_cats = array_filter($_cats, fn($_c) => !in_array($_c->slug, $_excluded));
			@endphp
			@if (!empty($post_cats))
			<div class="flex gap-2 flex-wrap mb-3">
				@foreach ($post_cats as $_c)
				<p class="text-xs font-semibold text-primary bg-primary-lighter/20 rounded-full px-4 py-2">{{ $_c->name }}</p>
				@endforeach
			</div>
			@endif
			<h6 class="text-primary mb-4 {{ !empty($post_cats) ? '' : 'mt-6' }} line-clamp-2">
				{{ get_the_title() }}
			</h6>

			<a href="{{ get_permalink() }}" class="mt-auto inline-flex items-center justify-center w-11 h-11 rounded-full bg-secondary group-hover:bg-secondary-hover transition-colors after:absolute after:inset-0 after:z-10">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#60102E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<path d="M7 17L17 7"/>
					<path d="M7 7h10v10"/>
				</svg>
			</a>
		</div>

	</div>
</article>
