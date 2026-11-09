<!--- accordion preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Rozwijane panele</div>
			<span class="acf-preview__slug">acf/accordion</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_accordion['image']['ID']))
		<figure class="acf-preview__media m-0">{!! wp_get_attachment_image($g_accordion['image']['ID'], 'thumbnail', false, ['class' => 'h-20 w-32 object-cover']) !!}</figure>
		@endif
		@if (!empty($g_accordion['title']))
		<p class="text-h5">{!! $g_accordion['title'] !!}</p>
		@endif
		@if (!empty($g_accordion['text']))
		<div>{!! $g_accordion['text'] !!}</div>
		@endif
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
			@foreach (array_slice((array) ($r_accordion ?? []), 0, 6) as $item)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (!empty($item['title']))
				<p class="text-h6">{!! $item['title'] !!}</p>
				@endif
				@if (!empty($item['text']))
				<div>{!! $item['text'] !!}</div>
				@endif
			</div>
			@endforeach
		</div>
	</div>
</div>
