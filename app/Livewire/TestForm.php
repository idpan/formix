<?php

namespace App\Livewire;

use Livewire\Component;

class TestForm extends Component
{
    public function render()
    {
        return view('livewire.test-form');
    }
    public string $name = '';

    public function save()
    {
        dd($this->name);
    }
}
