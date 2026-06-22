@php
    $sectionId = 'catalog-' . uniqid();
@endphp

<section id="{{ $sectionId }}" class="catalog-showcase">
    <div class="container">
        @if ($shortcode->section_title)
            <header class="catalog-showcase__header">
                <h2>{!! BaseHelper::clean($shortcode->section_title) !!}</h2>
                <span aria-hidden="true"></span>
            </header>
        @endif

        <div class="catalog-showcase__layout">
            <div class="catalog-showcase__visual">
                @if ($shortcode->image_1)
                    <div class="catalog-showcase__image catalog-showcase__image--back">
                        {!! RvMedia::image($shortcode->image_1, $shortcode->section_title ?: $shortcode->title) !!}
                    </div>
                @endif

                @if ($shortcode->image_2)
                    <div class="catalog-showcase__image catalog-showcase__image--front">
                        {!! RvMedia::image($shortcode->image_2, $shortcode->section_title ?: $shortcode->title) !!}
                    </div>
                @endif
            </div>

            <div class="catalog-showcase__content">
                @if ($shortcode->title)
                    <h3>{!! BaseHelper::clean($shortcode->title) !!}</h3>
                @endif

                @if ($shortcode->subtitle)
                    <p class="catalog-showcase__subtitle">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                @endif

                @if ($shortcode->description)
                    <div class="catalog-showcase__description">
                        {!! BaseHelper::clean($shortcode->description) !!}
                    </div>
                @endif

                @if ($shortcode->button_label)
                    <a class="catalog-showcase__link" href="{{ $shortcode->button_url ?: '#' }}">
                        {!! BaseHelper::clean($shortcode->button_label) !!}
                        <span aria-hidden="true">&#8594;</span>
                    </a>
                @endif

                @if (! empty($items))
                    <div class="catalog-showcase__cards">
                        @foreach ($items as $item)
                            <article class="catalog-showcase__card">
                                @if (! empty($item['image']))
                                    <a class="catalog-showcase__card-image" href="{{ ($item['url'] ?? null) ?: '#' }}">
                                        {!! RvMedia::image($item['image'], $item['title'] ?? '') !!}
                                    </a>
                                @endif

                                @if (! empty($item['title']))
                                    <h4>
                                        <a href="{{ ($item['url'] ?? null) ?: '#' }}">
                                            {!! BaseHelper::clean($item['title']) !!}
                                        </a>
                                    </h4>
                                @endif

                                @if (! empty($item['description']))
                                    <p>{!! BaseHelper::clean($item['description']) !!}</p>
                                @endif

                                <div class="catalog-showcase__stars" aria-label="5 stars">★★★★★</div>

                                @if (! empty($item['button_label']))
                                    <a class="catalog-showcase__card-link" href="{{ ($item['url'] ?? null) ?: '#' }}">
                                        {!! BaseHelper::clean($item['button_label']) !!}
                                    </a>
                                @endif
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<style>
    #{{ $sectionId }} {
        --catalog-accent: #9a6a2f;
        --catalog-text: #171713;
        background: {{ $shortcode->background_color ?: '#faf7f2' }};
        padding: 72px 0 84px;
        color: var(--catalog-text);
        font-family: Georgia, 'Times New Roman', serif;
    }

    #{{ $sectionId }} * {
        font-family: Georgia, 'Times New Roman', serif;
    }

    #{{ $sectionId }} .catalog-showcase__header {
        margin: 0 auto 44px;
        text-align: center;
    }

    #{{ $sectionId }} .catalog-showcase__header h2 {
        margin: 0;
        font-size: clamp(28px, 3vw, 46px);
        line-height: 1.15;
        font-weight: 600;
        letter-spacing: -.03em;
    }

    #{{ $sectionId }} .catalog-showcase__header span {
        display: block;
        width: 76px;
        height: 1px;
        margin: 18px auto 0;
        background: #d9c9aa;
    }

    #{{ $sectionId }} .catalog-showcase__layout {
        display: grid;
        grid-template-columns: minmax(0, .94fr) minmax(0, 1.06fr);
        gap: clamp(42px, 6vw, 86px);
        align-items: center;
    }

    #{{ $sectionId }} .catalog-showcase__visual {
        position: relative;
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 34px;
        align-items: center;
        min-height: 0;
        padding: 42px 0;
        isolation: isolate;
    }

    #{{ $sectionId }} .catalog-showcase__visual::before {
        display: none;
    }

    #{{ $sectionId }} .catalog-showcase__image {
        position: relative;
        overflow: hidden;
        box-sizing: border-box;
        width: 100%;
        aspect-ratio: 2 / 3;
        padding: 9px;
        border-radius: 30px;
        background: #fff;
        box-shadow: 0 20px 45px rgba(67, 51, 31, .14);
    }

    #{{ $sectionId }} .catalog-showcase__image img {
        width: 100%;
        height: 100%;
        border-radius: 22px;
        object-fit: cover;
        object-position: center;
    }

    #{{ $sectionId }} .catalog-showcase__image--back {
        inset: auto;
        transform: translateY(-30px);
    }

    #{{ $sectionId }} .catalog-showcase__image--front {
        right: auto;
        bottom: auto;
        width: 100%;
        height: auto;
        border: 0;
        border-radius: 30px;
        box-shadow: 0 20px 45px rgba(67, 51, 31, .14);
        transform: translateY(30px);
    }

    #{{ $sectionId }} .catalog-showcase__image--front::after {
        display: none;
    }

    #{{ $sectionId }} .catalog-showcase__content > h3 {
        margin: 0 0 8px;
        font-size: clamp(27px, 2.4vw, 38px);
        line-height: 1.2;
    }

    #{{ $sectionId }} .catalog-showcase__subtitle {
        margin: 0 0 13px;
        font-size: 16px;
        font-weight: 600;
    }

    #{{ $sectionId }} .catalog-showcase__description {
        max-width: 680px;
        color: #666257;
        font-size: 15px;
        line-height: 1.75;
    }

    #{{ $sectionId }} .catalog-showcase__description p:last-child {
        margin-bottom: 0;
    }

    #{{ $sectionId }} .catalog-showcase__link,
    #{{ $sectionId }} .catalog-showcase__card-link {
        display: inline-flex;
        gap: 8px;
        align-items: center;
        margin-top: 14px;
        color: var(--catalog-accent);
        font-weight: 600;
        text-decoration: none;
    }

    #{{ $sectionId }} .catalog-showcase__cards {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
        margin-top: 30px;
    }

    #{{ $sectionId }} .catalog-showcase__card-image {
        display: block;
        overflow: hidden;
        aspect-ratio: 1.45 / 1;
        margin-bottom: 14px;
        border-radius: 13px;
    }

    #{{ $sectionId }} .catalog-showcase__card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .35s ease;
    }

    #{{ $sectionId }} .catalog-showcase__card:hover img {
        transform: scale(1.05);
    }

    #{{ $sectionId }} .catalog-showcase__card h4 {
        margin: 0 0 6px;
        font-size: 16px;
        line-height: 1.35;
    }

    #{{ $sectionId }} .catalog-showcase__card h4 a {
        color: inherit;
        text-decoration: none;
    }

    #{{ $sectionId }} .catalog-showcase__card p {
        margin: 0;
        color: #716d63;
        font-size: 13px;
        line-height: 1.55;
    }

    #{{ $sectionId }} .catalog-showcase__stars {
        margin-top: 9px;
        color: #bc833b;
        font-size: 12px;
        letter-spacing: 3px;
    }

    #{{ $sectionId }} .catalog-showcase__card-link {
        margin-top: 8px;
        font-size: 13px;
    }

    @media (max-width: 991px) {
        #{{ $sectionId }} .catalog-showcase__layout {
            grid-template-columns: 1fr;
        }

        #{{ $sectionId }} .catalog-showcase__visual {
            width: min(100%, 680px);
            min-height: 0;
            margin: 0 auto;
        }
    }

    @media (max-width: 767px) {
        #{{ $sectionId }} {
            padding: 52px 0 60px;
        }

        #{{ $sectionId }} .catalog-showcase__header {
            margin-bottom: 32px;
        }

        #{{ $sectionId }} .catalog-showcase__visual {
            gap: 22px;
            min-height: 0;
            padding: 20px 0;
        }

        #{{ $sectionId }} .catalog-showcase__image--back {
            inset: auto;
            transform: translateY(-18px);
        }

        #{{ $sectionId }} .catalog-showcase__image--front {
            right: auto;
            bottom: auto;
            width: 100%;
            height: auto;
            border-width: 0;
            border-radius: 24px;
            transform: translateY(18px);
        }

        #{{ $sectionId }} .catalog-showcase__cards {
            grid-template-columns: 1fr;
        }

        #{{ $sectionId }} .catalog-showcase__card-image {
            aspect-ratio: 16 / 9;
        }
    }

    @media (max-width: 480px) {
        #{{ $sectionId }} .catalog-showcase__visual {
            gap: 12px;
            min-height: 0;
        }

        #{{ $sectionId }} .catalog-showcase__image {
            aspect-ratio: 3 / 4;
            padding: 5px;
            border-radius: 18px;
        }

        #{{ $sectionId }} .catalog-showcase__image img {
            border-radius: 13px;
        }

        #{{ $sectionId }} .catalog-showcase__image--front {
            width: 100%;
            height: auto;
            border-radius: 18px;
        }
    }

    #{{ $sectionId }}.catalog-motion .catalog-showcase__header,
    #{{ $sectionId }}.catalog-motion .catalog-showcase__visual,
    #{{ $sectionId }}.catalog-motion .catalog-showcase__content {
        opacity: 0;
        filter: blur(5px);
        transform: translateY(24px) scale(.99);
        transition: opacity .95s ease, filter .95s ease, transform .95s cubic-bezier(.22, 1, .36, 1);
        will-change: opacity, filter, transform;
    }

    #{{ $sectionId }}.catalog-motion .catalog-showcase__visual {
        transform: translateX(-46px) scale(.985);
    }

    #{{ $sectionId }}.catalog-motion .catalog-showcase__content {
        transform: translateX(46px) scale(.99);
    }

    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-showcase__header,
    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-showcase__visual,
    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-showcase__content {
        opacity: 1;
        filter: blur(0);
        transform: none;
    }

    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-showcase__visual {
        transition-delay: .1s;
    }

    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-showcase__content {
        transition-delay: .2s;
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
            if (!entry.isIntersecting) return;
            section.classList.add('catalog-is-visible');
            observer.disconnect();
        }, { threshold: 0.12, rootMargin: '-5% 0px -5% 0px' });
        requestAnimationFrame(() => {
            requestAnimationFrame(() => observer.observe(section));
        });
    })();
</script>
