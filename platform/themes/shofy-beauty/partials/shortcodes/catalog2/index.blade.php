@php
    $sectionId = 'catalog2-' . uniqid();
    $backgroundColor = strtolower((string) $shortcode->background_color) === '#173d32'
        ? '#f4f2eb'
        : ($shortcode->background_color ?: '#f4f2eb');
    $accentColor = strtolower((string) $shortcode->accent_color) === '#dfbd74'
        ? '#24634d'
        : ($shortcode->accent_color ?: '#24634d');
@endphp

<section id="{{ $sectionId }}" class="catalog-zigzag">
    <div class="container">
        <div class="catalog-zigzag__inner">
            @if ($shortcode->section_title || $shortcode->title)
                <header class="catalog-zigzag__header">
                    @if ($shortcode->section_title)
                        <div class="catalog-zigzag__eyebrow">
                            <span></span>
                            {!! BaseHelper::clean($shortcode->section_title) !!}
                            <span></span>
                        </div>
                    @endif

                    @if ($shortcode->title)
                        <h2>{!! BaseHelper::clean($shortcode->title) !!}</h2>
                    @endif
                </header>
            @endif

            <div class="catalog-zigzag__row catalog-zigzag__row--primary">
                @if ($shortcode->image_1)
                    <figure class="catalog-zigzag__media catalog-zigzag__media--primary">
                        {!! RvMedia::image($shortcode->image_1, $shortcode->title ?: $shortcode->section_title) !!}
                        <span aria-hidden="true"></span>
                    </figure>
                @endif

                <div class="catalog-zigzag__content">
                    @if ($shortcode->subtitle)
                        <p class="catalog-zigzag__subtitle">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                    @endif

                    @if ($shortcode->description)
                        <div class="catalog-zigzag__description">
                            {!! BaseHelper::clean($shortcode->description) !!}
                        </div>
                    @endif

                    @if ($shortcode->button_label)
                        <a class="catalog-zigzag__button" href="{{ $shortcode->button_url ?: '#' }}">
                            {!! BaseHelper::clean($shortcode->button_label) !!}
                            <span aria-hidden="true">&#8594;</span>
                        </a>
                    @endif
                </div>
            </div>

            @if ($shortcode->image_2 || ! empty($items))
                <div class="catalog-zigzag__row catalog-zigzag__row--secondary">
                    @if (! empty($items))
                        <div class="catalog-zigzag__services">
                            <div class="catalog-zigzag__services-heading">
                                <span>{{ __('What we offer') }}</span>
                                <strong>{{ str_pad((string) count($items), 2, '0', STR_PAD_LEFT) }}</strong>
                            </div>

                            <div class="catalog-zigzag__service-list">
                                @foreach ($items as $item)
                                    <article class="catalog-zigzag__service">
                                        <div class="catalog-zigzag__service-number">
                                            {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                        </div>

                                        @if (! empty($item['image']))
                                            <a class="catalog-zigzag__service-image" href="{{ ($item['url'] ?? null) ?: '#' }}">
                                                {!! RvMedia::image($item['image'], $item['title'] ?? '') !!}
                                            </a>
                                        @endif

                                        <div class="catalog-zigzag__service-body">
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
                                                <a class="catalog-zigzag__service-link" href="{{ ($item['url'] ?? null) ?: '#' }}">
                                                    {!! BaseHelper::clean($item['button_label']) !!} &#8599;
                                                </a>
                                            @endif
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if ($shortcode->image_2)
                        <figure class="catalog-zigzag__media catalog-zigzag__media--secondary">
                            {!! RvMedia::image($shortcode->image_2, $shortcode->title ?: $shortcode->section_title) !!}
                            <span aria-hidden="true"></span>
                        </figure>
                    @endif
                </div>
            @endif
        </div>
    </div>
</section>

<style>
    #{{ $sectionId }} {
        --catalog-zigzag-bg: {{ $backgroundColor }};
        --catalog-zigzag-accent: {{ $accentColor }};
        padding: 86px 0;
        background: var(--catalog-zigzag-bg);
        color: #1b2923;
        font-family: "Noto Serif", "Times New Roman", serif;
    }

    #{{ $sectionId }} * {
        font-family: "Noto Serif", "Times New Roman", serif !important;
    }

    #{{ $sectionId }} .catalog-zigzag__inner {
        position: relative;
    }

    #{{ $sectionId }} .catalog-zigzag__header {
        max-width: 900px;
        margin: 0 auto clamp(52px, 7vw, 92px);
        text-align: center;
    }

    #{{ $sectionId }} .catalog-zigzag__header h2 {
        margin: 0;
        color: #17231e;
        font-size: clamp(38px, 4.8vw, 70px);
        font-weight: 500;
        line-height: 1.04;
        letter-spacing: -.045em;
    }

    #{{ $sectionId }} .catalog-zigzag__row {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: clamp(44px, 7vw, 104px);
        align-items: center;
    }

    #{{ $sectionId }} .catalog-zigzag__row--secondary {
        margin-top: clamp(70px, 9vw, 130px);
    }

    #{{ $sectionId }} .catalog-zigzag__media {
        position: relative;
        z-index: 1;
        overflow: visible;
        box-sizing: border-box;
        margin: 0;
        aspect-ratio: 16 / 11;
        padding: 9px;
        border-radius: 28px;
        background: #fff;
        box-shadow: 0 24px 60px rgba(35, 63, 50, .14);
    }

    #{{ $sectionId }} .catalog-zigzag__media img {
        position: relative;
        z-index: 1;
        width: 100%;
        height: 100%;
        border-radius: 20px;
        object-fit: cover;
    }

    #{{ $sectionId }} .catalog-zigzag__media > span {
        position: absolute;
        z-index: -1;
        width: 42%;
        aspect-ratio: 1;
        border-radius: 50%;
        background: color-mix(in srgb, var(--catalog-zigzag-accent) 14%, transparent);
    }

    #{{ $sectionId }} .catalog-zigzag__media--primary > span {
        top: -34px;
        left: -34px;
    }

    #{{ $sectionId }} .catalog-zigzag__media--secondary > span {
        right: -34px;
        bottom: -34px;
    }

    #{{ $sectionId }} .catalog-zigzag__content {
        max-width: 560px;
    }

    #{{ $sectionId }} .catalog-zigzag__eyebrow {
        display: flex;
        gap: 12px;
        align-items: center;
        margin-bottom: 22px;
        color: var(--catalog-zigzag-accent);
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .14em;
        text-transform: uppercase;
        justify-content: center;
    }

    #{{ $sectionId }} .catalog-zigzag__eyebrow span {
        width: 38px;
        height: 2px;
        background: currentColor;
    }

    #{{ $sectionId }} .catalog-zigzag__subtitle {
        margin: 0 0 12px;
        color: #315346;
        font-size: 18px;
        font-weight: 600;
    }

    #{{ $sectionId }} .catalog-zigzag__description {
        color: #6b7771;
        font-size: 15px;
        line-height: 1.8;
    }

    #{{ $sectionId }} .catalog-zigzag__description p:last-child {
        margin-bottom: 0;
    }

    #{{ $sectionId }} .catalog-zigzag__button {
        display: inline-flex;
        gap: 18px;
        align-items: center;
        min-height: 52px;
        margin-top: 28px;
        padding: 0 25px;
        border-radius: 999px;
        background: var(--catalog-zigzag-accent);
        color: #fff;
        font-weight: 700;
        text-decoration: none;
        transition: transform .25s ease, box-shadow .25s ease;
    }

    #{{ $sectionId }} .catalog-zigzag__button:hover {
        color: #fff;
        box-shadow: 0 12px 26px rgba(35, 83, 64, .22);
        transform: translateY(-2px);
    }

    #{{ $sectionId }} .catalog-zigzag__services-heading {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 12px;
        padding-bottom: 16px;
        border-bottom: 1px solid rgba(35, 83, 64, .18);
        color: var(--catalog-zigzag-accent);
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .12em;
        text-transform: uppercase;
    }

    #{{ $sectionId }} .catalog-zigzag__services-heading strong {
        font-size: 28px;
        font-weight: 500;
        line-height: 1;
    }

    #{{ $sectionId }} .catalog-zigzag__service {
        display: grid;
        grid-template-columns: 34px auto 1fr;
        gap: 16px;
        align-items: center;
        padding: 18px 0;
        border-bottom: 1px solid rgba(35, 83, 64, .12);
    }

    #{{ $sectionId }} .catalog-zigzag__service-number {
        color: rgba(35, 83, 64, .45);
        font-size: 12px;
        font-weight: 700;
    }

    #{{ $sectionId }} .catalog-zigzag__service-image {
        display: block;
        overflow: hidden;
        width: 76px;
        height: 68px;
        border-radius: 14px;
    }

    #{{ $sectionId }} .catalog-zigzag__service-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .3s ease;
    }

    #{{ $sectionId }} .catalog-zigzag__service:hover img {
        transform: scale(1.06);
    }

    #{{ $sectionId }} .catalog-zigzag__service-body {
        min-width: 0;
    }

    #{{ $sectionId }} .catalog-zigzag__service h3 {
        margin: 0 0 5px;
        font-size: 17px;
        line-height: 1.35;
    }

    #{{ $sectionId }} .catalog-zigzag__service h3 a {
        color: #1b2923;
        text-decoration: none;
    }

    #{{ $sectionId }} .catalog-zigzag__service p {
        display: -webkit-box;
        overflow: hidden;
        margin: 0;
        color: #758079;
        font-size: 13px;
        line-height: 1.55;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }

    #{{ $sectionId }} .catalog-zigzag__service-link {
        display: inline-block;
        margin-top: 7px;
        color: var(--catalog-zigzag-accent);
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
    }

    @media (max-width: 991px) {
        #{{ $sectionId }} {
            padding: 68px 0;
        }

        #{{ $sectionId }} .catalog-zigzag__row {
            gap: 42px;
        }

        #{{ $sectionId }} .catalog-zigzag__media {
            aspect-ratio: 4 / 3;
        }
    }

    @media (max-width: 767px) {
        #{{ $sectionId }} {
            padding: 52px 0;
        }

        #{{ $sectionId }} .catalog-zigzag__row {
            grid-template-columns: 1fr;
            gap: 34px;
        }

        #{{ $sectionId }} .catalog-zigzag__row--secondary {
            margin-top: 66px;
        }

        #{{ $sectionId }} .catalog-zigzag__media {
            aspect-ratio: 16 / 11;
            padding: 6px;
            border-radius: 20px;
        }

        #{{ $sectionId }} .catalog-zigzag__media img {
            border-radius: 15px;
        }

        #{{ $sectionId }} .catalog-zigzag__media > span {
            display: none;
        }
    }

    @media (max-width: 480px) {
        #{{ $sectionId }} .catalog-zigzag__service {
            grid-template-columns: 26px 58px 1fr;
            gap: 10px;
        }

        #{{ $sectionId }} .catalog-zigzag__service-image {
            width: 58px;
            height: 58px;
        }
    }

    #{{ $sectionId }}.catalog-motion .catalog-zigzag__header,
    #{{ $sectionId }}.catalog-motion .catalog-zigzag__row {
        opacity: 0;
        filter: blur(7px);
        transform: translateY(46px) scale(.98);
        transition: opacity 1.1s ease, filter 1.1s ease, transform 1.1s cubic-bezier(.22, 1, .36, 1);
        will-change: opacity, filter, transform;
    }

    #{{ $sectionId }}.catalog-motion .catalog-zigzag__row--primary {
        transform: translateY(46px) scale(.98);
    }

    #{{ $sectionId }}.catalog-motion .catalog-zigzag__row--secondary {
        transform: translateY(54px) scale(.98);
    }

    #{{ $sectionId }}.catalog-motion .catalog-zigzag__media img {
        transform: scale(1.045);
        transition: transform 1.35s cubic-bezier(.22, 1, .36, 1);
    }

    #{{ $sectionId }}.catalog-motion .catalog-zigzag__service {
        opacity: 0;
        transform: translateY(18px);
        transition: opacity .65s ease, transform .65s cubic-bezier(.22, 1, .36, 1);
    }

    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-zigzag__header,
    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-zigzag__row {
        opacity: 1;
        filter: blur(0);
        transform: none;
    }

    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-zigzag__media img,
    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-zigzag__service {
        opacity: 1;
        transform: none;
    }

    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-zigzag__row--primary {
        transition-delay: .1s;
    }

    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-zigzag__row--secondary {
        transition-delay: .28s;
    }

    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-zigzag__service:nth-child(1) { transition-delay: .42s; }
    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-zigzag__service:nth-child(2) { transition-delay: .5s; }
    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-zigzag__service:nth-child(3) { transition-delay: .58s; }
    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-zigzag__service:nth-child(4) { transition-delay: .66s; }
    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-zigzag__service:nth-child(5) { transition-delay: .74s; }
    #{{ $sectionId }}.catalog-motion.catalog-is-visible .catalog-zigzag__service:nth-child(6) { transition-delay: .82s; }
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
        }, { threshold: 0.1, rootMargin: '-5% 0px -5% 0px' });
        requestAnimationFrame(() => {
            requestAnimationFrame(() => observer.observe(section));
        });
    })();
</script>
