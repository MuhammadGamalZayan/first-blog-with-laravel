<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $fillable = ['title', 'description', 'content', 'image', 'category_id', 'user_id'];
    protected $guarded = ['id', 'created_at', 'updated_at','deleted_at'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($tagId) {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}