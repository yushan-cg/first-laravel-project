<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    //table name
    /*protected $table = 'posts';
    //primary key
    public $primarykey = 'id';
    //timestamps
    public $timestamps = false;
*/

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
