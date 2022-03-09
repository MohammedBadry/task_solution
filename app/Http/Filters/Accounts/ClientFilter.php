<?php

namespace App\Http\Filters\Accounts;

use App\Http\Filters\BaseFilters;

class ClientFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'zip_code',
        'phone_no1',
        'phone_no2',
        'statrt_validity',
        'end_validity',
        'status',
        'created_at',
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function name($value)
    {
        if ($value) {
            return $this->builder->where('client_name', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query to include clients by address1.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function address1($value)
    {
        if ($value) {
            return $this->builder->where('address1', $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query to include clients by address2.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function address2($value)
    {
        if ($value) {
            return $this->builder->where('address2', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query to include clients by city.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function city($value)
    {
        if ($value) {
            return $this->builder->where('city', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query to include clients by state.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function state($value)
    {
        if ($value) {
            return $this->builder->where('state', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query to include clients by country.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function country($value)
    {
        if ($value) {
            return $this->builder->where('country', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query to include clients by zip_code.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function zipCode($value)
    {
        if ($value) {
            return $this->builder->where('zip_code', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query to include clients by phone_no1.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function phoneNo1($value)
    {
        if ($value) {
            return $this->builder->where('phone_no1', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query to include clients by phone_no2.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function phoneNo2($value)
    {
        if ($value) {
            return $this->builder->where('phone_no2', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query to include clients by status.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function status($value)
    {
        if ($value) {
            return $this->builder->where('status', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query to include clients by created_at.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function createdAt($value)
    {
        if ($value) {
            return $this->builder->where('created_at', 'like', "%$value%");
        }

        return $this->builder;
    }
}
