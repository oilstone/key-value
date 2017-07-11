<?php

namespace Oilstone\KeyValue\Presenters;

use Oilstone\Presenter\Eloquent;

/**
 * Class KeyValue
 * @package App\Packages\KeyValues\Presenters
 */
class KeyValue extends Eloquent
{
    /**
     * @return mixed
     */
    public function __toString()
    {
        $value = $this->presentable->value;

        if ($this->presentable->type == 'file' && $value) {
            return '/assets/' . $value;
        }

        if(stripos($value, '{year}') !== false) {
            $value = str_ireplace('{year}', date('Y'), $value);
        }

        return $value;
    }

    /**
     * @return mixed
     */
    public function value()
    {
        if ($this->presentable->type == 'array') {

            return array_map(function ($item) {
                return trim($item);

            }, explode("\n", $this->presentable->value));
        }

        return $this->__toString();
    }
}
