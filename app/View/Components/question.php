<?php

namespace App\View\Components;

use Illuminate\View\Component;

class question extends Component
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
    public $body;
    public $excerpt;
    public $avatar;

    public function __construct($id,$title,$slug,$topic,$user,$username,$body,$excerpt,$avatar)
    {
        $this->id = $id;
        $this->title = $title;
        $this->slug = $slug;
        $this->topic = $topic;
        $this->user = $user;
        $this->username = $username;
        $this->body = $body;
        $this->excerpt= $excerpt;
        $this->avatar = $avatar;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.question');
    }
}
