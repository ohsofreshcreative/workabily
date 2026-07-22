<!-- accordion -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-accordion relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="c-main">
		<div class="__wrapper grid gap-18">

			<div class="grid grid-cols-1 md:grid-cols-2 section-gap items-center">
				<h2 data-gsap-element="header" class="__header order-1">{{ $g_accordion['title'] }}</h2>
				<div data-gsap-element="txt" class="m-header text-xl order-2">{!! $g_accordion['text'] !!}</div>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-[1fr_2fr] items-center gap-24">
				@if (!empty($g_accordion['image']))
				<x-picture
					:image="$g_accordion['image']"
					class="__img object-cover h-full radius-img"
					figure-class="h-full order-3"
					data-gsap-element="img" />
				@endif

				<div data-gsap-element="accordion" class="accordion-wrapper grid order-4">
					@foreach ($r_accordion as $item)
					<div class="accordion rounded-2xl bg-white border border-secondary h-max mb-4 last:mb-0">
						<input class="acc-check" type="radio" name="accordion-radio" id="check{{ $loop->index }}" {{ $loop->first ? 'checked' : '' }}>
						<label class="accordion-label flex items-center justify-between font-semibold text-md md:text-h5 gap-4" for="check{{ $loop->index }}">
							{{ $item['title'] }}
							<span class="__toggle flex-shrink-0 w-6 h-6 rounded-full bg-primary flex items-center justify-center text-secondary font-bold text-2xl"></span>
						</label>
						<div class="accordion-content">
							{!! $item['text'] !!}
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>