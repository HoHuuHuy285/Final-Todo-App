<?php

namespace App\Livewire;

use Livewire\Component;

class Dropdown extends Component
{
    public $options;
    public $selectedOption;

    public function render()
    {
        return view('livewire.dropdown');
    }
}
