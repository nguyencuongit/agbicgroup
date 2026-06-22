<section
    class="ag-responsive-contact"
    style="--ag-responsive-contact-background: {{ $shortcode->background_color ?: '#fbf8ed' }}"
>
    <div class="container">
        @if($shortcode->name)
            <h2 class="ag-responsive-contact__title">{!! BaseHelper::clean($shortcode->name) !!}</h2>
        @endif

        @if($shortcode->description)
            <div class="ag-responsive-contact__description">
                {!! BaseHelper::clean($shortcode->description) !!}
            </div>
        @endif

        <div class="ag-responsive-contact__grid">
            @if($shortcode->image_1)
                <div class="ag-responsive-contact__image ag-responsive-contact__image--first">
                    {!! RvMedia::image($shortcode->image_1, $shortcode->name) !!}
                </div>
            @endif

            @if($shortcode->image_2)
                <div class="ag-responsive-contact__image ag-responsive-contact__image--second">
                    {!! RvMedia::image($shortcode->image_2, $shortcode->name) !!}
                </div>
            @endif

            @if($informationItems)
                <div class="ag-responsive-contact__information">
                    @foreach($informationItems as $item)
                        <div class="ag-responsive-contact__item">
                            <span class="ag-responsive-contact__dot" aria-hidden="true"></span>
                            <div>
                                @if($item['name'])
                                    <h3>{!! BaseHelper::clean($item['name']) !!}</h3>
                                @endif
                                @if($item['text'])
                                    <div class="ag-responsive-contact__text">
                                        {!! BaseHelper::clean(nl2br($item['text'])) !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if($shortcode->image_3)
                <div class="ag-responsive-contact__image ag-responsive-contact__image--third">
                    {!! RvMedia::image($shortcode->image_3, $shortcode->name) !!}
                </div>
            @endif
        </div>
    </div>
</section>

<style>
    .ag-responsive-contact {
        padding: 80px 0 90px;
        background: var(--ag-responsive-contact-background, #fbf8ed);
        color: #172217;
    }

    .ag-responsive-contact__title {
        margin: 0 0 18px;
        color: #172217;
        font-family: Georgia, 'Times New Roman', serif;
        font-size: clamp(30px, 3.1vw, 52px);
        font-weight: 700;
        line-height: 1.15;
        text-align: center;
    }

    .ag-responsive-contact__description {
        width: 100%;
        max-width: 1180px;
        margin: 0 auto 42px;
        color: #687064;
        font-size: 16px;
        line-height: 1.75;
        text-align: left;
    }

    .ag-responsive-contact__description > :last-child {
        margin-bottom: 0;
    }

    .ag-responsive-contact__grid {
        display: grid;
        grid-template-columns: 1fr 1fr .9fr 1.16fr;
        gap: clamp(18px, 2vw, 34px);
        align-items: center;
        max-width: 1180px;
        margin: 0 auto;
    }

    .ag-responsive-contact__image {
        overflow: hidden;
        border-radius: 22px;
        box-shadow: 0 16px 35px rgba(44, 58, 35, .12);
    }

    .ag-responsive-contact__image img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .45s ease;
    }

    .ag-responsive-contact__image:hover img {
        transform: scale(1.035);
    }

    .ag-responsive-contact__image--first,
    .ag-responsive-contact__image--second {
        aspect-ratio: 4 / 5;
    }

    .ag-responsive-contact__image--second {
        transform: translateY(30px);
    }

    .ag-responsive-contact__image--third {
        aspect-ratio: 4 / 5.7;
    }

    .ag-responsive-contact__information {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .ag-responsive-contact__item {
        display: grid;
        grid-template-columns: 11px 1fr;
        gap: 12px;
        align-items: start;
    }

    .ag-responsive-contact__dot {
        width: 9px;
        height: 9px;
        margin-top: 7px;
        border-radius: 50%;
        background: #dc8d3d;
        box-shadow: 0 0 0 4px rgba(220, 141, 61, .14);
    }

    .ag-responsive-contact__item h3 {
        margin: 0 0 5px;
        color: #172217;
        font-size: 16px;
        font-weight: 700;
        line-height: 1.35;
    }

    .ag-responsive-contact__text {
        color: #687064;
        font-size: 13px;
        line-height: 1.65;
    }

    @media (max-width: 991px) {
        .ag-responsive-contact {
            padding: 64px 0;
        }

        .ag-responsive-contact__grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .ag-responsive-contact__information {
            order: 4;
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            margin-top: 14px;
        }

        .ag-responsive-contact__image--second {
            transform: none;
        }
    }

    @media (max-width: 575px) {
        .ag-responsive-contact {
            padding: 48px 0;
        }

        .ag-responsive-contact__title {
            margin-bottom: 14px;
        }

        .ag-responsive-contact__description {
            margin-bottom: 28px;
            font-size: 15px;
        }

        .ag-responsive-contact__grid,
        .ag-responsive-contact__information {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .ag-responsive-contact__grid {
            gap: 8px;
        }

        .ag-responsive-contact__information {
            grid-column: 1 / -1;
            grid-template-columns: 1fr;
            gap: 18px;
            margin-top: 20px;
        }

        .ag-responsive-contact__image {
            border-radius: 10px;
        }

        .ag-responsive-contact__image--third {
            aspect-ratio: 4 / 5;
        }
    }
</style>
