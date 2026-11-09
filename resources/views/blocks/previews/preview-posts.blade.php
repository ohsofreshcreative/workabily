<!--- posts preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Baza wiedzy - Ostatnie wpisy</div>
			<span class="acf-preview__slug">acf/posts</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($posts_settings['title']))
		<p class="text-h5">{!! $posts_settings['title'] !!}</p>
		@endif
		@if (!empty($posts_settings['text']))
		<p>{!! $posts_settings['text'] !!}</p>
		@endif
		<div class="acf-preview-actions">
			@if (!empty($posts_settings['button']['title']))
			<span class="acf-preview-button">{{ $posts_settings['button']['title'] }}</span>
			@endif
		</div>
		@foreach ((array) ($posts ?? []) as $p)
		<p class="text-h6">{{ get_the_title($p) }}</p>
		@endforeach
		<p>Wpisy pobierane automatycznie (2 najnowsze).</p>
	</div>
</div>
