<!--- team --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-team relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main">
		<div class="__top">
			<h2 data-gsap-element="header" class="m-header __header">{{ strip_tags($g_team['header']) }}</h2>
			<p data-gsap-element="text">{{ $g_team['text'] }}</p>
		</div>

		@if (!empty($r_team))
		@php
		$itemCount = count($r_team);
		$gridCols = 1;
		if ($itemCount == 2) $gridCols = 2;
		if ($itemCount == 3) $gridCols = 3;
		if ($itemCount >= 4) $gridCols = 4; // Twój dotychczasowy warunek
		$gridClass = $gridCols > 1 ? 'grid-cols-1 lg:grid-cols-' . $gridCols : 'grid-cols-1';
		@endphp

		<div class="grid {{ $gridClass }} gap-8 mt-10">
			@foreach ($r_team as $item)
			<div data-gsap-element="card" class="__card relative ">
				@if (!empty($item['image']))
				<x-picture
					:image="$item['image']"
					figure-class="mb-6 overflow-hidden radius-img h-104"
					class="w-full h-full object-cover"
				/>
				@endif
				@if (!empty($item['title']))
				<p class="text-h6">{{ $item['title'] }}</p>
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