<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 1;
    public $msg;

    public function increment()
    {
        $this->count +=1;
    }

    public function mount($msg = null)
    {
        if (isset($msg)){
            $this->msg = $msg;
        }else{
            $this->fill(['msg' => 'Hello A406']);
        }
        
    }

    public function resetFilter()
    {
        $this->reset('count');
    }
    
    public function render()
    {
        return view('livewire.counter');
    }
}
