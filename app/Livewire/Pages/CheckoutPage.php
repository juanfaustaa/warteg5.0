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
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        if (empty($this->cartItems)) {
            $this->addError('cartItems', 'Please select at least one item to proceed.');
            return;
        }

        // Simpan data pelanggan
        $user = MsUser::create([
            'username' => $this->name,
            'userphonenumber' => $this->phone,
            'useremail' => $this->email,
        ]);

        // Simpan data transaksi ke tabel transactionheader
        $transaction = TransactionHeader::create([
            'transactiondate' => Carbon::now(),
            'paymentstatus' => 'SUCCESS',
            'userid' => $user->userid,
        ]);

        // Simpan detail transaksi ke tabel transactiondetail
        foreach ($this->cartItems as $item) {
            TransactionDetail::create([
                'transactionid' => $transaction->transactionid,
                'menuid' => $item['menuid'],
                'quantity' => $item['quantity'],
            ]);
        }

        // Hapus session cart_items
        session()->forget('cart_items');

        // Reset cartItems setelah transaksi selesai
        $this->cartItems = [];

        // Redirect ke halaman sukses
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
