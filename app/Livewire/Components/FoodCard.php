<?php

namespace App\Livewire\Components;

use Livewire\Component;

class FoodCard extends Component
{
    public $categories;
    public $matchedCategory;
    public $data;
    public bool $isGrid = true;

    public function mount()
    {
        $this->matchedCategory = collect($this->categories)->firstWhere('menucategoryid', $this->data->menucategoryid);
    }

    public function render()
    {
        return view('livewire.food-card');
    }
}
