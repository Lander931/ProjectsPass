<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Project
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $description
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Access[] $accesses
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereUserId($value)
 */
class Project extends Model
{
    protected $fillable = [
        'name','description','user_id',
    ];

    public function accesses()
    {
        return $this->hasMany(Access::class);
    }
    
    public function notes(){
        return $this->hasMany(Note::class);
    }
}
