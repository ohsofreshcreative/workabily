@php
// --- Budowanie klas sekcji ---
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
if (!empty($background) && $background !== 'none') {
$sectionClass .= ' ' . $background;
}

$grouped_tabs = [];
if (!empty($r_tabs)) {
foreach ($r_tabs as $item) {
$tabName = $item['tab'] ?: 'Inne';
if (!isset($grouped_tabs[$tabName])) {
$grouped_tabs[$tabName] = [];
}
$grouped_tabs[$tabName][] = $item;
}
}
@endphp

<!--- tabs --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-tabs relative -smt {{ $sectionClass }} {{ $section_class }}">

	<img class="absolute z-0 w-full h-full opacity-70 top-0 left-0" src="{{ get_template_directory_uri() }}/resources/images/tabs-shape.svg" alt="" aria-hidden="true" />


	<div class="__wrapper c-main relative">
		@if (!empty($g_tabs['header']))
		<div class="mb-10 text-center">
			<h2 data-gsap-element="header" class="__header">{{ $g_tabs['header'] }}</h2>
			@if(!empty($g_tabs['text']))
			<div class="__txt mt-4 max-w-3xl mx-auto">
				{!! $g_tabs['text'] !!}
			</div>
			@endif
		</div>
		@endif

		@if(!empty($grouped_tabs))
		<div x-data="{ activeTab: 0 }" class="__tabs mt-12">
			<div class="flex flex-wrap gap-4 mb-8">
				@foreach ($grouped_tabs as $name => $items)
				<button
					@click="activeTab = {{ $loop->index }}"
					:class="{ 'bg-primary hover:bg-primary-hover text-white cursor-pointer': activeTab === {{ $loop->index }}, 'text-main bg-secondary-lighter hover:bg-secondary-hover border border-secondary cursor-pointer': activeTab !== {{ $loop->index }} }"
					class="text-lg whitespace-nowrap py-4 px-8 rounded-full transition-colors duration-200 focus:outline-none">
					{{ $name }}
				</button>
				@endforeach
			</div>

			<div class="">
				@foreach ($grouped_tabs as $name => $items)
				<div x-show="activeTab === {{ $loop->index }}" x-cloak class="transition-opacity duration-300">
					@foreach ($items as $item)
					<div class="__card bg-secondary-lighter border border-secondary radius grid grid-cols-1 md:grid-cols-[2fr_1fr] section-gap items-center p-6">
						@if(!empty($item['image']))
						<x-picture
							:image="$item['image']"
							figure-class="relative overflow-hidden radius order-1 md:order-2 m-0"
							class="w-full img-xl object-cover"
						/>
						@endif

						<div class="__content relative order-2 md:order-1 ml-0 md:ml-20">
							@if (!empty($item['title']))
							<p class="text-h5 mb-4">{{ $item['title'] }}</p>
							@endif
							@if (!empty($item['text']))
							<div class="m-header">{!! $item['text'] !!}</div>
							@endif
							<x-button
								href="$item['button']['url']"
								variant="primary"
								class="relative z-10 m-btn after:absolute after:inset-0 after:content-['']">
								{{ $item['button']['title'] }}
							</x-button>
						</div>
					</div>
					@endforeach
				</div>
				@endforeach
			</div>
		</div>
		@endif

		@if (!empty($g_tabs['button']))
		<div class="mt-10 text-center">
			<a href="{{ $g_tabs['button']['url'] }}" class="main-btn m-btn" target="{{ $g_tabs['button']['target'] ?? '_self' }}">
				{{ $g_tabs['button']['title'] }}
			</a>
		</div>
		@endif
	</div>
</section>