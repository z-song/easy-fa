Easy FontAwesome
=====

The elegant way to use [font-awesome](http://fontawesome.io/icons/) for PHPer.

Inspired by [FontAwesomePHP](https://github.com/kevinkhill/FontAwesomePHP)

Installation
-----------

```
composer require encore/easy-fa
```

Example Usage
-----------

To use it in Laravel project, first add service provider in `app.php`

```php
Encore\EasyFontAwesome\FontAwesomeServiceProvider::class,
```

In views

```php

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FontAwesome example</title>

        <!-- import css -->
        {!! fa_assets() !!}

    </head>
    <body>
        <botton>{!! fa('envelope') !!}</botton>
        <botton>{!! fa('calendar')->lg() !!}</botton>
        <botton>{!! fa('camera')->border() !!}</botton>
        
        <!-- or -->

        <botton>@fa('star')</botton>
        <botton>@fa('calendar', 'lg')</botton>
        <botton>@fa('camera', 'lg|border')</botton>
        <botton>@fa('hourglass', 'x2|rotate:180')</botton>
    </body>
</html>

```

In addition to laravel, you can use it in any PHP project.

```php

// size
echo fa('star')->lg();
echo fa('star')->x2();
echo fa('star')->x3();
echo fa('star')->x4();
echo fa('star')->x5();

// fixed with parent
echo fa('star')->fw();

// add border
echo fa('star')->border();

// add border and pull left
echo fa('star')->border()->left();

// add border and pull right
echo fa('star')->border()->right();

// spin
echo fa('star')->spin();

// pulse
echo fa('star')->spin()->pulse();

// rotate
echo fa('star')->rotate(90);
echo fa('star')->rotate(180);
echo fa('star')->rotate(270);

// flip
echo fa('star')->flipHorizontal();
echo fa('star')->flipVertical();

// stack
echo fa('star')->on(fa('square'));

// inverse
echo fa('star')->inverse();

// iterat
foreach (fa(['book', 'pencil', 'star', 'gear']) as $fa) {
    echo $fa;
}

```

To find all icons please refer to [Font Awesome](http://fontawesome.io/icons/)

License
------------
[The MIT License (MIT)](LICENSE).
