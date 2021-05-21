<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Service extends Model
{
    // use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'vehicle',
        'size',
        'service',
        'type',
        'cost',
        'image',
        'description',
    ];

    /**
     * All values of vehicle attribute.
     *
     * @var array
     */
    const VEHICLE = [
        'car',
        'motorcycle'
    ];

    /**
     * All values of size attribute.
     *
     * @var array
     */
    const SIZE = [
        'small',
        'medium',
        'large'
    ];

    /**
    * All values of service attribute.
    *
    * @var array
    */
    const SERVICE = [
        'regular',
        'waterless'
    ];

    /**
    * All values of type attribute.
    *
    * @var array
    */
    const TYPE = [
        'exterior',
        'interior-and-exterior',
        null
    ];

    /**
     * Get the books for the service.
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
