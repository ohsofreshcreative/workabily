<!--- cta -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-cta relative pt-12 pb-8' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper">
		<div class="__inside">
			<div data-gsap-element="card" class="__card relative overflow-hidden text-center bg-white radius-m p-8 pt-76 md:p-24 md:pt-76">
				@if (!empty($g_cta['image']['url']))
				<figure class="absolute inset-0 m-0">
					<picture>
						<source media="(min-width: 1280px)" srcset="{{ $g_cta['image']['sizes']['img-xl'] ?? $g_cta['image']['url'] }}">
						<source media="(min-width: 1024px)" srcset="{{ $g_cta['image']['sizes']['img-lg'] ?? $g_cta['image']['url'] }}">
						<source media="(min-width: 768px)" srcset="{{ $g_cta['image']['sizes']['img-md'] ?? $g_cta['image']['url'] }}">
						<img class="w-full h-full object-cover" src="{{ $g_cta['image']['sizes']['img-sm'] ?? $g_cta['image']['url'] }}" alt="{{ $g_cta['image']['alt'] ?? '' }}" />
					</picture>
				</figure>
				<div class="absolute inset-0 z-1 pointer-events-none" style="background: linear-gradient(180deg, rgba(96, 16, 46, 0.0) 0%, rgba(96, 16, 46, 0.90) 80%);"></div>
				@endif
				@if (!empty($g_cta['header']))
				<p class="relative z-10 text-h4 text-white">{{ $g_cta['header'] }}</p>
				@endif
				@if (!empty($g_cta['button1']))
				<x-button
					:href="$g_cta['button1']['url']"
					variant="white"
					class="relative !flex justify-center items-center gap-4 z-10 m-btn after:absolute after:inset-0 after:content-[''] mx-auto !px-10 !py-4">
					{{ $g_cta['button1']['title'] }}
					<img src="{{ get_template_directory_uri() }}/resources/images/smile.svg" />
				</x-button>
				@endif
			</div>
		</div>
	</div>

</section>