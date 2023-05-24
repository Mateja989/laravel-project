<?php

namespace App\View\Components;

use Illuminate\View\Component;

class answer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $body;
    public $username;
    public $date;
    public $avatar;

    public function __construct($id,$body,$username,$date,$avatar)
    {
        $this->id = $id;
        $this->body = $body;
        $this->username = $username;
        $this->date = $date;
        $this->avatar = $avatar;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    {
        return view('components.answer');
    }
}
