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
use Scouser03\MultiSelect\MultiSelect;

class BlogPost extends Resource
{
    // ...

    public function fields(Request $request)
    {
        return [
            // ...

            MultiSelect::make('select name with model', 'tags') //tags is relation name
                ->table('post_tag') //Relation table
                ->inputId('uuid') //Sets the id of the input element. default - id
                ->label('tag') // What key to use when generating option labels when each option is an object, default - name
                ->indexUpdateable(true) //when attach new tag to index resource
                ->model(Tag::class), //get all data with model

            MultiSelect::make('select name with query', 'tags')
                ->table('post_tag')
                ->label('tag')
                ->query(Tag::query()->take(3)->get()), //pass collection data

            // ...
        ];
    }
}
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
