<?php

if (! function_exists('fa')) {

    /**
     * Generate a new FontAwesome instance.
     *
     * @param string $icon
     * @return \Encore\EasyFontAwesome\FontAwesome
     */
    function fa($icon = 'star')
    {
        return new Encore\EasyFontAwesome\FontAwesome($icon);
    }

}

if (! function_exists('fa_assets')) {

    /**
     * @return string
     */
    function fa_assets()
    {
        return '<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">';
    }
}