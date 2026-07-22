<footer class="footer overflow-hidden bg-primary-dark relative -smt z-10">
	<img class="absolute z-0 top-0 left-1/2 -translate-x-1/2" src="{{ get_template_directory_uri() }}/resources/images/footer-bg.svg" alt="" aria-hidden="true" />
	<img class="absolute mix-blend-overlay opacity-50 z-0 top-0 left-1/2 -translate-x-1/2" src="{{ get_template_directory_uri() }}/resources/images/footer-glow.svg" alt="" aria-hidden="true" />
	<div class="__wrapper relative overflow-hidden footer-py">
		<div class="__widgets relative z-20 c-main grid grid-cols-1 md:grid-cols-2 lg:grid-cols-[2fr_1fr_1fr_1fr_1fr] gap-8 md:gap-12">

			<div class="flex flex-col gap-6 text-white text-lg">
				@if(!empty($logo_footer))
				<a href="{{ home_url('/') }}" class="block max-w-[180px]">
					<img src="{{ $logo_footer['url'] }}" alt="{{ $logo_footer['alt'] ?? get_bloginfo('name') }}" class="w-full h-auto object-contain" />
				</a>
				@endif

				@if(!empty($footer_contact['address']))
				<div class="opacity-90">{!! $footer_contact['address'] !!}</div>
				@endif

				<div class="flex flex-col gap-2 mt-2">
					@if(!empty($footer_contact['phone']))
					<a href="tel:{{ str_replace(' ', '', $footer_contact['phone']) }}" class="hover:text-secondary transition-colors inline-flex items-center !text-lg gap-2">
						<img src="{{ get_template_directory_uri() }}/resources/images/phone.svg" alt="" width="16" height="16" aria-hidden="true">
						{{ $footer_contact['phone'] }}
					</a>
					@endif

					@if(!empty($footer_contact['email']))
					<a href="mailto:{{ $footer_contact['email'] }}" class="hover:text-secondary transition-colors inline-flex items-center !text-lg gap-2">
						<img src="{{ get_template_directory_uri() }}/resources/images/mail.svg" alt="" width="16" height="16" aria-hidden="true">
						{{ $footer_contact['email'] }}
					</a>
					@endif
				</div>
			</div>

			@for ($i = 2; $i <= 5; $i++)
				@if (is_active_sidebar('sidebar-footer-' . $i))
				<div class="text-white text-lg !leading-[1.7rem] [&_li]:mb-6">
				@php(dynamic_sidebar('sidebar-footer-' . $i))
		</div>
		@endif
		@endfor

	</div>
	</div>

	<div class="footer-bottom text-white border-t border-primary-400 py-10">
		<div class="c-main flex flex-col justify-center md:flex-row gap-6">
			<p class="">Copyright ©{{ date('Y') }} {{ get_bloginfo('name') }}. All Rights Reserved</p>
			<span class="hidden md:block text-primary-400" aria-hidden="true">|</span>
			<p class="flex gap-2">Designed &amp; Developed by
				<a target="_blank" rel="nofollow" href="https://www.ohsofresh.pl" title="OhSoFresh"><img class="oh" src="{{ get_template_directory_uri() }}/resources/images/ohsofresh.svg" alt="OhSoFresh"></a>
			</p>
		</div>
	</div>


	<svg style="display: none" xmlns="http://www.w3.org/2000/svg">
		<filter id="glass-blur" x="0" y="0" width="100%" height="100%" filterUnits="objectBoundingBox">
			<feTurbulence type="fractalNoise" baseFrequency="0.02 0.02" numOctaves="1" result="turbulence" />
			<feDisplacementMap in="SourceGraphic" in2="turbulence" scale="50" xChannelSelector="R" yChannelSelector="G" />
		</filter>
	</svg>

</footer>