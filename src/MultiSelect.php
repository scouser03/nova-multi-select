<?php

namespace Scouser03\MultiSelect;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class MultiSelect extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'multi-select';

    public function model($model)
    {
        if (is_string($model)){
            $query = $model::query()->get();
        }else{
            $query = $model;    
        }

        return $this->withMeta(['data' => $query]);
    }

    public function table($table)
    {
        return $this->withMeta(['table' => $table]);
    }

    public function displayName($name = 'name')
    {
        return $this->withMeta(['displayName' => $name]);
    }

    protected function fillAttributeFromRequest(NovaRequest $request, $requestAttribute, $model, $attribute)
    {
        $requestValue = $request[$requestAttribute];
        $tagNames = explode(',', $requestValue);
        $tagNames = array_filter($tagNames);

        $class = get_class($model);

        $class::saved(function ($model) use ($tagNames, $attribute) {
            $model->$attribute()->sync($tagNames);
        });
    }
}
