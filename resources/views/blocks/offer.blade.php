<!--- offer --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-offer relative -smt z-20' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main">
		<div class="__top">
			<h2 data-gsap-element="header" class="m-header">{{ strip_tags($g_offer['header']) }}</h2>
			<p data-gsap-element="text">{{ $g_offer['text'] }}</p>
		</div>

		<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
			@foreach ($r_offer as $item)
			<div data-gsap-element="card" class="__card relative overflow-hidden bg-white radius-m p-12 pt-76">
				@if (!empty($item['image']['url']))
				<x-picture
					:image="$item['image']"
					figure-class="absolute inset-0 m-0"
					class="w-full h-full object-cover"
				/>
				<div class="absolute inset-0 z-1 pointer-events-none" style="background: linear-gradient(180deg, rgba(96, 16, 46, 0.0) 0%, rgba(96, 16, 46) 80%);"></div>
				@endif
				@if (!empty($item['title']))
				<p class="relative z-10 text-h3 text-white">{{ $item['title'] }}</p>
				@endif
				@if (!empty($item['button1']))
				<x-button
					:href="$item['button1']['url']"
					variant="secondary"
					class="relative z-10 m-btn after:absolute after:inset-0 after:content-['']">
					{{ $item['button1']['title'] }}
				</x-button>
				@endif
			</div>
			@endforeach
		</div>

	</div>

</section>