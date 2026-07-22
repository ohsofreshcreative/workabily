<!--- proces --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-proces relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper bg-primary">
		<img class="absolute z-0 top-0 left-1/2 -translate-x-1/2" src="{{ get_template_directory_uri() }}/resources/images/net.png" alt="" aria-hidden="true" />
		<div class="__inside c-main pt-28 pb-100">
			<div class="">
				<div class="__top">
					@if (!empty($g_proces['title']))
					<p data-gsap-element="title" class="text-primary-lighter bg-primary-light rounded-full w-max px-6 py-2">{{ strip_tags($g_proces['title']) }}</p>
					@endif
					@if (!empty($g_proces['header']))
					<h3 data-gsap-element="header" class="__header-top text-white mt-14">{{ strip_tags($g_proces['header']) }}</h3>
					@endif
					<div data-gsap-element="txt" class="m-header text-white">{{ strip_tags($g_proces['txt']) }}</div>
				</div>
			</div>
			@if (!empty($r_proces))
			@php
			$repeater_count = count($r_proces);
			$grid_class = 'lg:grid-cols-4'; // Domyślna klasa
			if ($repeater_count === 3) {
			$grid_class = 'lg:grid-cols-3';
			}
			@endphp
			<div class="__repeater gap-8 grid grid-cols-1 md:grid-cols-2 {{ $grid_class }} mt-16">
				@foreach ($r_proces as $item)
				<div data-gsap-element="stagger" class="flex flex-col">
					<div class="relative z-20">
						<div class="flex items-center justify-center text-h6 bg-white text-primary text-center w-8 h-8 rounded-lg border-2 border-primary-lighter">{{ $item['number'] }}</div>
						<div class="relative my-4">
							<div class="w-full h-px bg-primary-lighter"></div>
							<div class="absolute -top-[1px] left-0 w-1/3 h-[3px] bg-primary-light"></div>
						</div>
						@if (!empty($item['image']['url']))
						<figure class="m-0">
							<picture>
								<img class="" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
							</picture>
						</figure>
						@endif
						<p class="text-h6 text-white mt-4">{{ $item['title'] }}</p>
						<div class="text-white mt-2">{!! $item['txt'] !!}</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="__line absolute bg-primary z-0 origin-left scale-x-0"></div>
			@endif
		</div>
	</div>

	<div class="__wrapper -mt-76">
		<div class="__inside c-main">
			<div data-gsap-element="card" class="__card relative overflow-hidden text-center bg-white radius-m p-8 pt-76 md:p-24 md:pt-76">
				@if (!empty($g_proces2['image']['url']))
				<figure class="absolute inset-0 m-0">
					<picture>
						<source media="(min-width: 1280px)" srcset="{{ $g_proces2['image']['sizes']['img-xl'] ?? $g_proces2['image']['url'] }}">
						<source media="(min-width: 1024px)" srcset="{{ $g_proces2['image']['sizes']['img-lg'] ?? $g_proces2['image']['url'] }}">
						<source media="(min-width: 768px)" srcset="{{ $g_proces2['image']['sizes']['img-md'] ?? $g_proces2['image']['url'] }}">
						<img class="w-full h-full object-cover" src="{{ $g_proces2['image']['sizes']['img-sm'] ?? $g_proces2['image']['url'] }}" alt="{{ $g_proces2['image']['alt'] ?? '' }}" />
					</picture>
				</figure>
				<div class="absolute inset-0 z-1 pointer-events-none" style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.0) 0%, rgba(0, 0, 0, 0.48) 80%);"></div>
				@endif
				@if (!empty($g_proces2['header']))
				<p class="relative z-10 text-h4 text-white">{{ $g_proces2['header'] }}</p>
				@endif
				@if (!empty($g_proces2['button1']))
				<x-button
					:href="$g_proces2['button1']['url']"
					variant="white"
					class="relative !flex justify-center items-center gap-4 z-10 m-btn after:absolute after:inset-0 after:content-[''] mx-auto !px-10 !py-4">
					{{ $g_proces2['button1']['title'] }}
					<img src="{{ get_template_directory_uri() }}/resources/images/smile.svg" />
				</x-button>
				@endif
			</div>
		</div>
	</div>

</section>