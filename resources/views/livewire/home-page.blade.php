@extends('components.layouts.page')

@section('content')

<div>
    <h1>{{ $title }}</h1>

    <!-- Input Pencarian -->
    <input type="text" wire:model="term" placeholder="Mau makan apa hari ini?" />

    <!-- Daftar Menu -->
    <div>
        @foreach ($filteredProducts as $menu)
            <div>
                <h3>{{ $menu->menuname }}</h3>
                <p>Rp {{ number_format($menu->menuprice, 0, ',', '.') }} / porsi</p>
            </div>
        @endforeach
    </div>
</div>