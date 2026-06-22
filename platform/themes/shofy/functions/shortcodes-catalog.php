<?php

use Botble\Base\Forms\FieldOptions\ColorFieldOption;
use Botble\Base\Forms\FieldOptions\MediaImageFieldOption;
use Botble\Base\Forms\FieldOptions\TextareaFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\ColorField;
use Botble\Base\Forms\Fields\MediaImageField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Shortcode\Forms\FieldOptions\ShortcodeTabsFieldOption;
use Botble\Shortcode\Forms\Fields\ShortcodeTabsField;
use Botble\Shortcode\Forms\ShortcodeForm;

app()->booted(function (): void {
    Shortcode::register(
        'catalog',
        __('Service catalog'),
        __('A visual service catalog with overlapping images and service cards.'),
        function (ShortcodeCompiler $shortcode) {
            $items = Shortcode::fields()->getTabsData(
                ['title', 'description', 'image', 'url', 'button_label'],
                $shortcode,
                'items'
            );

            return view()->file(
                platform_path('themes/shofy-beauty/partials/shortcodes/catalog/index.blade.php'),
                compact('shortcode', 'items')
            )->render();
        }
    );

    Shortcode::setAdminConfig('catalog', function (array $attributes) {
        return ShortcodeForm::createFromArray($attributes)
            ->withLazyLoading()
            ->columns()
            ->add(
                'section_title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Section title'))
                    ->placeholder(__('Centuries of Connections'))
                    ->colspan(2)
            )
            ->add(
                'background_color',
                ColorField::class,
                ColorFieldOption::make()
                    ->label(__('Background color'))
                    ->defaultValue('#faf7f2')
                    ->colspan(2)
            )
            ->add(
                'image_1',
                MediaImageField::class,
                MediaImageFieldOption::make()->label(__('Main image'))
            )
            ->add(
                'image_2',
                MediaImageField::class,
                MediaImageFieldOption::make()->label(__('Overlapping image'))
            )
            ->add(
                'title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Content title'))
                    ->placeholder(__('Service Cards'))
                    ->colspan(2)
            )
            ->add(
                'subtitle',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Subtitle'))
                    ->colspan(2)
            )
            ->add(
                'description',
                TextareaField::class,
                TextareaFieldOption::make()
                    ->label(__('Description'))
                    ->colspan(2)
            )
            ->add(
                'button_label',
                TextField::class,
                TextFieldOption::make()->label(__('Button label'))
            )
            ->add(
                'button_url',
                TextField::class,
                TextFieldOption::make()->label(__('Button URL'))
            )
            ->add(
                'items',
                ShortcodeTabsField::class,
                ShortcodeTabsFieldOption::make()
                    ->label(__('Service cards'))
                    ->fields([
                        'title' => [
                            'type' => 'text',
                            'title' => __('Title'),
                            'required' => true,
                        ],
                        'description' => [
                            'type' => 'textarea',
                            'title' => __('Description'),
                        ],
                        'image' => [
                            'type' => 'image',
                            'title' => __('Image'),
                            'required' => true,
                        ],
                        'url' => [
                            'type' => 'text',
                            'title' => __('URL'),
                        ],
                        'button_label' => [
                            'type' => 'text',
                            'title' => __('Link label'),
                        ],
                    ], 'items')
                    ->attrs($attributes)
                    ->colspan(2)
            );
    });
});

