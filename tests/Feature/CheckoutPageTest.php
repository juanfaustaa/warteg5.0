<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Livewire\Pages\CheckoutPage;
use App\Models\MsMenu;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CheckoutPageTest extends TestCase
{
    // Helper function biar gak ulang-ulang bikin menu dummy
    private function createDummyMenu()
    {
        return MsMenu::create([
            'name' => 'Sego Goreng',
            'price' => 15000,
        ]);
    }

    public function test_checkout_success_with_valid_data()
    {
        $menu = $this->createDummyMenu();

        Livewire::test(CheckoutPage::class)
            ->set('name', 'Budi')
            ->set('phone', '081234567890')
            ->set('email', 'budi@gmail.com')
            ->set('cartItems', [
                ['menuid' => $menu->id, 'menuprice' => $menu->price, 'quantity' => 2],
            ])
            ->call('checkout')
            ->assertRedirect('/payment-success');
    }

    public function test_checkout_fails_when_phone_invalid()
    {
        $menu = $this->createDummyMenu();

        Livewire::test(CheckoutPage::class)
            ->set('name', 'Budi')
            ->set('phone', '071234567') // Salah (tidak mulai 08)
            ->set('email', 'budi@gmail.com')
            ->set('cartItems', [
                ['menuid' => $menu->id, 'menuprice' => $menu->price, 'quantity' => 2],
            ])
            ->call('checkout')
            ->assertHasErrors(['phone']);
    }

    public function test_checkout_fails_when_email_invalid()
    {
        $menu = $this->createDummyMenu();

        Livewire::test(CheckoutPage::class)
            ->set('name', 'Budi')
            ->set('phone', '081234567890')
            ->set('email', 'budi@yahoo.com') // Salah (bukan @gmail.com)
            ->set('cartItems', [
                ['menuid' => $menu->id, 'menuprice' => $menu->price, 'quantity' => 2],
            ])
            ->call('checkout')
            ->assertHasErrors(['email']);
    }

    public function test_checkout_fails_when_name_empty()
    {
        $menu = $this->createDummyMenu();

        Livewire::test(CheckoutPage::class)
            ->set('name', '')
            ->set('phone', '081234567890')
            ->set('email', 'budi@gmail.com')
            ->set('cartItems', [
                ['menuid' => $menu->id, 'menuprice' => $menu->price, 'quantity' => 2],
            ])
            ->call('checkout')
            ->assertHasErrors(['name']);
    }

    public function test_checkout_fails_when_cart_is_empty()
    {
        // Test ini gak perlu menu dummy, karena cart kosong
        Livewire::test(CheckoutPage::class)
            ->set('name', 'Budi')
            ->set('phone', '081234567890')
            ->set('email', 'budi@gmail.com')
            ->set('cartItems', []) // Cart kosong
            ->call('checkout')
            ->assertHasErrors(['cartItems']);
    }
}
