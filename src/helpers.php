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