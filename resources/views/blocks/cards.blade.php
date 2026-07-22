<!--- cards --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-cards relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main">
		<div class="__top w-full md:w-1/2">
			<h2 data-gsap-element="header" class="__header">{{ strip_tags($g_cards['header']) }}</h2>
			<p data-gsap-element="text" class="m-header">{{ $g_cards['text'] }}</p>
		</div>

		@if (!empty($r_cards))
		@php
		$itemCount = count($r_cards);
		$gridCols = 1;
		if ($itemCount == 2) $gridCols = 2;
		if ($itemCount == 3) $gridCols = 3;
		if ($itemCount >= 4) $gridCols = 4; // Twój dotychczasowy warunek
		$gridClass = $gridCols > 1 ? 'grid-cols-1 lg:grid-cols-' . $gridCols : 'grid-cols-1';
		@endphp

		<div class="grid {{ $gridClass }} gap-8 mt-10">
			@foreach ($r_cards as $item)
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