<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use App\Models\MsUser;
use App\Models\TransactionHeader;
use App\Models\TransactionDetail;
use Livewire\Attributes\Session;
use Carbon\Carbon;
use Livewire\Component;

class CheckoutPage extends Component
{   
    public $name = '';
    public $phone = '';
    public $email;
    public $foods;
    public $title = "All Foods";
    public bool $selectAll = true;
    #[Session('cart_items')]
    public $cartItems = [];
    public $hasUnpaidTransaction = false;
    #[Session('subtotal')]
    public $subtotal;
    
    public function mount()
    {
        $this->cartItems = session('cart_items', []);
        $this->name = session('name', '');
        $this->phone = session('phone', '');
        $this->email = session('email', '');
    }

    public function increaseQuantity($itemId)
    {
        $key = collect($this->cartItems)->search(fn($item) => $item['menuid'] === $itemId);

        if ($key !== false) {
            $this->cartItems[$key]['quantity']++;
        }
        session()->put('cart_items', $this->cartItems);
    }

    public function decreaseQuantity($itemId){
        $key = collect($this->cartItems)->search(fn($item) => $item['menuid'] === $itemId);

        if ($key !== false) {
            $this->cartItems[$key]['quantity']--;

            if ($this->cartItems[$key]['quantity'] <= 0) {
                unset($this->cartItems[$key]);
                $this->cartItems = array_values($this->cartItems); // Reset index
            }
        }
        session()->put('cart_items', $this->cartItems);
    }

    public function countSubtotal(){
        $this->subtotal = collect($this->cartItems)->sum(fn($item) => $item['menuprice'] * $item['quantity']);
        session()->put('subtotal', $this->subtotal);
    }

    public function checkout()
    {
        $this->validate([
        'name' => 'required|string|max:255',
        'phone' => ['required', 'regex:/^08\d{9,11}$/'],
        'email' => ['required', 'email', 'regex:/^[^@]+@gmail\.com$/'],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'phone.required' => 'Nomor telepon wajib diisi.',
           'phone.regex' => 'Panjang nomor telepon harus 11-13 digit dan diawali 08.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.regex' => 'Email harus diakhiri dengan @gmail.com.',
        ]);

        if (empty($this->cartItems)) {
            $this->addError('cartItems', 'Silakan pilih setidaknya satu item untuk melanjutkan.');
            return;
        }

        $user = MsUser::create([
            'username' => $this->name,
            'userphonenumber' => $this->phone,
            'useremail' => $this->email,
        ]);

        $transaction = TransactionHeader::create([
            'transactiondate' => Carbon::now(),
            'paymentstatus' => 'SUCCESS',
            'userid' => $user->userid,
        ]);

        foreach ($this->cartItems as $item) {
            TransactionDetail::create([
                'transactionid' => $transaction->transactionid,
                'menuid' => $item['menuid'],
                'quantity' => $item['quantity'],
            ]);
        }

        session()->forget('cart_items');

        $this->cartItems = [];

        return redirect('/payment-success');
    }

    #[Layout('components.layouts.page')]

    public function render()
    {
        return view('livewire.checkout-page', [
            'subtotal' => $this->countSubtotal(),
        ]);
    }
}
