<!--- proces preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Proces</div>
			<span class="acf-preview__slug">acf/proces</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_proces['title']))
		<p>{!! $g_proces['title'] !!}</p>
		@endif
		@if (!empty($g_proces['header']))
		<p class="text-h5">{!! $g_proces['header'] !!}</p>
		@endif
		@if (!empty($g_proces['txt']))
		<div>{!! $g_proces['txt'] !!}</div>
		@endif
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
			@foreach (array_slice((array) ($r_proces ?? []), 0, 6) as $item)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (!empty($item['number']))
				<p>{!! $item['number'] !!}</p>
				@endif
				@if (!empty($item['image']['ID']))
				<figure class="acf-preview__media m-0">{!! wp_get_attachment_image($item['image']['ID'], 'thumbnail', false, ['class' => 'h-16 w-full object-cover']) !!}</figure>
				@endif
				@if (!empty($item['title']))
				<p class="text-h6">{!! $item['title'] !!}</p>
				@endif
				@if (!empty($item['txt']))
				<div>{!! $item['txt'] !!}</div>
				@endif
			</div>
			@endforeach
		</div>
		@if (!empty($g_proces2['image']['ID']))
		<figure class="acf-preview__media m-0">{!! wp_get_attachment_image($g_proces2['image']['ID'], 'thumbnail', false, ['class' => 'h-20 w-32 object-cover']) !!}</figure>
		@endif
		@if (!empty($g_proces2['header']))
		<p class="text-h5">{!! $g_proces2['header'] !!}</p>
		@endif
		@if (!empty($g_proces2['text']))
		<div>{!! $g_proces2['text'] !!}</div>
		@endif
		<div class="acf-preview-actions">
			@if (!empty($g_proces2['button1']['title']))
			<span class="acf-preview-button">{{ $g_proces2['button1']['title'] }}</span>
			@endif
			@if (!empty($g_proces2['button2']['title']))
			<span class="acf-preview-button">{{ $g_proces2['button2']['title'] }}</span>
			@endif
		</div>
	</div>
</div>
