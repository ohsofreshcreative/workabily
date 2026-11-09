<!--- aboutus preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Hero - O nas</div>
			<span class="acf-preview__slug">acf/aboutus</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_aboutus['title']))
		<p>{!! $g_aboutus['title'] !!}</p>
		@endif
		@if (!empty($g_aboutus['header']))
		<p class="text-h5">{!! $g_aboutus['header'] !!}</p>
		@endif
		@if (!empty($g_aboutus['text']))
		<div>{!! $g_aboutus['text'] !!}</div>
		@endif
		<div class="acf-preview-actions">
			@if (!empty($g_aboutus['button1']['title']))
			<span class="acf-preview-button">{{ $g_aboutus['button1']['title'] }}</span>
			@endif
			@if (!empty($g_aboutus['button2']['title']))
			<span class="acf-preview-button">{{ $g_aboutus['button2']['title'] }}</span>
			@endif
		</div>
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
			@foreach (array_slice((array) ($r_aboutus ?? []), 0, 6) as $item)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (!empty($item['image']['ID']))
				<figure class="acf-preview__media m-0">{!! wp_get_attachment_image($item['image']['ID'], 'thumbnail', false, ['class' => 'h-16 w-full object-cover']) !!}</figure>
				@endif
				@if (!empty($item['title']))
				<p class="text-h6">{!! $item['title'] !!}</p>
				@endif
			</div>
			@endforeach
		</div>
	</div>
</div>
