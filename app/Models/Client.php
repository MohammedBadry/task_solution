<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;
use App\Http\Filters\Accounts\ClientFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    use Filterable;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'client_name',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'latitude',
        'longitude',
        'phone_no1',
        'phone_no2',
        'zip',
        'start_validity',
        'end_validity',
        'status',
    ];

    /**
     * The model filter name.
     *
     * @var string
     */
    protected $filter = ClientFilter::class;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
