<?php

namespace Beyondcode\Rating;

use Illuminate\Support\Arr;
use Laravel\Nova\Fields\Field;

class Rating extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'rating';

    protected static $defaultStyles = [
        'star-size' => 30,
        'active-color' => 'var(--primary)',
        'inactive-color' => '#d8d8d8',
        'border-color' => 'var(--60)',
        'border-width' => 0,
        'padding' => 10,
        'rounded-corners' => false,
        'inline' => false,
        'glow' => 0,
        'glow-color' => '#fff',
        'text-class' => 'inline-block text-80 h-9 pt-2',
    ];

    public function __construct(string $name, $attribute = null, ?mixed $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta(['min' => 0, 'max' => 5]);
        $this->withStyles(static::$defaultStyles);
    }

    public function min($min)
    {
        return $this->withMeta(['min' => $min]);
    }

    public function max($max)
    {
        return $this->withMeta(['max' => $max]);
    }
    public function increment($increment)
    {
        return $this->withMeta(['increment' => $increment]);
    }
    public function showRating()
    {
        return $this->withMeta(['showRating' => true]);
    }
    public function hideRating()
    {
        return $this->withMeta(['showRating' => false]);
    }
    public function withStyles(array $styles)
    {
        $build = [];
        foreach (static::$defaultStyles as $key => $defaultValue) {
            $build[$key] = Arr::get($styles, $key, $defaultValue);
        }

        return $this->withMeta($build);
    }
}