app()->booted(function (): void {
    Shortcode::register(
        'catalog3',
        __('Catalog3 - Bento'),
        __('A modern bento-style catalog with image and content tiles.'),
        function (ShortcodeCompiler $shortcode) {
            $items = Shortcode::fields()->getTabsData(
                ['title', 'description', 'image', 'url', 'button_label'],
                $shortcode,
                'items'
            );

            return view()->file(
                platform_path('themes/shofy-beauty/partials/shortcodes/catalog3/index.blade.php'),
                compact('shortcode', 'items')
            )->render();
        }
    );

    Shortcode::setAdminConfig('catalog3', function (array $attributes) {
        return ShortcodeForm::createFromArray($attributes)
            ->withLazyLoading()
            ->columns()
            ->add(
                'section_title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Section label'))
                    ->placeholder(__('Featured solutions'))
                    ->colspan(2)
            )
            ->add(
                'background_color',
                ColorField::class,
                ColorFieldOption::make()
                    ->label(__('Background color'))
                    ->defaultValue('#eef2ea')
            )
            ->add(
                'accent_color',
                ColorField::class,
                ColorFieldOption::make()
                    ->label(__('Accent color'))
                    ->defaultValue('#1f5a45')
            )
            ->add(
                'image_1',
                MediaImageField::class,
                MediaImageFieldOption::make()->label(__('Large image'))
            )
            ->add(
                'image_2',
                MediaImageField::class,
                MediaImageFieldOption::make()->label(__('Small image'))
            )
            ->add(
                'title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Title'))
                    ->colspan(2)
            )
            ->add(
                'subtitle',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Subtitle'))
                    ->colspan(2)
            )
            ->add(
                'description',
                TextareaField::class,
                TextareaFieldOption::make()
                    ->label(__('Description'))
                    ->colspan(2)
            )
            ->add(
                'button_label',
                TextField::class,
                TextFieldOption::make()->label(__('Button label'))
            )
            ->add(
                'button_url',
                TextField::class,
                TextFieldOption::make()->label(__('Button URL'))
            )
            ->add(
                'items',
                ShortcodeTabsField::class,
                ShortcodeTabsFieldOption::make()
                    ->label(__('Service cards'))
                    ->fields([
                        'title' => [
                            'type' => 'text',
                            'title' => __('Title'),
                            'required' => true,
                        ],
                        'description' => [
                            'type' => 'textarea',
                            'title' => __('Description'),
                        ],
                        'image' => [
                            'type' => 'image',
                            'title' => __('Image'),
                        ],
                        'url' => [
                            'type' => 'text',
                            'title' => __('URL'),
                        ],
                        'button_label' => [
                            'type' => 'text',
                            'title' => __('Link label'),
                        ],
                    ], 'items')
                    ->attrs($attributes)
                    ->colspan(2)
            );
    });
});

app()->booted(function (): void {
    Shortcode::register(
        'catalog2',
        __('Service catalog 2'),
        __('An editorial service catalog with an asymmetric image layout.'),
        function (ShortcodeCompiler $shortcode) {
            $items = Shortcode::fields()->getTabsData(
                ['title', 'description', 'image', 'url', 'button_label'],
                $shortcode,
                'items'
            );

            return view()->file(
                platform_path('themes/shofy-beauty/partials/shortcodes/catalog2/index.blade.php'),
                compact('shortcode', 'items')
            )->render();
        }
    );

    Shortcode::setAdminConfig('catalog2', function (array $attributes) {
        return ShortcodeForm::createFromArray($attributes)
            ->withLazyLoading()
            ->columns()
            ->add(
                'section_title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Section label'))
                    ->placeholder(__('Our expertise'))
                    ->colspan(2)
            )
            ->add(
                'background_color',
                ColorField::class,
                ColorFieldOption::make()
                    ->label(__('Background color'))
                    ->defaultValue('#173d32')
            )
            ->add(
                'accent_color',
                ColorField::class,
                ColorFieldOption::make()
                    ->label(__('Accent color'))
                    ->defaultValue('#dfbd74')
            )
            ->add(
                'image_1',
                MediaImageField::class,
                MediaImageFieldOption::make()->label(__('Large image'))
            )
            ->add(
                'image_2',
                MediaImageField::class,
                MediaImageFieldOption::make()->label(__('Small image'))
            )
            ->add(
                'title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Title'))
                    ->colspan(2)
            )
            ->add(
                'subtitle',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Subtitle'))
                    ->colspan(2)
            )
            ->add(
                'description',
                TextareaField::class,
                TextareaFieldOption::make()
                    ->label(__('Description'))
                    ->colspan(2)
            )
            ->add(
                'button_label',
                TextField::class,
                TextFieldOption::make()->label(__('Button label'))
            )
            ->add(
                'button_url',
                TextField::class,
                TextFieldOption::make()->label(__('Button URL'))
            )
            ->add(
                'items',
                ShortcodeTabsField::class,
                ShortcodeTabsFieldOption::make()
                    ->label(__('Service cards'))
                    ->fields([
                        'title' => [
                            'type' => 'text',
                            'title' => __('Title'),
                            'required' => true,
                        ],
                        'description' => [
                            'type' => 'textarea',
                            'title' => __('Description'),
                        ],
                        'image' => [
                            'type' => 'image',
                            'title' => __('Image'),
                        ],
                        'url' => [
                            'type' => 'text',
                            'title' => __('URL'),
                        ],
                        'button_label' => [
                            'type' => 'text',
                            'title' => __('Link label'),
                        ],
                    ], 'items')
                    ->attrs($attributes)
                    ->colspan(2)
            );
    });
});
