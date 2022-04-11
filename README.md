# A Multiselect field for Laravel Nova


## Installation

First you must install this package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require scouser03/multi-select
```

## Usage


```php
namespace App\Nova;

use Spatie\TagsField\Tags;

class BlogPost extends Resource
{
    // ...
    
    public function fields(Request $request)
    {
        return [
            // ...
            
            MultiSelect::make('select name', 'tags')
                ->table('post_tag')
                ->displayName('tag')
                ->model(Tag::class),

            // ...
        ];
    }
}
```


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
