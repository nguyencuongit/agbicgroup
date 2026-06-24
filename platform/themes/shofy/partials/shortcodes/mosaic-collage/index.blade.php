<section
    class="ag-mosaic-collage"
    style="--ag-mosaic-background: {{ $shortcode->background_color ?: '#fbf8ed' }}"
>
    <div class="container">
        @if($shortcode->name)
            <h2 class="ag-mosaic-collage__title">{!! BaseHelper::clean($shortcode->name) !!}</h2>
        @endif

        @if($shortcode->description)
            <div class="ag-mosaic-collage__description">
                {!! BaseHelper::clean($shortcode->description) !!}
            </div>
        @endif

        @if($items)
            <div class="ag-mosaic-collage__grid">
                @foreach($items as $item)
                    <article class="ag-mosaic-collage__pair">
                        @if($item['image'])
                            <div class="ag-mosaic-collage__image ag-mosaic-collage__tile">
                                {!! RvMedia::image($item['image'], $item['name'] ?: $shortcode->name) !!}
                            </div>
                        @endif

                        <div class="ag-mosaic-collage__body ag-mosaic-collage__tile">
                            <span class="ag-mosaic-collage__number">
                                {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </span>

                            @if($item['name'])
                                <h3>{!! BaseHelper::clean($item['name']) !!}</h3>
                            @endif

                            @if($item['text'])
                                <div class="ag-mosaic-collage__text">
                                    {!! BaseHelper::clean(nl2br($item['text'])) !!}
                                </div>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</section>

<style>
    .ag-mosaic-collage {
        overflow: hidden;
        padding: 80px 0 100px;
        background: var(--ag-mosaic-background, #fbf8ed);
        color: #172217;
        font-family: "Noto Serif", "Times New Roman", serif;
    }

    .ag-mosaic-collage * {
        font-family: "Noto Serif", "Times New Roman", serif !important;
    }

    .ag-mosaic-collage__title {
        margin: 0 0 18px;
        color: #172217;
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(30px, 3.1vw, 52px);
        font-weight: 700;
        line-height: 1.15;
        text-align: center;
    }

    .ag-mosaic-collage__description {
        width: 100%;
        max-width: 1180px;
        margin: 0 auto 58px;
        color: #687064;
        font-size: 16px;
        line-height: 1.75;
        text-align: left;
    }

    .ag-mosaic-collage__description > :last-child {
        margin-bottom: 0;
    }

    .ag-mosaic-collage__grid {
        display: grid;
        grid-template-columns: repeat(12, minmax(0, 1fr));
        grid-auto-flow: row dense;
        grid-auto-rows: 72px;
        gap: 20px;
        max-width: 1180px;
        margin: 0 auto;
    }

    .ag-mosaic-collage__pair {
        display: contents;
    }

    .ag-mosaic-collage__image {
        overflow: hidden;
        min-height: 0;
        border: 1px solid rgba(255, 255, 255, .7);
        border-radius: 26px;
        box-shadow: 0 18px 42px rgba(44, 58, 35, .13);
    }

    .ag-mosaic-collage__image img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .6s cubic-bezier(.16, 1, .3, 1);
    }

    .ag-mosaic-collage__image:hover img {
        transform: scale(1.04);
    }

    .ag-mosaic-collage__body {
        position: relative;
        align-self: center;
        padding: clamp(24px, 3.5vw, 48px);
        border: 1px solid rgba(42, 63, 39, .08);
        border-radius: 24px;
        background: rgba(255, 255, 255, .7);
        box-shadow: 0 14px 34px rgba(44, 58, 35, .07);
        backdrop-filter: blur(8px);
    }

    .ag-mosaic-collage__number {
        display: block;
        margin-bottom: 18px;
        color: #dc8d3d;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .14em;
    }

    .ag-mosaic-collage__body h3 {
        margin: 0 0 12px;
        color: #172217;
        font-size: clamp(21px, 2vw, 30px);
        font-weight: 700;
        line-height: 1.3;
    }

    .ag-mosaic-collage__text {
        color: #687064;
        font-size: 15px;
        line-height: 1.75;
    }

    .ag-mosaic-collage__pair:nth-child(3n + 1) .ag-mosaic-collage__image {
        grid-column: 1 / span 7;
        grid-row: span 5;
    }

    .ag-mosaic-collage__pair:nth-child(3n + 1) .ag-mosaic-collage__body {
        grid-column: 8 / span 5;
        grid-row: span 4;
    }

    .ag-mosaic-collage__pair:nth-child(3n + 2) .ag-mosaic-collage__image {
        grid-column: 6 / span 7;
        grid-row: span 5;
    }

    .ag-mosaic-collage__pair:nth-child(3n + 2) .ag-mosaic-collage__body {
        grid-column: 1 / span 5;
        grid-row: span 4;
    }

    .ag-mosaic-collage__pair:nth-child(3n) .ag-mosaic-collage__image {
        grid-column: 2 / span 6;
        grid-row: span 5;
    }

    .ag-mosaic-collage__pair:nth-child(3n) .ag-mosaic-collage__body {
        grid-column: 8 / span 5;
        grid-row: span 4;
    }

    .ag-mosaic-collage__image {
        opacity: 0;
        transform: translateX(-150px) scale(.985);
        transition: opacity .85s ease, transform .85s cubic-bezier(.16, 1, .3, 1);
        will-change: opacity, transform;
    }

    .ag-mosaic-collage__pair:nth-child(3n + 2) .ag-mosaic-collage__image {
        transform: translateX(150px) scale(.985);
    }

    .ag-mosaic-collage__body {
        opacity: 0;
        transform: translateY(22px);
        transition: opacity .6s ease, transform .6s cubic-bezier(.16, 1, .3, 1);
        will-change: opacity, transform;
    }

    .ag-mosaic-collage__pair.is-image-visible .ag-mosaic-collage__image,
    .ag-mosaic-collage__pair.is-content-visible .ag-mosaic-collage__body {
        opacity: 1;
        transform: translate(0) scale(1);
    }

    @media (max-width: 767px) {
        .ag-mosaic-collage {
            padding: 52px 0 64px;
        }

        .ag-mosaic-collage__description {
            margin-bottom: 38px;
            font-size: 15px;
        }

        .ag-mosaic-collage__grid {
            display: flex;
            flex-direction: column;
            gap: 28px;
        }

        .ag-mosaic-collage__pair {
            display: flex;
            flex-direction: column;
        }

        .ag-mosaic-collage__image {
            aspect-ratio: 4 / 3;
        }

        .ag-mosaic-collage__body {
            width: calc(100% - 24px);
            margin: -20px 0 0 24px;
            padding: 24px;
        }

        .ag-mosaic-collage__pair:nth-child(even) .ag-mosaic-collage__image {
            order: 1;
        }

        .ag-mosaic-collage__pair:nth-child(even) .ag-mosaic-collage__body {
            order: 2;
            margin-right: 24px;
            margin-left: 0;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .ag-mosaic-collage__image,
        .ag-mosaic-collage__body {
            opacity: 1;
            transform: none;
            transition: none;
        }
    }
</style>

<script>
    (() => {
        const sections = document.querySelectorAll('.ag-mosaic-collage:not([data-animation-ready])');

        sections.forEach((section) => {
            section.dataset.animationReady = 'true';
            const pairs = Array.from(section.querySelectorAll('.ag-mosaic-collage__pair'));

            if (!pairs.length || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                pairs.forEach((pair) => pair.classList.add('is-image-visible', 'is-content-visible'));
                return;
            }

            const revealPair = (pair) => {
                pair.classList.add('is-image-visible');
                window.setTimeout(() => pair.classList.add('is-content-visible'), 430);
            };

            if (!('IntersectionObserver' in window)) {
                pairs.forEach(revealPair);
                return;
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    observer.unobserve(entry.target);
                    revealPair(entry.target.closest('.ag-mosaic-collage__pair'));
                });
            }, {
                threshold: 0.18,
                rootMargin: '0px 0px -10% 0px',
            });

            pairs.forEach((pair) => {
                const trigger = pair.querySelector('.ag-mosaic-collage__image, .ag-mosaic-collage__body');

                if (trigger) {
                    observer.observe(trigger);
                }
            });
        });
    })();
</script>
