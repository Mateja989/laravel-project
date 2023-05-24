<?php

namespace App\View\Components;

use Illuminate\View\Component;

class question_card extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $id;
    public $title;
    public $slug;
    public $topic;
    public $user;
    public $username;
    public $excerpt;
    public $tags;
    public $avatar;
    public $like;
    public $dislike;

    public function __construct($id,$title,$slug,$topic,$user,$username,$excerpt,$tags,$avatar,$like,$dislike)
    {
        $this->id = $id;
        $this->title = $title;
        $this->slug = $slug;
        $this->topic = $topic;
        $this->user = $user;
        $this->username = $username;
        $this->excerpt= $excerpt;
        $this->tags = $tags;
        $this->avatar = $avatar;
        $this->like = $like;
        $this->dislike = $dislike;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.question_card');
    }
}
