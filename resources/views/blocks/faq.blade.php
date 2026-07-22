<!--- faq --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-faq relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-10">

		<div class="__content bg-secondary-lighter/30 border border-secondary radius p-6">
			<h5 data-gsap-element="header" class="__header-top">{{ $g_faq['header'] }}</h5>
			<div data-gsap-element="txt" class="__txt mt-4">
				{!! $g_faq['text'] !!}
			</div>
			@if (!empty($g_faq['image']))
			<div data-gsap-element="img" class="__img order1 mt-10">
				<img class="__img img-m w-full object-cover radius" src="{{ $g_faq['image']['url'] }}" alt="{{ $g_faq['image']['alt'] ?? '' }}">
			</div>
			@endif
		</div>
		<div data-gsap-element="tabs" class="tabs-wrapper flex flex-col justify-center bg-secondary-lighter/30 border border-secondary radius p-6 mt-4 md:mt-0">
			@php $faqGroup = uniqid('faq-'); @endphp
			@foreach ($r_faq as $item)
			<div class="tabs border-b border-secondary h-max">
				<input class="tab-check" type="radio" name="{{ $faqGroup }}" id="{{ $faqGroup }}-{{ $loop->index }}">
				<label class="tabs-label flex items-center justify-between" for="{{ $faqGroup }}-{{ $loop->index }}">
					<div class="flex items-center gap-4">
						<p class="!text-lg font-header">{{ $item['title'] }}</p>
					</div>
					<span class="__toggle flex-shrink-0 w-6 h-6 rounded-full bg-primary flex items-center justify-center text-secondary font-bold text-2xl"></span>
				</label>
				<div class="tabs-content">
					{!! $item['txt'] !!}
				</div>
			</div>
			@endforeach
		</div>

	</div>

</section>