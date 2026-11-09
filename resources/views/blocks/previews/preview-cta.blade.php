<!--- cta preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Wezwanie do działania</div>
			<span class="acf-preview__slug">acf/cta</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_cta['image']['ID']))
		<figure class="acf-preview__media m-0">{!! wp_get_attachment_image($g_cta['image']['ID'], 'thumbnail', false, ['class' => 'h-20 w-32 object-cover']) !!}</figure>
		@endif
		@if (!empty($g_cta['header']))
		<p class="text-h5">{!! $g_cta['header'] !!}</p>
		@endif
		@if (!empty($g_cta['txt']))
		<div>{!! $g_cta['txt'] !!}</div>
		@endif
		<div class="acf-preview-actions">
			@if (!empty($g_cta['button1']['title']))
			<span class="acf-preview-button">{{ $g_cta['button1']['title'] }}</span>
			@endif
			@if (!empty($g_cta['button2']['title']))
			<span class="acf-preview-button">{{ $g_cta['button2']['title'] }}</span>
			@endif
		</div>
		@if (!empty($form))
		<p>+ formularz kontaktowy</p>
		@endif
		@if (!empty($g_cta['title']))
		<p class="text-h6">{!! $g_cta['title'] !!}</p>
		@endif
		@if (!empty($g_cta['shortcode']))
		<p>{!! $g_cta['shortcode'] !!}</p>
		@endif
	</div>
</div>
