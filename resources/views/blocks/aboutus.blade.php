<!--- aboutus -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-aboutus relative ' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="bg-primary overflow-hidden relative z-10">
		<img class="absolute z-1 opacity-30 top-1/2 -translate-y-1/2 right-[5%]" src="{{ get_template_directory_uri() }}/resources/images/glow-shape.svg" />
		<div class="__wrapper c-main relative grid grid-cols-1 md:grid-cols-2 items-end gap-10 z-10 pt-50 pb-26">
			<div class="__inside">
				<h1 data-gsap-element="header" class="text-white">{{ $g_aboutus['header'] }}</h1>
				<div data-gsap-element="txt" class="__txt m-header text-lg text-white">
					{!! $g_aboutus['text'] !!}
				</div>
			</div>
			<div class="__title">
				<h5 data-gsap-element="title" class="__header text-white">{{ $g_aboutus['title'] }}</h5>
			</div>
		</div>
	</div>

	@if (!empty($r_aboutus))
	<div class="c-main relative grid grid-cols-1 md:grid-cols-4 gap-8 z-20 !-mt-16">
		@foreach ($r_aboutus as $item)
		<div data-gsap-element="card" class="__card relative">
			@if (!empty($item['image']))
			<x-picture
				:image="$item['image']"
				figure-class="mb-6 radius-img overflow-hidden !h-104"
				class="w-full !h-104 object-cover object-top" />
			@endif
			@if (!empty($item['title']))
			<p class="text-h6 text-primary">{{ $item['title'] }}</p>
			@endif
		</div>
		@endforeach
	</div>
	@endif

</section>