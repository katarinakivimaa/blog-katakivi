<?php

namespace App\Models;

use Illuminate\Container\Attributes\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','body'];

    // public function getSnippetAttribute() {
    //     return explode("\n\n", $this->body)[0];
    // see on vana viis }

    public function snippet(): Attribute {
        return Attribute::get(function() {
            return explode("\n\n", $this->body)[0];
        });
    }

    public function imageFile(): Attribute {
        return Attribute::get(function() {
            if(parse_url($this->original['image'], PHP_URL_SCHEME) !== null) {
                return false;
            } else {
                return $this->original['image'];
            }
        });
    }

    public function image(): Attribute {
        return Attribute::get(function() {
            if(parse_url($this->original['image'], PHP_URL_SCHEME) !== null) {
                return $this->original['image'];
            } else {
                return Storage::url($this->original['image']);
            }
        });
    }

    protected static function booted(): void{
        static::deleting(function ($post){
            Storage::disk('public')->delete($post->imageFile);
        });
    }
}
