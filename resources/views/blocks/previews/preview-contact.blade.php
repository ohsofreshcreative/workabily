<!--- contact preview --->

<div class="acf-preview" @if(!empty($nomt)) data-acf-nomt @endif>
	<div class="acf-preview__meta">
		<div class="acf-preview__heading">
			<div class="acf-preview__title">Kontakt</div>
			<span class="acf-preview__slug">acf/contact</span>
		</div>
		@include('partials.block-preview-settings')
	</div>
	<div class="acf-preview__content">
		@if (!empty($g_contact_1['image']['ID']))
		<figure class="acf-preview__media m-0">{!! wp_get_attachment_image($g_contact_1['image']['ID'], 'thumbnail', false, ['class' => 'h-20 w-32 object-cover']) !!}</figure>
		@endif
		@if (!empty($g_contact_1['header']))
		<p class="text-h5">{!! $g_contact_1['header'] !!}</p>
		@endif
		@if (!empty($g_contact_1['text']))
		<p>{!! $g_contact_1['text'] !!}</p>
		@endif
		@if (!empty($g_contact_2['title']))
		<p class="text-h6">{!! $g_contact_2['title'] !!}</p>
		@endif
		@if (!empty($g_contact_2['shortcode']))
		<p>{!! $g_contact_2['shortcode'] !!}</p>
		@endif
		<p>+ telefon i e-mail z opcji motywu</p>
	</div>
</div>
