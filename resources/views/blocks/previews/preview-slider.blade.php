<!--- slider preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Slider - Standard</div>
			<span class="acf-preview__slug">acf/slider</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_slider['title']))
		<p class="text-h5">{!! $g_slider['title'] !!}</p>
		@endif
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
			@foreach (array_slice((array) ($slider ?? []), 0, 6) as $item)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (!empty($item['image']['ID']))
				<figure class="acf-preview__media m-0">{!! wp_get_attachment_image($item['image']['ID'], 'thumbnail', false, ['class' => 'h-16 w-full object-cover']) !!}</figure>
				@endif
				@if (!empty($item['icon']['ID']))
				<figure class="acf-preview__media m-0">{!! wp_get_attachment_image($item['icon']['ID'], 'thumbnail', false, ['class' => 'h-16 w-full object-cover']) !!}</figure>
				@endif
				@if (!empty($item['header']))
				<p class="text-h6">{!! $item['header'] !!}</p>
				@endif
				@if (!empty($item['opis']))
				<p>{!! $item['opis'] !!}</p>
				@endif
			</div>
			@endforeach
		</div>
	</div>
</div>
