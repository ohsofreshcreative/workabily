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
		<div class="__wrapper c-main relative z-10 pt-50 pb-26">
			<div class="__inside w-full md:w-1/2">
				<h1 data-gsap-element="header" class="text-white">{{ $g_aboutus['header'] }}</h1>
				<div data-gsap-element="txt" class="__txt m-header text-lg text-white">
					{!! $g_aboutus['text'] !!}
				</div>
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
				figure-class="radius-img overflow-hidden !h-104"
				class="w-full !h-104 object-cover" />
			@endif
		</div>
		@endforeach
	</div>
	@endif

</section>