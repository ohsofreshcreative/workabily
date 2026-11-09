<!--- gallery preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Galeria</div>
			<span class="acf-preview__slug">acf/gallery</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_gallery['header']))
		<p class="text-h5">{!! $g_gallery['header'] !!}</p>
		@endif
		<div class="acf-preview__logo-list flex flex-wrap items-center">
			@foreach (array_slice((array) ($g_gallery['gallery'] ?? []), 0, 8) as $image)
			@if (!empty($image['ID']))
			{!! wp_get_attachment_image($image['ID'], 'thumbnail', false, ['class' => 'h-16 w-24 object-cover']) !!}
			@endif
			@endforeach
		</div>
	</div>
</div>
