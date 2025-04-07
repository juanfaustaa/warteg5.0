<?php

use App\Livewire\Pages\HomePage;
use App\Livewire\Pages\CheckoutPage;
use App\Livewire\Pages\PaymentSuccessPage;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

Route::get('/', HomePage::class);

Route::get('/checkout', CheckoutPage::class);

Route::get('/payment/success', PaymentSuccessPage::class);