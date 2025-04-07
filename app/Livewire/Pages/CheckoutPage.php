<?php

namespace App\Livewire\Pages;

use App\Livewire\Traits\CartManagement;
use App\Models\Foods;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Session;
use Livewire\Component;

class CheckoutPage extends Component
{
    public function render()
    {
        return view('livewire.checkout-page');
    }
}
