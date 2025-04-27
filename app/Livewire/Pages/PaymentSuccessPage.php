<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use App\Models\TransactionHeader;
use Livewire\Component;
use Livewire\Attributes\Session;

class PaymentSuccessPage extends Component
{
    public $transaction;
    public $cartItems = [];
    public $name = '';
    public $phone = '';
    public $email = '';
    #[Session('subtotal')]
    public $subtotal;

    public function mount(){
        $this->transaction = TransactionHeader::latest()->first();
        $this->name = session('name', '');
        $this->phone = session('phone', '');
        $this->email = session('email', '');
    }

    public function forgetAll(){
        session()->forget('cart_items');
        session()->forget('subtotal');
        session()->forget('name');
        session()->forget('phone');
        session()->forget('email');
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.payment-success-page', [
            'subtotal' => $this->subtotal,
            'transaction' => $this->transaction,
        ]);
    }
}
