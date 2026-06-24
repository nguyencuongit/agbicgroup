<section class="ag-diamond-story" style="--story-bg: {{ $shortcode->background_color ?: '#fbf8ed' }}">
    <div class="container">
        <div class="ag-diamond-story__stage">
            <div class="ag-diamond-story__copy">
                @if($shortcode->name)
                    <h2>{!! BaseHelper::clean($shortcode->name) !!}</h2>
                @endif

                @if($shortcode->description)
                    <div class="ag-diamond-story__intro">
                        {!! BaseHelper::clean($shortcode->description) !!}
                    </div>
                @endif
            </div>

            @if($informationItems)
                <div class="ag-diamond-story__details">
                    @foreach($informationItems as $item)
                        <div class="ag-diamond-story__detail-item">
                            @if($item['name'])
                                <h3>{!! BaseHelper::clean($item['name']) !!}</h3>
                            @endif
                            @if($item['text'])
                                <div>{!! BaseHelper::clean(nl2br($item['text'])) !!}</div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="ag-diamond-story__mosaic">
                @foreach(range(1, 6) as $imageIndex)
                    @php($image = $shortcode->{'image_' . $imageIndex})
                    @if($image)
                            <div class="ag-diamond-story__image">
                                {!! RvMedia::image($image, $shortcode->name) !!}
                            </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
    .ag-diamond-story {
        overflow: hidden;
        background: var(--story-bg, #fbf8ed);
        color: #122017;
        font-family: "Noto Serif", "Times New Roman", serif;
    }

    .ag-diamond-story * {
        font-family: "Noto Serif", "Times New Roman", serif !important;
    }

    .ag-diamond-story__stage {
        position: relative;
        min-height: clamp(1080px, 105vw, 1150px);
        padding: clamp(70px, 8vw, 120px) 0 90px;
    }

    .ag-diamond-story__copy {
        position: absolute;
        top:50px;
        left: 30px;
        z-index: 3;
        width: 39%;
        max-width: 450px;
        opacity: 0;
        transform: translateX(-45px);
        transition: opacity .7s ease, transform .7s cubic-bezier(.16, 1, .3, 1);
    }

    .ag-diamond-story__details {
        position: absolute;
        z-index: 3;
        bottom: 90px;
        left: 30px;
        width: 39%;
        max-width: 430px;
        color: #3e4941;
        /* font-family: Georgia, 'Times New Roman', serif; */
        font-size: 14px;
        line-height: 1.65;
        opacity: 0;
        transform: translateX(-45px);
        transition: opacity .7s ease, transform .7s cubic-bezier(.16, 1, .3, 1);
    }

    .ag-diamond-story__details.is-visible {
        opacity: 1;
        transform: none;
    }

    .ag-diamond-story__details > :last-child {
        margin-bottom: 0;
    }

    .ag-diamond-story__copy.is-visible {
        opacity: 1;
        transform: none;
    }

    .ag-diamond-story__copy > h2 {
        margin: 0 0 18px;
        color: #122017;
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(30px, 3.6vw, 45px);
        font-weight: 700;
        line-height: 1;
        letter-spacing: -.035em;
        text-transform: uppercase;
    }

    .ag-diamond-story__copy > h2::first-letter {
        color: #c94b4b;
    }

    .ag-diamond-story__intro {
        color: #3e4941;
        font-size: 15px;
        line-height: 1.7;
    }

    .ag-diamond-story__intro > :last-child {
        margin-bottom: 0;
    }

    .ag-diamond-story__detail-item {
        margin-bottom: 24px;
    }

    .ag-diamond-story__detail-item:last-child {
        margin-bottom: 0;
    }

    .ag-diamond-story__detail-item h3 {
        margin: 0 0 6px;
        color: #122017;
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 20px;
        font-weight: 700;
        line-height: 1.3;
    }

    .ag-diamond-story__mosaic {
        position: absolute;
        z-index: 1;
        /* top: -20px; */
        bottom:0px;
        right: 127px;
        width: min(76vw, 850px);
        aspect-ratio: 2 / 3;
    }

    .ag-diamond-story__image {
        position: absolute;
        overflow: hidden;
        width: 50%;
        aspect-ratio: 1;
        background: var(--story-bg, #fbf8ed);
        clip-path: polygon(50% 0, 100% 50%, 50% 100%, 0 50%);
        opacity: 0;
        transform: scale(.88);
        transition: opacity .9s ease, transform .9s cubic-bezier(.16, 1, .3, 1);
        will-change: opacity, transform;
    }

    .ag-diamond-story__image:nth-child(1) {
        top: 0;
        left: 50%;
        transform: translateY(-150px) scale(.88);
    }

    .ag-diamond-story__image:nth-child(2) {
        top: 16.666%;
        left: 25%;
        transform: translate(-130px, -70px) scale(.88);
    }

    .ag-diamond-story__image:nth-child(3) {
        top: 33.333%;
        left: 0;
        transform: translateX(-170px) scale(.88);
    }

    .ag-diamond-story__image:nth-child(4) {
        top: 50%;
        left: 25%;
        transform: translate(-100px, 140px) scale(.88);
    }

    .ag-diamond-story__image:nth-child(5) {
        top: 12.6%;
        left: 50%;
        width: 950px;
        transform: translateX(180px) scale(.88);
    }

    .ag-diamond-story__image:nth-child(6) {
        top: 66.666%;
        left: 50%;
        transform: translate(140px, 170px) scale(.88);
    }

    .ag-diamond-story__image.is-visible {
        opacity: 1;
        transform: none;
    }

    .ag-diamond-story__image img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        clip-path: inherit;
        transform: scale(.985);
        transition: transform .6s cubic-bezier(.16, 1, .3, 1);
    }

    .ag-diamond-story__image:hover img {
        transform: scale(1);
    }

    @media (max-width: 991px) {
        .ag-diamond-story__copy { width: 44%; }
        .ag-diamond-story__details { width: 42%; }
        .ag-diamond-story__mosaic {
            top: 0;
            right: -15%;
            width: 82vw;
        }

        .ag-diamond-story__image:nth-child(5) {
            top: 33.333%;
            width: 50%;
        }
    }

    @media (max-width: 767px) {
        .ag-diamond-story__stage {
            display: grid;
            grid-template-columns: minmax(0, 1fr);
            min-height: 0;
            padding: 48px 0 64px;
        }

        .ag-diamond-story__copy {
            position: static !important;
            grid-row: 1;
            width: 100%;
            max-width: none;
        }

        .ag-diamond-story__copy > h2 {
            margin-bottom: 14px;
            font-size: clamp(28px, 9vw, 42px);
        }

        .ag-diamond-story__intro {
            font-size: 14px;
            line-height: 1.65;
        }

        .ag-diamond-story__details {
            position: static !important;
            grid-row: 3;
            bottom: auto;
            left: auto;
            width: 100%;
            max-width: none;
            margin-top: 32px;
            font-size: 14px;
        }

        .ag-diamond-story__mosaic {
            position: static !important;
            grid-row: 2;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 8px;
            top: auto;
            right: auto;
            width: 100%;
            height: auto;
            margin: 36px 0 0;
            aspect-ratio: auto;
        }

        .ag-diamond-story__mosaic .ag-diamond-story__image {
            position: relative;
            top: auto !important;
            left: auto !important;
            width: 100%;
            aspect-ratio: 1;
            clip-path: none;
            border-radius: 10px;
            transform: translateY(35px) scale(.96) !important;
        }

        .ag-diamond-story__mosaic .ag-diamond-story__image.is-visible {
            transform: none !important;
        }

        .ag-diamond-story__image img {
            clip-path: none;
            transform: none;
        }

        .ag-diamond-story__image:hover img {
            transform: scale(1.03);
        }

        .ag-diamond-story__detail-item {
            margin-bottom: 20px;
        }

        .ag-diamond-story__detail-item h3 {
            font-size: 18px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .ag-diamond-story__copy,
        .ag-diamond-story__details { opacity: 1; transform: none; transition: none; }
        .ag-diamond-story__image { transform: none; transition: none; }
    }
</style>

<script>
    (() => {
        document.querySelectorAll('.ag-diamond-story:not([data-ready])').forEach((section) => {
            section.dataset.ready = 'true';
            const copy = section.querySelector('.ag-diamond-story__copy');
            const details = section.querySelector('.ag-diamond-story__details');
            const images = Array.from(section.querySelectorAll('.ag-diamond-story__image'));

            const waitForRealImage = (wrapper) => new Promise((resolve) => {
                const image = wrapper.querySelector('img');

                if (!image) {
                    resolve();
                    return;
                }

                let observer;
                let finished = false;

                const hasPendingLazySource = () => {
                    const lazySource = image.dataset.src || image.dataset.lazySrc;

                    if (!lazySource) {
                        return false;
                    }

                    try {
                        return image.currentSrc !== new URL(lazySource, document.baseURI).href
                            && image.src !== new URL(lazySource, document.baseURI).href;
                    } catch (error) {
                        return false;
                    }
                };

                const finish = (isLoaded = true) => {
                    if (finished) {
                        return;
                    }

                    finished = true;
                    observer?.disconnect();
                    image.removeEventListener('load', check);
                    image.removeEventListener('lazyloaded', check);
                    image.removeEventListener('error', fail);
                    resolve(isLoaded);
                };

                const fail = () => finish(false);

                const check = () => {
                    if (!image.complete || image.naturalWidth < 2 || hasPendingLazySource()) {
                        return;
                    }

                    if (typeof image.decode === 'function') {
                        image.decode().catch(() => {}).finally(finish);
                    } else {
                        finish();
                    }
                };

                image.addEventListener('load', check);
                image.addEventListener('lazyloaded', check);
                image.addEventListener('error', fail);

                observer = new MutationObserver(check);
                observer.observe(image, {
                    attributes: true,
                    attributeFilter: ['src', 'srcset', 'data-src', 'data-lazy-src'],
                });

                check();
            });

            const reveal = () => {
                copy?.classList.add('is-visible');
                window.setTimeout(() => details?.classList.add('is-visible'), 250);

                images.forEach((wrapper, index) => {
                    const image = wrapper.querySelector('img');

                    if (image) {
                        image.loading = 'eager';

                        if (image.dataset.src) {
                            image.src = image.dataset.src;
                        }

                        if (image.dataset.srcset) {
                            image.srcset = image.dataset.srcset;
                        }
                    }

                    waitForRealImage(wrapper).then((isLoaded) => {
                        if (isLoaded) {
                            window.setTimeout(() => wrapper.classList.add('is-visible'), index * 150);
                        }
                    });
                });
            };

            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) {
                reveal();
                return;
            }

            const observer = new IntersectionObserver((entries) => {
                if (entries.some((entry) => entry.isIntersecting)) {
                    observer.disconnect();
                    reveal();
                }
            }, { threshold: .12, rootMargin: '0px 0px -8% 0px' });

            observer.observe(section);
        });
    })();
</script>
