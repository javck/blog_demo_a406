<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    protected $msg;

    public function increment()
    {
        $this->count +=1;
    }

    public function mount($msg)
    {
        $this->msg = $msg;
    }
    
    public function render()
    {
        return view('livewire.counter',['msg' => $this->msg]);
    }
}
