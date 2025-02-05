<?php

namespace App\Filters\Expenses;

use EloquentFilter\ModelFilter;

class OtherPayments extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relatedModel => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function search($query)
    {
        return $this->whereLike('description', $query);
    }

    public function vendors($vendors)
    {
        return $this->whereIn('vendor_id', (array) $vendors);
    }

    public function categories($categories)
    {
        return $this->whereIn('category_id', (array) $categories);
    }

    public function accounts($accounts)
    {
        return $this->whereIn('account_id', (array) $accounts);
    }

    public function date($date)
    {
        $dates = explode('_', $date);
        $dates[0] .= ' 00:00:00';
        $dates[1] .= ' 23:59:59';

        return $this->whereBetween('paid_at', $dates);
    }
}
