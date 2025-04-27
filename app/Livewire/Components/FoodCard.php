<?php

namespace App\Livewire\Components;

use Livewire\Component;

class FoodCard extends Component
{
    public $categories;
    public $matchedCategory;
    public $data;
    public bool $isGrid = true;
    public $quantity = 0;

    public function addToCart()
    {
        $this->quantity++;
        $this->emit('updateCart', $this->data->menuid, $this->quantity);
    }

    public function removeFromCart()
    {
        if ($this->quantity > 0) {
            $this->quantity--;
            $this->emit('updateCart', $this->data->menuid, $this->quantity);
        }
    }

    public function mount()
    {
        $this->matchedCategory = collect($this->categories)->firstWhere('menucategoryid', $this->data->menucategoryid);
    }

    public function render()
    {
        return view('livewire.food-card');
    }
}
