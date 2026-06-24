@include(Theme::getThemeNamespace('partials.shortcodes.staircase-content.diamond'))
@if(false)
<section
    class="ag-staircase-content"
    style="--ag-staircase-background: {{ $shortcode->background_color ?: '#fbf8ed' }}"
>
    <div class="container">
        @if($shortcode->name)
            <h2 class="ag-staircase-content__title">{!! BaseHelper::clean($shortcode->name) !!}</h2>
        @endif

        @if($shortcode->description)
            <div class="ag-staircase-content__description">
                {!! BaseHelper::clean($shortcode->description) !!}
            </div>
        @endif

        @if($rows)
            <div class="ag-staircase-content__rows">
                @foreach($rows as $row)
                    <article
                        class="ag-staircase-content__row"
                        style="--stair-step: {{ min($loop->index, 7) }}"
                    >
                        @if($row['image'])
                            <div class="ag-staircase-content__image">
                                {!! RvMedia::image($row['image'], $row['name'] ?: $shortcode->name) !!}
                            </div>
                        @endif

                        <div class="ag-staircase-content__body">
                            @if($row['name'])
                                <h3>{!! BaseHelper::clean($row['name']) !!}</h3>
                            @endif

                            @if($row['text'])
                                <div class="ag-staircase-content__text">
                                    {!! BaseHelper::clean(nl2br($row['text'])) !!}
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
    .ag-staircase-content {
        overflow: hidden;
        padding: 80px 0 100px;
        background: var(--ag-staircase-background, #fbf8ed);
        color: #172217;
        font-family: "Noto Serif", "Times New Roman", serif;
    }

    .ag-staircase-content * {
        font-family: "Noto Serif", "Times New Roman", serif !important;
    }

    .ag-staircase-content__title {
        margin: 0 0 18px;
        color: #172217;
        font-size: clamp(30px, 3.1vw, 52px);
        font-weight: 700;
        line-height: 1.15;
        text-align: center;
    }

    .ag-staircase-content__description {
        width: 100%;
        max-width: 1180px;
        margin: 0 auto 58px;
        color: #687064;
        font-size: 16px;
        line-height: 1.75;
        text-align: left;
    }

    .ag-staircase-content__description > :last-child {
        margin-bottom: 0;
    }

    .ag-staircase-content__rows {
        display: flex;
        flex-direction: column;
        gap: 30px;
        max-width: 1180px;
        margin: 0 auto;
    }

    .ag-staircase-content__row {
        display: grid;
        grid-template-columns: 40% 60%;
        gap: 0;
        align-items: center;
        width: calc(100% - (var(--stair-step) * 44px));
        margin-left: calc(var(--stair-step) * 44px);
    }

    .ag-staircase-content__image {
        overflow: hidden;
        aspect-ratio: 4 / 3;
        position: relative;
        z-index: 1;
        border: 1px solid rgba(255, 255, 255, .65);
        border-radius: 24px;
        box-shadow: 0 18px 40px rgba(44, 58, 35, .13);
        opacity: 0;
        transform: translateX(-110px) scale(.985);
        transition: opacity .8s ease, transform .8s cubic-bezier(.16, 1, .3, 1);
        will-change: opacity, transform;
    }

    .ag-staircase-content__image img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .45s ease;
    }

    .ag-staircase-content__image:hover img {
        transform: scale(1.035);
    }

    .ag-staircase-content__body {
        position: relative;
        z-index: 2;
        margin-left: -26px;
        padding: clamp(22px, 3vw, 38px) clamp(24px, 3.5vw, 46px);
        border: 1px solid rgba(42, 63, 39, .08);
        border-radius: 20px;
        background: rgba(255, 255, 255, .72);
        box-shadow: 0 12px 30px rgba(44, 58, 35, .07);
        backdrop-filter: blur(8px);
        opacity: 0;
        transform: translateY(18px);
        transition: opacity .6s ease, transform .6s cubic-bezier(.16, 1, .3, 1);
        will-change: opacity, transform;
    }

    .ag-staircase-content__body::before {
        position: absolute;
        top: 24px;
        bottom: 24px;
        left: 0;
        width: 3px;
        border-radius: 3px;
        background: #dc8d3d;
        content: '';
    }

    .ag-staircase-content__row:nth-child(even) .ag-staircase-content__image {
        order: 2;
    }

    .ag-staircase-content__row:nth-child(even) {
        grid-template-columns: 60% 40%;
    }

    .ag-staircase-content__row:nth-child(even) .ag-staircase-content__body {
        order: 1;
        margin-right: -26px;
        margin-left: 0;
    }

    .ag-staircase-content__row:nth-child(even) .ag-staircase-content__body::before {
        right: 0;
        left: auto;
    }

    .ag-staircase-content__row.is-image-visible .ag-staircase-content__image,
    .ag-staircase-content__row.is-content-visible .ag-staircase-content__body {
        opacity: 1;
        transform: translateX(0);
    }

    .ag-staircase-content__body h3 {
        margin: 0 0 10px;
        color: #172217;
        font-size: clamp(20px, 1.8vw, 28px);
        font-weight: 700;
        line-height: 1.3;
    }

    .ag-staircase-content__text {
        color: #687064;
        font-size: 15px;
        line-height: 1.75;
    }

    @media (max-width: 767px) {
        .ag-staircase-content {
            padding: 52px 0 64px;
        }

        .ag-staircase-content__description {
            margin-bottom: 38px;
            font-size: 15px;
        }

        .ag-staircase-content__rows {
            gap: 34px;
        }

        .ag-staircase-content__row {
            grid-template-columns: 1fr;
            gap: 0;
            width: calc(100% - (var(--stair-step) * 8px));
            margin-left: calc(var(--stair-step) * 8px);
        }

        .ag-staircase-content__row:nth-child(even) {
            grid-template-columns: 1fr;
        }

        .ag-staircase-content__image {
            order: 1 !important;
            width: 100%;
        }

        .ag-staircase-content__body {
            order: 2 !important;
            width: calc(100% - 24px);
            margin: -18px 0 0 24px;
            padding: 24px;
        }

        .ag-staircase-content__row:nth-child(even) .ag-staircase-content__body::before {
            right: auto;
            left: 0;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .ag-staircase-content__image,
        .ag-staircase-content__body {
            opacity: 1;
            transform: none;
            transition: none;
        }
    }
</style>

<script>
    (() => {
        const sections = document.querySelectorAll('.ag-staircase-content:not([data-animation-ready])');

        sections.forEach((section) => {
            section.dataset.animationReady = 'true';
            const rows = Array.from(section.querySelectorAll('.ag-staircase-content__row'));

            if (!rows.length || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                rows.forEach((row) => row.classList.add('is-image-visible', 'is-content-visible'));
                return;
            }

            const revealRow = (row) => {
                row.classList.add('is-image-visible');
                window.setTimeout(() => row.classList.add('is-content-visible'), 360);
            };

            if (!('IntersectionObserver' in window)) {
                rows.forEach(revealRow);
                return;
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    observer.unobserve(entry.target);
                    revealRow(entry.target);
                });
            }, {
                threshold: 0.18,
                rootMargin: '0px 0px -10% 0px',
            });

            rows.forEach((row) => observer.observe(row));
        });
    })();
</script>
@endif
