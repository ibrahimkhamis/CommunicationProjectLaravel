<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['body'];

 // Post.php model, check if user is already liked a post
public function likedBy(User $user)
{
    return $this->likes()->where('user_id', $user->id)->exists();
}

public function ownedBy(User $user){
    return $user->id === $this->user_id;

}

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }


}
