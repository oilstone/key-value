<?php

namespace App\Packages\KeyValues\Presenters;

use Oilstone\Presenter\Factory as Presenter;
use Oilstone\Presenter\Lookup;

/**
 * Class Category
 * @package App\Packages\KeyValues\Presenters
 */
class Category extends Lookup
{
    /**
     * @param mixed $items
     */
    public function __construct($items = [])
    {
        parent::__construct($items);

        $this->lookup = [];

        foreach ($this->items as $key => $item) {
            if (isset($item->title)) {
                $this->lookup[self::convertKey($item->title)] = $key;
            }
        }
    }

    /**
     * @param string $key
     * @return KeyValue|mixed
     */
    public function __get($key)
    {
        $hyphenedKey = self::convertKey($key);

        if (array_key_exists($hyphenedKey, $this->lookup)) {

            return Presenter::keyValue($this->items[$this->lookup[$hyphenedKey]]);
        }

        return parent::__get($key);
    }
}
