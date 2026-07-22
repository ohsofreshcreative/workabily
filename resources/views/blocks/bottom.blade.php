<!--- bottom -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-bottom relative -smt overflow-hidden c-main' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper relative radius overflow-hidden p-8">

		@if (!empty($g_obottom['image']))
		<x-picture
			:image="$g_obottom['image']"
			figure-class="absolute inset-0 m-0 z-0"
			class="w-full h-full object-cover" />
		@endif

		<div class="absolute inset-0 z-1 pointer-events-none" style="background: linear-gradient(90deg, rgba(96, 16, 46, 0.95) 0%, rgba(96, 16, 46, 0.95) 100%);"></div>

		<div class="__inside grid grid-cols-1 md:grid-cols-2 items-center gap-6 relative z-20">
			<div class="__content w-full">
				@if (!empty($g_obottom['header']))
				<p data-gsap-element="header" class="block text-h3 text-white">{{ $g_obottom['header'] }}</p>
				@endif

				@if (!empty($g_obottom['txt']))
				<div data-gsap-element="txt" class="text-white m-header text-lg">{!! $g_obottom['txt'] !!}</div>
				@endif

				@if (!empty($g_obottom['phone']))
				<div data-gsap-element="phone" class="mt-8">
					<a href="tel:{{ $g_obottom['phone'] }}" class="inline-flex items-center gap-3 !text-white text-xl hover:opacity-50">
						<img src="{{ get_template_directory_uri() }}/resources/images/phone.svg" alt="" width="20" height="20" aria-hidden="true">
						{{ $g_obottom['phone'] }}
					</a>
				</div>
				@endif

				@if (!empty($g_obottom['mail']))
				<div data-gsap-element="mail" class="mt-2">
					<a href="mailto:{{ $g_obottom['mail'] }}" class="inline-flex items-center gap-3 !text-white text-xl hover:opacity-50">
						<img src="{{ get_template_directory_uri() }}/resources/images/mail.svg" alt="" width="20" height="20" aria-hidden="true">
						{{ $g_obottom['mail'] }}
					</a>
				</div>
				@endif

				<div class="inline-buttons m-btn">
					@if (!empty($g_obottom['button1']))
					<x-button
						:href="$g_obottom['button1']['url']"
						variant="white"
						class=""
						data-gsap-element="btn">
						{{ $g_obottom['button1']['title'] }}
					</x-button>
					@endif

					@if (!empty($g_obottom['button2']))
					<x-button
						:href="$g_obottom['button2']['url']"
						variant="secondary"
						class=""
						data-gsap-element="btn">
						{{ $g_obottom['button2']['title'] }}
					</x-button>
					@endif
				</div>
			</div>

			@if ($form)
			<div data-gsap-element="form" class="bg-white radius p-10 mb-30 md:mb-0">
				<h4 class="!text-primary mb-4">{!! $g_obottom['title'] !!}</h4>
				{!! do_shortcode($g_obottom['shortcode']) !!}
			</div>
			@endif
		</div>

	</div>

</section>