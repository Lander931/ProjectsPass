<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Note
 *
 * @property int $id
 * @property int $project_id
 * @property string $text
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Note extends Model
{
    //
}
