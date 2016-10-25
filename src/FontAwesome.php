<?php

namespace Encore\EasyFontAwesome;

/**
 * Class FontAwesome
 * @package Encore\EasyFontAwesome
 */
class FontAwesome implements \Iterator
{
    /**
     * Icon name.
     *
     * @var string
     */
    protected $icon = 'star';

    /**
     * Classes of html tag.
     *
     * @var array
     */
    protected $classes = [];

    /**
     * Attributes for icon tag.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Generate a new FontAwesome instance.
     *
     * @param string $icon
     */
    public function __construct($icon = 'star')
    {
        $this->icon = $icon;

        $this->initClasses();
    }

    /**
     * Initialize classes.
     */
    protected function initClasses()
    {
        $this->addClass('fa', '');

        if (is_string($this->icon)) {
            $this->addClass($this->icon);
        }
    }

    /**
     * Add attribute.
     *
     * @param string $attr
     * @param string $prefix
     * @return $this
     */
    public function addClass($attr, $prefix = 'fa-')
    {
        $this->classes[] = $prefix.$attr;

        return $this;
    }

    /**
     * Large.
     *
     * @return FontAwesome
     */
    public function lg()
    {
        return $this->addClass('lg');
    }

    /**
     * Size * 2
     *
     * @return FontAwesome
     */
    public function x2()
    {
        return $this->addClass('2x');
    }

    /**
     * Size * 3
     *
     * @return FontAwesome
     */
    public function x3()
    {
        return $this->addClass('3x');
    }

    /**
     * Size * 4
     *
     * @return FontAwesome
     */
    public function x4()
    {
        return $this->addClass('4x');
    }

    /**
     * Size * 5
     *
     * @return FontAwesome
     */
    public function x5()
    {
        return $this->addClass('5x');
    }

    /**
     * Fix with parent.
     *
     * @return FontAwesome
     */
    public function fw()
    {
        return $this->addClass('fw');
    }

    /**
     * Pull left.
     *
     * @return FontAwesome
     */
    public function left()
    {
        return $this->addClass('pull-left');
    }

    /**
     * Pull
     *
     * @return FontAwesome
     */
    public function right()
    {
        return $this->addClass('pull-right');
    }

    /**
     * Add border
     *
     * @return FontAwesome
     */
    public function border()
    {
        return $this->addClass('border');
    }

    /**
     * Spin icon.
     *
     * @return FontAwesome
     */
    public function spin()
    {
        return $this->addClass('spin');
    }

    /**
     * Rotate with 8 steps
     *
     * @return FontAwesome
     */
    public function pulse()
    {
        return $this->addClass('pulse');
    }

    /**
     * Flip horizontal.
     *
     * @return FontAwesome
     */
    public function flipHorizontal()
    {
        return $this->addClass('flip-horizontal');
    }

    /**
     * Flip vertical.
     *
     * @return FontAwesome
     */
    public function flipVertical()
    {
        return $this->addClass('flip-vertical');
    }

    /**
     * Stacked Icons
     *
     * @param FontAwesome $icon
     * @return string
     */
    public function on(FontAwesome $icon)
    {
        $this->addClass('stack-1x');

        $icon->addClass('stack-2x');

        return <<<EOT

<span class="fa-stack">
  $icon
  $this
</span>

EOT;

    }

    /**
     * Inverse.
     *
     * @return FontAwesome
     */
    public function inverse()
    {
        return $this->addClass('inverse');
    }

    /**
     * Rotate icon.
     *
     * @param int $type
     * @return $this
     */
    public function rotate($type = 90)
    {
        return $this->addClass("rotate-$type");
    }

    /**
     * Add attributes.
     *
     * @param $name
     * @param $value
     * @return $this
     */
    public function attr($name, $value)
    {
        $this->attributes[$name] = $value;

        return $this;
    }

    /**
     * Add style to html tag.
     *
     * @param $style
     * @return $this
     */
    public function style($style)
    {
        if (is_string($style)) {
            $this->attributes['style'] = $style;

            return $this;
        }

        if (is_array($style)) {

            $html = [];

            foreach ($style as $name => $value) {
                $html[] = "$name:$value";
            }

            $this->attributes['style'] = implode(';', $html);
        }

        return $this;
    }

    /**
     * Format icon classes.
     *
     * @return string
     */
    protected function formatAttributes()
    {
        $this->attributes['class'] = implode(' ', $this->classes);

        $html = '';

        foreach ($this->attributes as $name => $value) {
            $html[] = "$name=\"$value\"";
        }

        return implode(' ', $html);
    }

    /**
     * Render th icon.
     *
     * @return string
     */
    public function render()
    {
        return "<i {$this->formatAttributes()}></i>";
    }

    /**
     * To string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * Return the current element
     *
     * @return FontAwesome.
     */
    public function current()
    {
        $icon = current($this->icon);

        $fa = clone $this;

        return $fa->addClass($icon);
    }

    /**
     * Move forward to next element
     *
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        next($this->icon);
    }

    /**
     * Return the key of the current element
     *
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return key($this->icon);
    }

    /**
     * Checks if current position is valid
     *
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        return $this->key() !== null;
    }

    /**
     * Rewind the Iterator to the first element
     *
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        if (!is_array($this->icon)) {
            $this->icon = [$this->icon];
        }

        reset($this->icon);
    }

    /**
     * Do nothing.
     *
     * @param $method
     * @param $arguments
     *
     * @return $this
     */
    public function __call($method, $arguments)
    {
        return $this;
    }
}
