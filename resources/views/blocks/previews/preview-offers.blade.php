<!--- offers preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Oferta</div>
			<span class="acf-preview__slug">acf/offers</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
			@foreach (array_slice((array) ($offer_items ?? []), 0, 6) as $item)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (!empty($item['image_id']))
				<figure class="acf-preview__media m-0">{!! wp_get_attachment_image($item['image_id'], 'thumbnail', false, ['class' => 'h-16 w-full object-cover']) !!}</figure>
				@endif
				<p class="text-h6">{{ $item['title'] }}</p>
			</div>
			@endforeach
		</div>
		<p>Lista ofert pobierana automatycznie (CPT „offer”).</p>
	</div>
</div>
