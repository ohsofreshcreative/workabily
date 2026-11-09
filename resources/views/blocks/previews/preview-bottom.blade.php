<!--- bottom preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Wezwanie do działania - Dół strony</div>
			<span class="acf-preview__slug">acf/bottom</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_obottom['image']['ID']))
		<figure class="acf-preview__media m-0">{!! wp_get_attachment_image($g_obottom['image']['ID'], 'thumbnail', false, ['class' => 'h-20 w-32 object-cover']) !!}</figure>
		@endif
		@if (!empty($g_obottom['title']))
		<p>{!! $g_obottom['title'] !!}</p>
		@endif
		@if (!empty($g_obottom['header']))
		<p class="text-h5">{!! $g_obottom['header'] !!}</p>
		@endif
		@if (!empty($g_obottom['txt']))
		<div>{!! $g_obottom['txt'] !!}</div>
		@endif
		<div class="acf-preview-actions">
			@if (!empty($g_obottom['button1']['title']))
			<span class="acf-preview-button">{{ $g_obottom['button1']['title'] }}</span>
			@endif
			@if (!empty($g_obottom['button2']['title']))
			<span class="acf-preview-button">{{ $g_obottom['button2']['title'] }}</span>
			@endif
		</div>
		@if (!empty($form))
		<p>+ formularz kontaktowy</p>
		@endif
		<p>Treść edytowana w opcjach motywu.</p>
	</div>
</div>
