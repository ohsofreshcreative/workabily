<!-- hero --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-hero relative -spt overflow-visible' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	@if (!empty($g_hero['video']))
	<video class="absolute inset-0 w-full h-full object-cover z-0" autoplay loop muted playsinline>
		<source src="{{ $g_hero['video'] }}" type="video/mp4">
	</video>
	@elseif(!empty($g_hero['image']))
	<x-picture
		:image="$g_hero['image']"
		figure-class="absolute inset-0 w-full h-full z-0 m-0"
		class="w-full h-full object-cover" />
	@endif

	@if (!empty($g_hero['video']) || !empty($g_hero['image']))
	<div class="absolute inset-0 z-1 pointer-events-none" style="background: linear-gradient(90deg, rgba(96, 16, 46, 0.80) 0%, rgba(96, 16, 46, 0.80) 100%);"></div>
	@endif

	<img class="absolute z-10 w-full h-full opacity-70 top-0 left-0" src="{{ get_template_directory_uri() }}/resources/images/big-shape.svg" />

	<div class=" __wrapper c-main relative z-10">
		<div class="__content relative flex flex-col justify-center w-full md:w-10/12 lg:w-8/12 z-20 pt-10 pb-10 md:pt-48 md:pb-62 mx-auto">
			<h1 data-gsap-element="header" class="text-h2 text-white text-center">
				{{ $g_hero['title'] }}
			</h1>
			@if (!empty($g_hero['text']))
			<div data-gsap-element="text" class="text-white text-center m-header text-lg">
				{!! $g_hero['text'] !!}
			</div>
			@endif

			<div class="inline-buttons m-btn">
				@if (!empty($g_hero['button1']))
				<x-button
					:href="$g_hero['button1']['url']"
					variant="secondary"
					class=""
					data-gsap-element="btn">
					{{ $g_hero['button1']['title'] }}
				</x-button>
				@endif

				@if (!empty($g_hero['button2']))
				<x-button
					:href="$g_hero['button2']['url']"
					variant="white"
					class=""
					data-gsap-element="btn">
					{{ $g_hero['button2']['title'] }}
				</x-button>
				@endif
			</div>
		</div>
	</div>

</section>