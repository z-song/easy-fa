<?php

namespace Encore\EasyFontAwesome;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class FontAwesomeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('fa', function($expression) {

            $arguments = explode(',', $expression, 2);

            $arguments = array_map('trim', $arguments);

            $icon  = array_get($arguments, 0);
            $calls = array_get($arguments, 1, '');

            $fa = fa(trim($icon, '\''));

            if (is_array($calls = explode('|', trim($calls, '\'')))) {
                foreach (array_filter($calls) as $call) {

                    if (strpos($call, ':') !== false) {
                        list($method, $arg) = explode(':', $call);
                    } else {
                        $method = $call;
                        $arg = null;
                    }

                    $fa = call_user_func_array([$fa, $method], [$arg]);
                }
            }

            return "<?php echo '{$fa->render()}'; ?>";
        });
    }
}
