<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class ShortUrl
 * @property string $original_url
 * @property string $code
 * @property integer $count
 *
 * @package App\Models
 *
 */
class ShortUrl extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'short_url';
}
