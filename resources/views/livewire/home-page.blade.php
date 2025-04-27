<div class="bg-gradient-to-b from-[#00933B] to-[#F9A719] min-h-screen">
    <header class="text-center">
        <h1 class="p-[10px] mb-[-7px] font-inter text-[#FFFFFF]">Warteg 5.0</h1>
        <div class="p-4">
            <form class="relative bg-white rounded-full px-[16px] py-[0px]" method="GET">
                @if (! $term)
                    <div class="absolute left-[25px] justify-center mt-[3px] top-1/2 transform -translate-y-1/2">
                        <img
                            src="{{ asset('../assets/Search.png') }}"
                            alt="Search Icon"
                            class="h-6 w-6 object-contain"
                        />
                    </div>
                @endif
                <input
                    type="search"
                    class="h-[44px] w-full appearance-none rounded-full pl-16 pr-4 text-black placeholder:font-semibold placeholder:text-[#BFBFBF] px-[35px]"
                    placeholder="Mau makan apa hari ini?"
                    wire:model.live.debounce.300ms="term"
                />
            </form>
        </div>
    </header>

    <main class="p-4">
        @if ($term == "")
            <div class="space-y-4">
                <h2 class="font-semibold text-[#FFFFFF] font-inter px-[17px]">Jenis Menu</h2>
                <div class="flex gap-2 overflow-x-auto">
                    @foreach ($categories as $category)
                        <a
                            href="#{{ $category->menucategoryid }}"
                            class="flex font-inter font-bold justify-center items-center bg-[#FFFFFF] text-[#000000] w-[78px] h-[37px] mx-[16px] rounded-[12px] text-[14px] shadow-md hover:bg-[#00933B] hover:text-[#FFFFFF] transition duration-300 ease-in-out"
                        >
                            {{ $category->menucategoryname }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="mt-6 space-y-10">
                @foreach ($categories as $category)
                    <div id="{{ $category->menucategoryid }}">
                        <h2 class="font-inter font-semibold mb-[4px] mx-[17px] text-[#FFFFFF]">{{ $category->menucategoryname }}</h2>
                        <div class="grid grid-cols-2 gap-4">
                            @foreach ($items->where('menucategoryid', $category->menucategoryid) as $item)
                                <div class="bg-[#FFFFFF] text-black rounded-[24px] overflow-hidden shadow-md mx-[8px] my-[8px]">
                                    <img
                                        src="{{ asset('storage/' . $item->menuimage) }}"
                                        alt="{{ $item->menuname }}"
                                        class="flex w-[143px] h-[89px] mx-[27px] my-[6px] rounded-[10px]"
                                    />
                                    <div class="p-4">
                                        <h4 class="text-base font-normal m-auto text-center">{{ $item->menuname }}</h4>
                                        <p class="text-sm text-gray-600 m-auto  text-center">Rp {{ number_format($item->menuprice, 0, ',', '.') }}</p>
                                        @if ($cartItem = $this->isInCart($item->menuid))
                                            <div class="flex items-center justify-between mx-[36px] my-[8px]">
                                                <button
                                                    wire:click="decreaseQuantity('{{ $item->menuid }}')"
                                                    class="bg-[#00933B] text-white rounded-full px-3 py-1 text-sm font-bold hover:bg-[#FFFFFF] hover:text-[#00933B] transition duration-300 ease-in-out"
                                                >-</button>
                                                <span class="px-2 font-semibold">{{ $cartItem['quantity'] }}</span>
                                                <button
                                                    wire:click="increaseQuantity('{{ $item->menuid }}')"
                                                    class="bg-[#00933B] text-white rounded-full px-3 py-1 text-sm font-bold hover:bg-[#FFFFFF] hover:text-[#00933B] transition duration-300 ease-in-out"
                                                >+</button>
                                            </div>
                                        @else
                                            <button
                                                wire:click="addToCart('{{ $item->menuid }}')"
                                                class="my-[10px] w-[115px] bg-[#00933B] text-[#FFFFFF] hover:bg-[#FFFFFF] hover:text-[#00933B] rounded-[9px] text-sm font-poppins font-bold flex justify-center items-center m-auto transition duration-300 ease-in-out"
                                            >
                                                Beli
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h2 class="font-semibold text-[#FFFFFF] font-inter px-[17px] text-center">Hasil Pencarian</h2>
            @if ($searchResult->isEmpty())
                <div class="my-6">
                    <p class="text-center text-[#FFFFFF] font-semibold font-inter">
                        Makanan tidak ditemukan
                    </p>
                </div>
            @else
                <div class="grid grid-cols-2 gap-4 mt-6">
                    @foreach ($searchResult as $result)
                        <div class="bg-[#FFFFFF] text-black rounded-[24px] overflow-hidden shadow-md mx-[8px] my-[8px]">
                            <img
                                src="{{ asset('storage/' . $result->menuimage) }}"
                                alt="{{ $result->menuname }}"
                                class="flex w-[143px] h-[89px] mx-[27px] my-[6px] rounded-[10px]"
                            />
                            <div class="p-4">
                                <h3 class="text-base font-semibold m-auto text-center">{{ $result->menuname }}</h3>
                                <p class="text-sm text-gray-600 m-auto text-center">Rp {{ number_format($result->menuprice, 0, ',', '.') }}</p>
                                @if ($cartItem = $this->isInCart($result->menuid))
                                    <div class="flex items-center justify-between mx-[36px] my-[8px]">
                                        <button
                                            wire:click="decreaseQuantity('{{ $result->menuid }}')"
                                            class="bg-[#00933B] text-white rounded-full px-3 py-1 text-sm font-bold hover:bg-[#FFFFFF] hover:text-[#00933B] transition duration-300 ease-in-out"
                                        >-</button>
                                        <span class="px-2 font-semibold">{{ $cartItem['quantity'] }}</span>
                                        <button
                                            wire:click="increaseQuantity('{{ $result->menuid }}')"
                                            class="bg-[#00933B] text-white rounded-full px-3 py-1 text-sm font-bold hover:bg-[#FFFFFF] hover:text-[#00933B] transition duration-300 ease-in-out"
                                        >+</button>
                                    </div>
                                @else
                                    <button
                                        wire:click="addToCart('{{ $result->menuid }}')"
                                        class="my-[10px] w-[115px] bg-[#00933B] text-white rounded-[9px] text-sm font-semibold flex justify-center items-center m-auto"
                                    >
                                        Beli
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endif
        @if ($cartTotal > 0)
            <a href="/checkout-page" wire:click="saveCartToSession" class="fixed bottom-[20px] left-1/2 transform -translate-x-1/2 w-[320px] bg-[#00933B] text-[#FFFFFF] rounded-full px-6 py-3 shadow-lg flex justify-between items-center hover:bg-[#FFFFFF] hover:text-[#00933B] transition duration-300 ease-in-out group">
                <div>
                    <p class="text-sm font-semibold mx-[22px]">{{ $cartTotal }} Makanan | Rp {{ number_format(collect($cartItems)->sum(fn($item) => $item['menuprice'] * $item['quantity']), 0, ',', '.') }}</p>
                </div>
                <img src="{{ asset('../assets/Shopping Basket.png') }}" alt="Cart" class="w-5 h-5 mx-[18px] group-hover:hidden">
                <img src="{{ asset('../assets/Shopping Basket hover.png') }}" alt="CartHover" class="w-5 h-5 mx-[18px] hidden group-hover:block">
            </a>
        @endif
        <footer class="text-[#FFFFFF] text-center pt-[50px] h-[100px]">
            <p class="text-sm">Warteg 5.0</p>
        </footer>
    </main>
</div>
