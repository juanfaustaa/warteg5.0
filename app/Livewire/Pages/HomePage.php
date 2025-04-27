<?php

namespace App\Livewire\Pages;

use App\Livewire\Traits\CategoryFilterTrait;
use App\Models\MsMenuCategory;
use App\Models\MsMenu;
use Livewire\Attributes\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

class HomePage extends Component
{
    use CategoryFilterTrait;

    public $categories;
    public $selectedCategories = [];
    public $items;
    public $title = 'Warteg 5.0';
    public $term = ''; // Properti untuk menyimpan kata kunci pencarian
    public $search = ''; // Properti untuk menyimpan kata kunci pencarian
    public $cartItems = [];
    public $quantity = 0;

    public function mount(MsMenu $menus){
        $this->categories = MsMenuCategory::all();
        $this->items = $menus->getAllMenus();
        $this->cartItems = session('cart_items', []);
    }

    #[Layout('components.layouts.page')]
    public function addToCart($itemId)
    {
        $existingItemKey = collect($this->cartItems)->search(fn($item) => $item['menuid'] === $itemId);

        if ($existingItemKey !== false) {
            $this->cartItems[$existingItemKey]['quantity']++;
        }

        else {
            $item = MsMenu::find($itemId);

            if ($item) {
                $this->cartItems[] = [
                    'menuid' => $item->menuid,
                    'menuname' => $item->menuname,
                    'menuprice' => $item->menuprice,
                    'quantity' => 1,
                ];
            }
        }
        session()->put('cart_items', $this->cartItems);
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

    public function getCartTotalProperty(){
        return collect($this->cartItems)->sum(fn($item) => $item['quantity']);
    }

    public function isInCart($itemId){
        return collect($this->cartItems)->firstWhere('menuid', $itemId);
    }

    public function saveCartToSession()
    {
        session(['cart_items' => $this->cartItems]);
    }

    public function render(){
        $searchTerm = trim($this->term); // Pastikan pencarian tidak case-sensitive

        if (!empty($searchTerm)) {
            $searchResult = MsMenu::whereRaw('menuname LIKE ?', ["%{$searchTerm}%"])->get();
        }

        else {
            $searchResult = collect(); // Kosongkan hasil pencarian jika tidak ada term
        }

        return view('livewire.home-page', [
            'searchResult' => $searchResult,
            'cartTotal' => $this->getCartTotalProperty(),
        ]);
    }
}
