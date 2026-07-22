<!--- checks -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-checks relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main relative">
		<h2 data-gsap-element="header" class="__header w-full md:w-1/2">{{ $g_checks['header'] }}</h2>

		<div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-8 lg:gap-20 mt-4">

			<div class="__content h-full flex flex-col justify-between gap-6">
				<div data-gsap-element="txt" class="__txt mt-4">
					{!! $g_checks['text'] !!}
				</div>
				@if (!empty($g_checks['image']))
				<x-picture
					:image="$g_checks['image']"
					class="__img object-cover h-full radius-img h-full object-cover"
					figure-class="order1 img-md"
					data-gsap-element="img" />
				@endif
			</div>

			<div class="grid gap-6">
				@foreach ($r_checks ?? [] as $item)
				<div data-gsap-element="card" class="__card relative flex items-start gap-8">
					<img class="w-6 mt-2" src="{{ get_template_directory_uri() }}/resources/images/check.svg" />
					<div>
						@if (!empty($item['title']))
						<p class="text-h6">{{ $item['title'] }}</p>
						@endif
						@if (!empty($item['text']))
						<p>{{ $item['text'] }}</p>
						@endif
					</div>
				</div>
				@endforeach
			</div>

		</div>

</section>