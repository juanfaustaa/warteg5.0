<?php

namespace App\Livewire\Pages;

use App\Livewire\Traits\CategoryFilterTrait;
use App\Models\MsMenuCategory;
use App\Models\MsMenu;
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

    public function mount(MsMenu $menus)
{
        $this->categories = MsMenuCategory::all();
        $this->items = $menus->getAllMenus();
    }

    #[Layout('components.layouts.page')]
    public function render()
    {
// Jika ada pencarian, filter menu berdasarkan kata kunci
        if (!empty($this->term)) {
            $filteredProducts = MsMenu::where('menuname', 'like', '%' . trim($this->term) . '%')->get();
        } else {
            // Jika tidak ada pencarian, tampilkan semua menu
        $filteredProducts = $this->getFilteredItems();
}

        return view('livewire.home-page', [
            'filteredProducts' => $filteredProducts,
        ]);
    }
}
