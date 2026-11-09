<!--- team preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Nasz zespół</div>
			<span class="acf-preview__slug">acf/team</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_team['header']))
		<p class="text-h5">{!! $g_team['header'] !!}</p>
		@endif
		@if (!empty($g_team['text']))
		<p>{!! $g_team['text'] !!}</p>
		@endif
		<div class="acf-preview-actions">
			@if (!empty($g_team['button']['title']))
			<span class="acf-preview-button">{{ $g_team['button']['title'] }}</span>
			@endif
		</div>
		<div class="acf-preview__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
			@foreach (array_slice((array) ($r_team ?? []), 0, 8) as $item)
			<div class="acf-preview__card flex flex-col gap-2">
				@if (!empty($item['image']['ID']))
				<figure class="acf-preview__media m-0">{!! wp_get_attachment_image($item['image']['ID'], 'thumbnail', false, ['class' => 'h-16 w-full object-cover']) !!}</figure>
				@endif
				@if (!empty($item['title']))
				<p class="text-h6">{!! $item['title'] !!}</p>
				@endif
				@if (!empty($item['text']))
				<p>{!! $item['text'] !!}</p>
				@endif
			</div>
			@endforeach
		</div>
	</div>
</div>
