<!-- Section: Testimoni -->
<section class="bg-white py-12">
    <div class=" mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-[#004225] mb-12">Kata Mereka</h2>

        @php
            $testimonials = [
                ['img' => asset('images/testimonials/Group136.png '), 'alt' => 'Testimoni 1'],
                ['img' => asset('images/testimonials/Group137.png'), 'alt' => 'Testimoni 2'],
                ['img' => asset('images/testimonials/Group138.png'), 'alt' => 'Testimoni 3'],
                ['img' => asset('images/testimonials/Group139.png'), 'alt' => 'Testimoni 4'],
                ['img' => asset('images/testimonials/Group144.png'), 'alt' => 'Testimoni 5'],
                ['img' => asset('images/testimonials/Group145.png'), 'alt' => 'Testimoni 6'],
                ['img' => asset('images/testimonials/Group146.png'), 'alt' => 'Testimoni 7'],
                ['img' => asset('images/testimonials/Group147.png'), 'alt' => 'Testimoni 8'],
            ];
        @endphp

        <!-- Swiper Container -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($testimonials as $t)
                    <div class="swiper-slide flex justify-center w-fit">
                        <img src="{{ $t['img'] }}" alt="{{ $t['alt'] }}"
                            class="rounded-2xl object-cover
                                w-full max-w-xs 
                                sm:max-w-sm        
                                md:max-w-md        
                                lg:max-w-lg       
                                shadow-lg" />
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="swiper-pagination !mt-6 !relative !bottom-0 text-center"></div>
        </div>
    </div>
</section>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    // Slider testimonial
    const testimonialSwiper = new Swiper('.mySwiper', {
        slidesPerView: 1,
        spaceBetween: 12,
        centeredSlides: true,
        loop: true,
        breakpoints: {
            640: {
                slidesPerView: 2
            },
            1024: {
                slidesPerView: 2
            },
        },
        autoHeight: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        },
    });
</script>
