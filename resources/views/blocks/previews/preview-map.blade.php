<!--- map preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Mapa</div>
			<span class="acf-preview__slug">acf/map</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_map['header']))
		<p class="text-h5">{!! $g_map['header'] !!}</p>
		@endif
		@if (!empty($g_map['map']))
		<p>+ mapa</p>
		@endif
		<div class="acf-preview-actions">
			@if (!empty($g_map['button']['title']))
			<span class="acf-preview-button">{{ $g_map['button']['title'] }}</span>
			@endif
		</div>
	</div>
</div>
