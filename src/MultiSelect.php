<?php

namespace Scouser03\MultiSelect;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class MultiSelect extends Field
{

    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->label();
        
        $this->inputId();
    }

    public $component = 'multi-select';

    public function model($model)
    {
        $query = $model::query()->get();
        return $this->withMeta(['data' => $query]);
    }

    public function query($query)
    {
        return $this->withMeta(['data' => $query]);
    }

    public function table($table)
    {
        return $this->withMeta(['table' => $table]);
    }

    public function indexUpdateable($status)
    {
        return $this->withMeta(['indexUpdateable' => $status]);
    }

    public function label($label = 'name')
    {
        return $this->withMeta(['label' => $label]);
    }

    public function inputId($id = 'id')
    {
        return $this->withMeta(['inputId' => $id]);
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
