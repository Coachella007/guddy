<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Charges extends Component
{
    public $amountloaned;


    public function render()
    {
        return view('livewire.charges');
    }
}
