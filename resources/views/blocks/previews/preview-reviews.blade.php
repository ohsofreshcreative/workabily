<!--- reviews preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Slider - Opinie</div>
			<span class="acf-preview__slug">acf/reviews</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($header))
		<p class="text-h5">{!! $header !!}</p>
		@endif
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
			@foreach (array_slice((array) ($r_reviews ?? []), 0, 6) as $item)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (!empty($item['name']))
				<p class="text-h6">{!! $item['name'] !!}</p>
				@endif
				@if (!empty($item['position']))
				<p>{!! $item['position'] !!}</p>
				@endif
				@if (!empty($item['header']))
				<p>{!! $item['header'] !!}</p>
				@endif
			</div>
			@endforeach
		</div>
		<p>Opinie edytowane w opcjach motywu.</p>
	</div>
</div>
