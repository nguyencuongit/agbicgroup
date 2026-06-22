@php
    $sectionId = 'catalog3-' . uniqid();
    $backgroundColor = $shortcode->background_color ?: '#eef2ea';
    $accentColor = $shortcode->accent_color ?: '#1f5a45';
@endphp

<section id="{{ $sectionId }}" class="catalog-bento">
    <div class="container">
        @if ($shortcode->section_title || $shortcode->title)
            <header class="catalog-bento__header">
                @if ($shortcode->section_title)
                    <div class="catalog-bento__eyebrow">
                        <span></span>
                        {!! BaseHelper::clean($shortcode->section_title) !!}
                    </div>
                @endif

                @if ($shortcode->title)
                    <h2>{!! BaseHelper::clean($shortcode->title) !!}</h2>
                @endif
            </header>
        @endif

        <div class="catalog-bento__grid">
            @if ($shortcode->image_1)
                <figure class="catalog-bento__tile catalog-bento__image catalog-bento__image--large">
                    {!! RvMedia::image($shortcode->image_1, $shortcode->title ?: $shortcode->section_title) !!}
                </figure>
            @endif

            @if ($shortcode->image_2)
                <figure class="catalog-bento__tile catalog-bento__image catalog-bento__image--small">
                    {!! RvMedia::image($shortcode->image_2, $shortcode->title ?: $shortcode->section_title) !!}
                </figure>
            @endif

            <div class="catalog-bento__tile catalog-bento__content">
                <span class="catalog-bento__content-mark" aria-hidden="true">&#10022;</span>

                @if ($shortcode->subtitle)
                    <h3>{!! BaseHelper::clean($shortcode->subtitle) !!}</h3>
                @endif

                @if ($shortcode->description)
                    <div class="catalog-bento__description">
                        {!! BaseHelper::clean($shortcode->description) !!}
                    </div>
                @endif

                @if ($shortcode->button_label)
                    <a href="{{ $shortcode->button_url ?: '#' }}">
                        {!! BaseHelper::clean($shortcode->button_label) !!}
                        <span aria-hidden="true">&#8599;</span>
                    </a>
                @endif
            </div>
        </div>

        @if (! empty($items))
            <div class="catalog-bento__services">
                @foreach ($items as $item)
                    <article class="catalog-bento__service">
                        <div class="catalog-bento__service-top">
                            @if (! empty($item['image']))
                                <a class="catalog-bento__service-image" href="{{ ($item['url'] ?? null) ?: '#' }}">
                                    {!! RvMedia::image($item['image'], $item['title'] ?? '') !!}
                                </a>
                            @else
                                <span class="catalog-bento__service-number">
                                    {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </span>
                            @endif

                            <span class="catalog-bento__service-arrow" aria-hidden="true">&#8599;</span>
                        </div>

                        @if (! empty($item['title']))
                            <h3>
                                <a href="{{ ($item['url'] ?? null) ?: '#' }}">
                                    {!! BaseHelper::clean($item['title']) !!}
                                </a>
                            </h3>
                        @endif

                        @if (! empty($item['description']))
                            <p>{!! BaseHelper::clean($item['description']) !!}</p>
                        @endif

                        @if (! empty($item['button_label']))
                            <a class="catalog-bento__service-link" href="{{ ($item['url'] ?? null) ?: '#' }}">
                                {!! BaseHelper::clean($item['button_label']) !!}
                            </a>
                        @endif
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</section>

<style>
    #{{ $sectionId }} {
        --catalog-bento-bg: {{ $backgroundColor }};
        --catalog-bento-accent: {{ $accentColor }};
        padding: 86px 0;
        background: var(--catalog-bento-bg);
        color: #192620;
        font-family: Georgia, 'Times New Roman', serif;
    }

    #{{ $sectionId }} * {
        font-family: Georgia, 'Times New Roman', serif;
    }

    #{{ $sectionId }} .catalog-bento__header {
        max-width: 880px;
        margin: 0 auto 52px;
        text-align: center;
    }

    #{{ $sectionId }} .catalog-bento__eyebrow {
        display: flex;
        gap: 12px;
        align-items: center;
        justify-content: center;
        margin-bottom: 18px;
        color: var(--catalog-bento-accent);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .15em;
        text-transform: uppercase;
    }

    #{{ $sectionId }} .catalog-bento__eyebrow span {
        width: 34px;
        height: 2px;
        background: currentColor;
    }

    #{{ $sectionId }} .catalog-bento__header h2 {
        margin: 0;
        color: #17231e;
        font-size: clamp(38px, 4.8vw, 70px);
        font-weight: 500;
        line-height: 1.05;
        letter-spacing: -.045em;
    }

    #{{ $sectionId }} .catalog-bento__grid {
        display: grid;
        grid-template-columns: repeat(12, minmax(0, 1fr));
        grid-template-rows: 285px 315px;
        gap: 18px;
        width: 94%;
        max-width: 1200px;
        margin: 0 auto;
    }

    #{{ $sectionId }} .catalog-bento__tile {
        overflow: hidden;
        margin: 0;
        border-radius: 28px;
    }

    #{{ $sectionId }} .catalog-bento__image--large {
        grid-column: 1 / span 7;
        grid-row: 1 / span 2;
        background: transparent;
    }

    #{{ $sectionId }} .catalog-bento__image--small {
        grid-column: 8 / span 5;
        grid-row: 1;
        background: transparent;
    }

    #{{ $sectionId }} .catalog-bento__image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform .55s ease;
    }

    #{{ $sectionId }} .catalog-bento__image:hover img {
        transform: none;
    }

    #{{ $sectionId }} .catalog-bento__content {
        position: relative;
        grid-column: 8 / span 5;
        grid-row: 2;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        overflow: hidden;
        padding: clamp(22px, 2.5vw, 34px);
        background: var(--catalog-bento-accent);
        color: #fff;
    }

    #{{ $sectionId }} .catalog-bento__content-mark {
        position: absolute;
        top: 20px;
        right: 24px;
        color: rgba(255, 255, 255, .35);
        font-size: 28px;
    }

    #{{ $sectionId }} .catalog-bento__content h3 {
        display: -webkit-box;
        overflow: hidden;
        max-width: 420px;
        margin: 0 0 9px;
        color: #fff;
        font-size: clamp(19px, 1.8vw, 26px);
        line-height: 1.25;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
    }

    #{{ $sectionId }} .catalog-bento__description {
        display: -webkit-box;
        overflow: hidden;
        color: rgba(255, 255, 255, .72);
        font-size: 14px;
        line-height: 1.7;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }

    #{{ $sectionId }} .catalog-bento__description p:last-child {
        margin-bottom: 0;
    }

    #{{ $sectionId }} .catalog-bento__content > a {
        display: inline-flex;
        gap: 16px;
        align-items: center;
        margin-top: 12px;
        color: #fff;
        font-weight: 700;
        text-decoration: none;
    }

    #{{ $sectionId }} .catalog-bento__services {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
        margin-top: 18px;
    }

    #{{ $sectionId }} .catalog-bento__service {
        padding: 24px;
        border: 1px solid rgba(31, 90, 69, .09);
        border-radius: 22px;
        background: rgba(255, 255, 255, .78);
        transition: transform .25s ease, box-shadow .25s ease;
    }

    #{{ $sectionId }} .catalog-bento__service:hover {
        box-shadow: 0 15px 36px rgba(35, 63, 50, .09);
        transform: translateY(-5px);
    }

    #{{ $sectionId }} .catalog-bento__service-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 18px;
    }

    #{{ $sectionId }} .catalog-bento__service-image {
        display: block;
        overflow: hidden;
        width: 64px;
        height: 64px;
        border-radius: 50%;
    }

    #{{ $sectionId }} .catalog-bento__service-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #{{ $sectionId }} .catalog-bento__service-number {
        color: var(--catalog-bento-accent);
        font-size: 13px;
        font-weight: 800;
    }

    #{{ $sectionId }} .catalog-bento__service-arrow {
        color: rgba(31, 90, 69, .45);
        font-size: 20px;
    }

    #{{ $sectionId }} .catalog-bento__service h3 {
        margin: 0 0 8px;
        font-size: 18px;
        line-height: 1.35;
    }

    #{{ $sectionId }} .catalog-bento__service h3 a {
        color: #192620;
        text-decoration: none;
    }

    #{{ $sectionId }} .catalog-bento__service p {
        display: -webkit-box;
        overflow: hidden;
        margin: 0;
        color: #758079;
        font-size: 13px;
        line-height: 1.6;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }

    #{{ $sectionId }} .catalog-bento__service-link {
        display: inline-block;
        margin-top: 12px;
        color: var(--catalog-bento-accent);
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
    }

    @media (max-width: 991px) {
        #{{ $sectionId }} .catalog-bento__grid {
            grid-template-rows: 245px 275px;
            width: 97%;
        }

        #{{ $sectionId }} .catalog-bento__services {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 767px) {
        #{{ $sectionId }} {
            padding: 58px 0;
        }

        #{{ $sectionId }} .catalog-bento__grid {
            grid-template-columns: 1fr;
            grid-template-rows: none;
            width: 100%;
        }

        #{{ $sectionId }} .catalog-bento__image--large,
        #{{ $sectionId }} .catalog-bento__image--small,
        #{{ $sectionId }} .catalog-bento__content {
            grid-column: 1;
            grid-row: auto;
        }

        #{{ $sectionId }} .catalog-bento__image--large {
            aspect-ratio: 16 / 11;
        }

        #{{ $sectionId }} .catalog-bento__image--small {
            aspect-ratio: 16 / 9;
        }

        #{{ $sectionId }} .catalog-bento__content {
            min-height: 230px;
        }

        #{{ $sectionId }} .catalog-bento__services {
            grid-template-columns: 1fr;
        }
    }

    #{{ $sectionId }}.catalog-motion .catalog-bento__header,
    #{{ $sectionId }}.catalog-motion .catalog-bento__grid,
    #{{ $sectionId }}.catalog-motion .catalog-bento__services {
        opacity: 0;
        filter: blur(5px);
        transform: translateY(26px) scale(.99);
        transition: opacity 1s ease, filter 1s ease, transform 1s cubic-bezier(.22, 1, .36, 1);
        will-change: opacity, filter, transform;
    }

    #{{ $sectionId }}.catalog-motion .catalog-bento__grid {
        transform: translateY(24px) scale(.98);
    }

    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-bento__header,
    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-bento__grid,
    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-bento__services {
        opacity: 1;
        filter: blur(0);
        transform: none;
    }

    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-bento__grid {
        transition-delay: .1s;
    }

    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-bento__services {
        transition-delay: .22s;
    }

    @media (prefers-reduced-motion: reduce) {
        #{{ $sectionId }}.catalog-motion * {
            opacity: 1 !important;
            filter: none !important;
            transform: none !important;
            transition: none !important;
        }
    }
</style>

<script>
    (() => {
        const section = document.getElementById(@json($sectionId));
        if (!section || !('IntersectionObserver' in window)) return;
        section.classList.add('catalog-motion');
        const observer = new IntersectionObserver(([entry]) => {
            section.classList.toggle('catalog-is-visible', entry.isIntersecting);
        }, { threshold: 0.1, rootMargin: '-5% 0px -5% 0px' });
        requestAnimationFrame(() => {
            requestAnimationFrame(() => observer.observe(section));
        });
    })();
</script>
