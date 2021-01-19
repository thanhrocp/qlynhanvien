<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Ulid\Ulid;

/**
 * This is the custom base model class for table "departments".
 *
 * The followings are the available columns in table "departments":
 * @property string $depart_name
 * @property string $depart_phone 言語
 * @property string $depart_note 順番
 * @property string $depart_number_persion
 * @copyright s-cubism.co.ltd. All Rights Reserved.
 * @category framework
 * @package Eloquent
 * @mixin \Eloquent
 */
class Department extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'departments';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function($model) {
            $model->id = (string) Ulid::generate();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'depart_name',
        'depart_phone',
        'depart_note',
        'depart_number_persion'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
}
