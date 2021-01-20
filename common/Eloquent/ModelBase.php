<?php

namespace Common\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class Model
 *
 * @package Common\Eloquent
 */
abstract class ModelBase extends Model
{
    /**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
    ];

    /**
     * Update information automatically
     *
     * @param array $formInput
     * @return array
     */
    public function autoSettingBy(array $formInput)
    {
        $user = Auth::user();
        if (isset($user->id) || !is_null($user->id)) {
            $formInput['created_by'] = $user->id;
            $formInput['updated_by'] = $user->id;
        } else {
            $formInput['created_by'] = 'SYSTEM';
            $formInput['updated_by'] = 'SYSTEM';
        }

        return $formInput;
    }
}
