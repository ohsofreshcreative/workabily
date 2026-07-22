<!--- contact --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-contact  relative -spt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="py-26">
		@if (!empty($g_contact_1['image']))
		<x-picture
			:image="$g_contact_1['image']"
			figure-class="absolute inset-0 w-full h-full z-0 m-0"
			class="w-full h-full object-cover" />
		@endif

		<div class="absolute inset-0 z-1 pointer-events-none" style="background: linear-gradient(90deg, rgba(96, 16, 46, 0.95) 0%, rgba(96, 16, 46, 0.95) 100%);"></div>
		
		<img class="absolute z-1 opacity-10 mix-blend-overlay -left-1/12 top-2/12" src="{{ get_template_directory_uri() }}/resources/images/contact-shape.svg" />

		<div class="__wrapper c-main relative z-2">
			<div class="relative grid grid-cols-1 lg:grid-cols-2 items-center gap-10 z-10">
				<div class="__content flex flex-col justify-between">
					<h2 data-gsap-element="header" class="text-white">{!! $g_contact_1['header'] !!}</h2>
					<p data-gsap-element="txt" class="m-header text-white text-lg">{!! $g_contact_1['text'] !!}</p>

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

					<x-button
						href="#lokalizacje"
						variant="secondary"
						class="mt-6"
						data-gsap-element="btn">
						Gdzie jesteśmy
					</x-button>
				</div>
				<div data-gsap-element="form" class="bg-white radius p-10">
					<h4 class="!text-primary mb-4">{!! $g_contact_2['title'] !!}</h4>
					{!! do_shortcode($g_contact_2['shortcode']) !!}
				</div>
			</div>
		</div>
	</div>

</section>