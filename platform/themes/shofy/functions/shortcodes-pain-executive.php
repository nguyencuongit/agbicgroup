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
        'pain-executive',
        __('pain-executive - Urban Challenges'),
        __('Urban challenges with a featured image and numbered timeline.'),
        function (ShortcodeCompiler $shortcode) {
            $items = Shortcode::fields()->getTabsData(
                ['title', 'description'],
                $shortcode,
                'items'
            );

            return view()->file(
                platform_path('themes/shofy-beauty/partials/shortcodes/pain-executive/index.blade.php'),
                compact('shortcode', 'items')
            )->render();
        }
    );

    Shortcode::setAdminConfig('pain-executive', function (array $attributes) {
        return ShortcodeForm::createFromArray($attributes)
            ->withLazyLoading()
            ->columns()
            ->add(
                'section_label',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Section label'))
                    ->placeholder(__('Urban reality'))
                    ->colspan(2)
            )
            ->add(
                'title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Title'))
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
                'background_color',
                ColorField::class,
                ColorFieldOption::make()
                    ->label(__('Background color'))
                    ->defaultValue('#ffffff')
            )
            ->add(
                'accent_color',
                ColorField::class,
                ColorFieldOption::make()
                    ->label(__('Accent color'))
                    ->defaultValue('#287b38')
            )
            ->add(
                'image',
                MediaImageField::class,
                MediaImageFieldOption::make()
                    ->label(__('Featured image'))
                    ->colspan(2)
            )
            ->add(
                'image_label',
                TextField::class,
                TextFieldOption::make()->label(__('Image label'))
            )
            ->add(
                'image_title',
                TextField::class,
                TextFieldOption::make()->label(__('Image title'))
            )
            ->add(
                'image_description',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Image description'))
                    ->colspan(2)
            )
            ->add(
                'items',
                ShortcodeTabsField::class,
                ShortcodeTabsFieldOption::make()
                    ->label(__('Challenges'))
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
                    ], 'items')
                    ->attrs($attributes)
                    ->min(1)
                    ->max(8)
                    ->colspan(2)
            );
    });
});
