<?php

namespace Oilstone\KeyValue\Presenters;

use Oilstone\Presenter\Factory as Presenter;
use Oilstone\Presenter\Lookup;

/**
 * Class Categorized
 * @package App\Packages\KeyValues\Presenters
 */
class Categorized extends Lookup
{
    /**
     * @param mixed $items
     */
    public function __construct($items = [])
    {
        parent::__construct($items);

        $this->lookup = [];

        foreach ($this->items as $item) {
            if (isset($item->category)) {
                $this->lookup[self::convertKey($item->category)][] = $item;
            }
        }
    }

    /**
     * @param string $key
     * @return Category|mixed
     */
    public function __get($key)
    {
        $hyphenedKey = self::convertKey($key);

        if (array_key_exists($hyphenedKey, $this->lookup)) {

            return Presenter::category($this->lookup[$hyphenedKey]);
        }

        return parent::__get($key);
    }
}
