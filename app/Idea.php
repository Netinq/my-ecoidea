<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

use ChrisKonnertz\BBCode\BBCode;

class Idea extends Model
{
    protected $fillable = ['title', 'idea', 'published'];

    public $validated = [
        'title' => ['required', 'string', 'max:255'],
        'idea' => ['required', 'string', 'min:15', 'max:255']
    ];

    public function scopePublished($query){
        return $query->where('published', true);
    }

    public function scopeSearch($query, $value){
        return $query->where('keyword1', 'like', '%' . $value . '%')->orWhere('keyword2', 'like', '%' . $value . '%')->orWhere('keyword3', 'like', '%' . $value . '%');
    }

    public function reacts(){
        return $this->hasMany('App\React');
    }

    public function isPublished(){
        return $this->published;
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id')->get()->first();
    }

    public function contentHTML(){
        $bbcode = new BBCode();
        $bbcode->addTag('video', function($tag, &$html, $openingTag) {
            if ($tag->opening) {
                return '<iframe class="youtube-player" type="text/html" width="640"\
                        height="385" src="https://www.youtube.com/embed/';
            } else {
                return '" frameborder="0"></iframe>';
            }
        });
        return $bbcode->render($this->content);
    }
}
