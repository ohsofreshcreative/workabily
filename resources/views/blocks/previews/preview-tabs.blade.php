<!--- tabs preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Zakładki</div>
			<span class="acf-preview__slug">acf/tabs</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_tabs['header']))
		<p class="text-h5">{!! $g_tabs['header'] !!}</p>
		@endif
		@if (!empty($g_tabs['text']))
		<p>{!! $g_tabs['text'] !!}</p>
		@endif
		<div class="acf-preview-actions">
			@if (!empty($g_tabs['button']['title']))
			<span class="acf-preview-button">{{ $g_tabs['button']['title'] }}</span>
			@endif
		</div>
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
			@foreach (array_slice((array) ($r_tabs ?? []), 0, 6) as $item)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (!empty($item['tab']))
				<p class="text-h6">{!! $item['tab'] !!}</p>
				@endif
				@if (!empty($item['image']['ID']))
				<figure class="acf-preview__media m-0">{!! wp_get_attachment_image($item['image']['ID'], 'thumbnail', false, ['class' => 'h-16 w-full object-cover']) !!}</figure>
				@endif
				@if (!empty($item['title']))
				<p>{!! $item['title'] !!}</p>
				@endif
				@if (!empty($item['text']))
				<div>{!! $item['text'] !!}</div>
				@endif
				@if (!empty($item['button']['title']))
				<span class="acf-preview-button">{{ $item['button']['title'] }}</span>
				@endif
			</div>
			@endforeach
		</div>
	</div>
</div>
