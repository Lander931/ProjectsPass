<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Access
 *
 * @property int $id
 * @property int $project_id
 * @property string $type
 * @property string $login
 * @property string $password
 * @property string $comment
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Access whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Access whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Access whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Access whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Access wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Access whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Access whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Access whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Access whereUserId($value)
 */
class Access extends Model
{
    //
}
