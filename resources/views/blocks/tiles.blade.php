<!--- tiles --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-tiles relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main">
		<div class="__top">
			<h2 data-gsap-element="header" class="m-header __header">{{ strip_tags($g_tiles['header']) }}</h2>
			<p data-gsap-element="text">{{ $g_tiles['text'] }}</p>
		</div>

		<div class="grid grid-cols-1 lg:grid-cols-4 gap-8 mt-10">

			{{-- Rząd 1: Kafelek | Kafelek | IMAGE1 --}}
			@foreach (array_slice($r_tiles ?? [], 0, 2) as $item)
			<div data-gsap-element="card" class="__card relative bg-white radius-s p-8 {{ $loop->index === 0 ? 'order-2' : 'order-3' }} lg:order-[0]">
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

			@if (!empty($g_tiles['image1']))
			<div class="order-1 lg:order-[0] lg:col-span-2">
				<x-picture
					:image="$g_tiles['image1']"
					figure-class="img-m overflow-hidden radius-img"
					class="w-full h-full object-cover"
					data-gsap-element="img" />
			</div>
			@endif

			{{-- Rząd 2: IMAGE2 | Kafelek | Kafelek --}}
			@if (!empty($g_tiles['image2']))
			<div class="order-4 lg:order-[0] lg:col-span-2">
				<x-picture
					:image="$g_tiles['image2']"
					figure-class="img-m overflow-hidden radius-img"
					class="w-full h-full object-cover"
					data-gsap-element="img" />
			</div>
			@endif

			@foreach (array_slice($r_tiles ?? [], 2, 2) as $item)
			<div data-gsap-element="card" class="__card relative bg-white radius-s p-8 {{ $loop->index === 0 ? 'order-5' : 'order-6' }} lg:order-[0]">
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

	</div>

</section>