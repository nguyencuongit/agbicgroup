@php
    $sectionId = 'pain-executive-' . uniqid();
    $backgroundColor = $shortcode->background_color ?: '#ffffff';
    $accentColor = $shortcode->accent_color ?: '#287b38';
@endphp

<section id="{{ $sectionId }}" class="pain-executive">
    <div class="container">
        <header class="pain-executive__header">
            @if ($shortcode->section_label)
                <span class="pain-executive__label">{!! BaseHelper::clean($shortcode->section_label) !!}</span>
            @endif

            @if ($shortcode->title)
                <h2>{!! BaseHelper::clean($shortcode->title) !!}</h2>
            @endif

            @if ($shortcode->description)
                <div class="pain-executive__intro">{!! BaseHelper::clean($shortcode->description) !!}</div>
            @endif
        </header>

        <div class="pain-executive__layout">
            @if ($shortcode->image)
                <figure class="pain-executive__visual">
                    {!! RvMedia::image($shortcode->image, $shortcode->image_title ?: $shortcode->title) !!}
                    <span class="pain-executive__shade"></span>

                    <figcaption>
                        @if ($shortcode->image_label)
                            <span class="pain-executive__visual-label">{!! BaseHelper::clean($shortcode->image_label) !!}</span>
                        @endif

                        @if ($shortcode->image_title)
                            <h3>{!! BaseHelper::clean($shortcode->image_title) !!}</h3>
                        @endif

                        @if ($shortcode->image_description)
                            <p>{!! BaseHelper::clean($shortcode->image_description) !!}</p>
                        @endif
                    </figcaption>
                </figure>
            @endif

            @if (! empty($items))
                <div class="pain-executive__timeline">
                    @foreach ($items as $item)
                        <article class="pain-executive__item">
                            <div class="pain-executive__marker">
                                {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </div>

                            <div class="pain-executive__card">
                                @if (! empty($item['title']))
                                    <h3>{!! BaseHelper::clean($item['title']) !!}</h3>
                                @endif

                                @if (! empty($item['description']))
                                    <p>{!! BaseHelper::clean($item['description']) !!}</p>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>

<style>
    #{{ $sectionId }} {
        --pain-accent: {{ $accentColor }};
        padding: 88px 0 96px;
        background: {{ $backgroundColor }};
        color: #111827;
        font-family: "Noto Serif", "Times New Roman", serif;
    }

    #{{ $sectionId }} * {
        font-family: "Noto Serif", "Times New Roman", serif !important;
    }

    #{{ $sectionId }} .pain-executive__header {
        max-width: 1120px;
        margin: 0 auto 68px;
        text-align: center;
    }

    #{{ $sectionId }} .pain-executive__label {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 44px;
        margin-bottom: 24px;
        padding: 0 26px;
        border-radius: 999px;
        background: color-mix(in srgb, var(--pain-accent) 10%, white);
        color: var(--pain-accent);
        font-size: 13px;
        font-weight: 800;
        letter-spacing: .17em;
        text-transform: uppercase;
    }

    #{{ $sectionId }} .pain-executive__header h2 {
        margin: 0;
        color: #111827;
        font-size: clamp(38px, 5vw, 70px);
        font-weight: 750;
        line-height: 1.04;
        letter-spacing: -.045em;
    }

    #{{ $sectionId }} .pain-executive__intro {
        max-width: 850px;
        margin: 24px auto 0;
        color: #6b7280;
        font-size: 17px;
        font-weight: 500;
        line-height: 1.75;
    }

    #{{ $sectionId }} .pain-executive__intro p:last-child {
        margin-bottom: 0;
    }

    #{{ $sectionId }} .pain-executive__layout {
        display: grid;
        grid-template-columns: minmax(0, .98fr) minmax(0, 1.02fr);
        gap: clamp(58px, 7vw, 100px);
        align-items: stretch;
    }

    #{{ $sectionId }} .pain-executive__visual {
        position: relative;
        overflow: hidden;
        min-height: 720px;
        margin: 0;
        border-radius: 36px;
        background: #d1d5db;
        box-shadow: 0 24px 55px rgba(17, 24, 39, .12);
    }

    #{{ $sectionId }} .pain-executive__visual > img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: grayscale(.92) saturate(.35);
        transition: transform .8s cubic-bezier(.22, 1, .36, 1);
    }

    #{{ $sectionId }} .pain-executive__visual:hover > img {
        transform: scale(1.025);
    }

    #{{ $sectionId }} .pain-executive__shade {
        position: absolute;
        inset: 36% 0 0;
        background: linear-gradient(180deg, transparent, rgba(0, 0, 0, .86));
        pointer-events: none;
    }

    #{{ $sectionId }} .pain-executive__visual figcaption {
        position: absolute;
        right: 38px;
        bottom: 42px;
        left: 38px;
        z-index: 1;
        color: #fff;
    }

    #{{ $sectionId }} .pain-executive__visual-label {
        display: inline-flex;
        margin-bottom: 16px;
        padding: 7px 14px;
        border-radius: 999px;
        background: rgba(0, 0, 0, .58);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .1em;
        text-transform: uppercase;
    }

    #{{ $sectionId }} .pain-executive__visual h3 {
        margin: 0 0 12px;
        color: #fff;
        font-size: clamp(34px, 4vw, 54px);
        line-height: 1.08;
    }

    #{{ $sectionId }} .pain-executive__visual p {
        margin: 0;
        color: rgba(255, 255, 255, .88);
        font-size: 15px;
        line-height: 1.6;
    }

    #{{ $sectionId }} .pain-executive__timeline {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 30px;
        padding: 0 0 0 74px;
    }

    #{{ $sectionId }} .pain-executive__timeline::before {
        position: absolute;
        top: 50px;
        bottom: 50px;
        left: 38px;
        width: 1px;
        background: color-mix(in srgb, var(--pain-accent) 38%, transparent);
        content: '';
    }

    #{{ $sectionId }} .pain-executive__item {
        position: relative;
    }

    #{{ $sectionId }} .pain-executive__marker {
        position: absolute;
        top: 50%;
        left: -74px;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 76px;
        height: 76px;
        border: 2px solid var(--pain-accent);
        border-radius: 50%;
        background: {{ $backgroundColor }};
        color: var(--pain-accent);
        font-size: 24px;
        font-weight: 800;
        transform: translateY(-50%);
    }

    #{{ $sectionId }} .pain-executive__card {
        min-height: 144px;
        padding: 28px 30px;
        border: 1px solid #e5e7eb;
        border-radius: 24px;
        background: #fff;
        box-shadow: 0 14px 34px rgba(17, 24, 39, .055);
        transition: border-color .25s ease, box-shadow .25s ease, transform .25s ease;
    }

    #{{ $sectionId }} .pain-executive__card:hover {
        border-color: color-mix(in srgb, var(--pain-accent) 30%, #e5e7eb);
        box-shadow: 0 18px 40px rgba(17, 24, 39, .09);
        transform: translateY(-4px);
    }

    #{{ $sectionId }} .pain-executive__card h3 {
        margin: 0 0 10px;
        color: #111827;
        font-size: 24px;
        line-height: 1.3;
    }

    #{{ $sectionId }} .pain-executive__card p {
        margin: 0;
        color: #6b7280;
        font-size: 15px;
        line-height: 1.7;
    }

    @media (max-width: 991px) {
        #{{ $sectionId }} .pain-executive__layout {
            grid-template-columns: 1fr;
        }

        #{{ $sectionId }} .pain-executive__visual {
            min-height: 650px;
        }

        #{{ $sectionId }} .pain-executive__timeline {
            gap: 22px;
        }
    }

    @media (max-width: 767px) {
        #{{ $sectionId }} {
            padding: 58px 0 64px;
        }

        #{{ $sectionId }} .pain-executive__header {
            margin-bottom: 44px;
        }

        #{{ $sectionId }} .pain-executive__visual {
            min-height: 520px;
            border-radius: 26px;
        }

        #{{ $sectionId }} .pain-executive__visual figcaption {
            right: 24px;
            bottom: 28px;
            left: 24px;
        }

        #{{ $sectionId }} .pain-executive__timeline {
            padding-left: 52px;
        }

        #{{ $sectionId }} .pain-executive__timeline::before {
            left: 25px;
        }

        #{{ $sectionId }} .pain-executive__marker {
            left: -52px;
            width: 52px;
            height: 52px;
            font-size: 17px;
        }

        #{{ $sectionId }} .pain-executive__card {
            min-height: 0;
            padding: 22px;
            border-radius: 18px;
        }

        #{{ $sectionId }} .pain-executive__card h3 {
            font-size: 20px;
        }
    }
</style>
