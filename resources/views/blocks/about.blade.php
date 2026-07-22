<!--- about -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-about relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<img class="absolute z-1 opacity-30 top-1/2 -translate-y-1/2 left-0" src="{{ get_template_directory_uri() }}/resources/images/bg-shape.svg" />

	<div class="__wrapper c-main relative z-10">
	
		<div class="__col grid grid-cols-1 lg:grid-cols-[1fr_2fr] items-center gap-8 lg:gap-20">
			@if (!empty($g_about['image']))
			<x-picture
				:image="$g_about['image']"
				class="__img object-cover h-full radius-img h-full object-cover"
				figure-class="order1 h-full"
				data-gsap-element="img" />
			@endif

			<div class="__content order2">
				<div class="grid grid-cols-1 md:grid-cols-2 items-center">
					<div class="__txt order2">
						<h2 data-gsap-element="header" class="text-h4">{{ $g_about['header'] }}</h2>
						<div data-gsap-element="txt" class="__txt mt-4">
							{!! $g_about['text'] !!}
						</div>
					</div>
					@if (!empty($g_about['video']))
					<figure data-gsap-element="img" class="__video order1 m-0">
						<video
							src="{{ $g_about['video'] }}"
							autoplay muted loop playsinline>
						</video>
					</figure>
					@endif
				</div>

				@if (!empty($r_about))
				<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">
					@foreach ($r_about as $item)
					<div data-gsap-element="card" class="__card relative">
						@if (!empty($item['image']['url']))
						<img class="mb-6" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
						@endif
						@if (!empty($item['title']))
						<p class="text-h1 text-primary border-b border-primary mb-4">{{ $item['title'] }}</p>
						@endif
						@if (!empty($item['text']))
						<p>{{ $item['text'] }}</p>
						@endif
					</div>
					@endforeach
				</div>
				@endif
			</div>

		</div>

		@if (!empty($r_about2))
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-10">
			@foreach ($r_about2 as $item)
			<div data-gsap-element="card" class="__card relative bg-white shadow-xl shadow-primary/5 hover:shadow-primary/15 transition-shadow duration-300 radius p-8">
				@if (!empty($item['image']['url']))
				<img class="bg-primary w-8 h-8 rounded-lg border-2 border-primary-lighter mb-6 p-1" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
				@endif
				@if (!empty($item['title']))
				<p class="text-h7 text-primary">{{ $item['title'] }}</p>
				@endif
				@if (!empty($item['text']))
				<p>{{ $item['text'] }}</p>
				@endif
			</div>
			@endforeach
		</div>
		@endif
	</div>

</section>