@php
$categories = get_the_category();
$category = !empty($categories) ? $categories[0] : null;
@endphp

<section data-gsap-anim="section" class="hero-blog bg-primary relative overflow-visible">
	<div class="__wrapper c-main relative z-10 -spt">
		<div class="__content w-full sm:w-7/12 pb-30">
			<div data-gsap-element="bread" class="__breadcrumb">
				@if (function_exists('woocommerce_breadcrumb'))
				{!! woocommerce_breadcrumb() !!}
				@endif
			</div>

			<div class="__top mt-20">
				@if ($category)
				<a data-gsap-element="header" href="{{ get_category_link($category->term_id) }}" class="bg-primary-lighter hover:bg-primary-light border border-primary-light rounded-full text-sm px-4 py-3">{{ $category->name }}</a>
				@endif
				<h1 data-gsap-element="header" class="text-h2 text-white mt-6">{{ get_the_title() }}</h1>
				@if(has_excerpt())
				<div data-gsap-element="content" class="text-white mt-4">
					{!! get_the_excerpt() !!}
				</div>
				@endif
			</div>
		</div>
	</div>
	<img src="/wp-content/uploads/2026/01/blog-leaf.svg" alt="" class="absolute -top-20 -right-20 pointer-events-none">
</section>

<section data-gsap-anim="section">
	<div id="tresc" class="__entry relative z-10 -mt-16">


	</div>
</section>

@php
$content = apply_filters('the_content', get_the_content());

$matches = [];
preg_match_all('/<h([1-4])[^>]*>(.*?)<\/h[1-4]>/', $content, $matches, PREG_SET_ORDER);

		$toc = '<nav class="toc">
			<ul>';
				$used_ids = [];
				foreach ($matches as $match) {
				$level = $match[1];
				$title = strip_tags($match[2]);
				$id = sanitize_title($title);
				$base_id = $id;
				$i = 2;
				while (in_array($id, $used_ids)) {
				$id = $base_id . '-' . $i;
				$i++;
				}
				$used_ids[] = $id;
				$content = preg_replace(
				'/<h' . $level . '[^>]*>' . preg_quote($match[2], '/' ) . '<\/h' . $level . '>/' , '<h' . $level . ' id="' . $id . '">' . $match[2] . '</h' . $level . '>' ,
					$content,
					1
					);
					$toc .='<li class="toc-h' . $level . '"><a href="#' . $id . '">' . $title . '</a></li>' ;
					}
					$toc .='</ul></nav>' ;
					@endphp

					<div class="__content c-main __entry relative -smt grid grid-cols-1 md:grid-cols-[3fr_1fr] gap-x-10">

					@if(has_post_thumbnail())
					<div data-gsap-element="image" class="order-1 md:col-start-1 md:row-start-1 w-full img-2xl radius overflow-hidden -mt-20 mb-10">
						{!! get_the_post_thumbnail(get_the_ID(), 'large', ['class' => 'w-full object-cover']) !!}
					</div>
					@endif

					<div class="__toc order-2 md:col-start-2 md:row-start-1 md:row-span-2 relative md:sticky top-0 md:top-30 h-max mb-8 md:mb-0">
						<p class="text-h5 m-title">Spis treści</p>
						@if(count($matches))
						{!! $toc !!}
						@endif
					</div>

					<div id="tresc" class="__entry order-3 md:col-start-1 md:row-start-2">
						{!! $content !!}
					</div>

					</div>

					<!-- related-posts -->
					@include('partials.related-posts')

					<!-- bottom-block -->
					@php
					$g_obottom = get_field('g_obottom', 'option');
					$form = true;
					$sectionClass = '';
					$section_id = '';
					$section_class = '';
					$background = 'none';
					@endphp
					@include('blocks.bottom')


					<script>
						document.addEventListener('DOMContentLoaded', function() {
							const headings = document.querySelectorAll('h1[id], h2[id], h3[id], h4[id]'); // Select all headings with IDs
							const tocLinks = document.querySelectorAll('.toc ul li a'); // Select all links in the TOC

							function updateActiveLink() {
								headings.forEach((heading) => {
									const headingTop = heading.getBoundingClientRect().top;
									const windowHeight = window.innerHeight;

									if (headingTop < windowHeight - 300) {
										// Remove the 'active' class from all TOC links
										tocLinks.forEach((link) => {
											link.parentNode.classList.remove('active');
										});

										// Add the 'active' class to the corresponding TOC link
										const id = heading.id;
										const activeLink = document.querySelector(`.toc ul li a[href="#${id}"]`);
										if (activeLink) {
											activeLink.parentNode.classList.add('active');
										}
									}
								});
							}
							updateActiveLink();

							window.addEventListener('scroll', updateActiveLink);
						});
					</script>