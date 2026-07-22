@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!-- banner --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-banner relative [overflow-y:clip] -spt {{ $sectionClass }} {{ $section_class }}">

	<div @class(['__wrapper py-26', 'pt-56 pb-16'=> $bighero])>
		@if (!empty($g_banner['image']))
		<x-picture
			:image="$g_banner['image']"
			figure-class="absolute inset-0 w-full h-full z-0 m-0"
			class="w-full h-full object-cover" />
		@endif

		<div class="absolute inset-0 z-1 pointer-events-none" style="background: linear-gradient(90deg, rgba(96, 16, 46, 0.85) 0%, rgba(96, 16, 46, 0.85) 100%);"></div>

		<img @class(['absolute z-1 left-0 mix-blend-screen opacity-30', '-top-5/12' => !$bighero, '-top-1/12' => $bighero]) src="{{ get_template_directory_uri() }}/resources/images/bg-secondary.svg" />

		<div class="__inside c-main relative z-10">
			<div class="__content py-20">

				<div>
					<div @class(['w-full md:w-1/2', 'mx-auto' => !$bighero])>
						<h1 data-gsap-element="header" @class(['text-white', 'text-center'=> !$bighero, 'text-left' => $bighero])>
							{!! $g_banner['header'] !!}
						</h1>
						<div data-gsap-element="txt" @class(['text-lg text-white mt-2', 'text-center'=> !$bighero, 'text-left' => $bighero])>
							{!! $g_banner['text'] !!}
						</div>
					</div>
					@if (!empty($g_banner['button1']))
					<div class="inline-buttons m-btn">
						@if (!empty($g_banner['button1']))
						<x-button
							:href="$g_banner['button1']['url']"
							variant="primary"
							class=""
							data-gsap-element="btn">
							{{ $g_banner['button1']['title'] }}
						</x-button>
						@endif

						@if (!empty($g_banner['button2']))
						<x-button
							:href="$g_banner['button2']['url']"
							variant="secondary"
							class=""
							data-gsap-element="btn">
							{{ $g_banner['button2']['title'] }}
						</x-button>
						@endif
					</div>
					@endif
				</div>
			</div>
		</div>

</section>