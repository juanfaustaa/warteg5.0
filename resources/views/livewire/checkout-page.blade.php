<div class="bg-gradient-to-b from-[#00933B] to-[#F9A719] min-h-screen">
    <header class="w-full h-[80px] bg-[#FFFFFF] flex items-center">
        <a href="/" class="mx-[18px] w-[35px] h-[35px] flex items-center justify-center">
            <img src="../assets/Left Arrow.png" alt="Left arrow">
        </a>
        <h2 class="font-inter font-bold text-[#000000] text-[20px] ml-[95px]">
            Checkout
        </h2>
    </header>

    <main class="">
        <section class="mb-6">
            @if (count($cartItems) > 0)
                <h3 class="font-inter font-bold text-[#000000] text-[18px] pt-[10px] pl-[20px] mt-[6px] mb-[0px] bg-[#FFFFFF]">Pesanan</h3>
                <div class="space-y-4 bg-[#FFFFFF] pt-[10px] pb-[10px]">
                    @foreach ($cartItems as $item)
                        <div class="flex items-center justify-between bg-[#F5F5F5] rounded-[15px] mx-[13px] pl-[20px] pr-[16px] mb-[15px]">
                            <div>
                                <p class="font-inter font-bold text-[#000000]">{{ $item['menuname'] }}</p>
                                <p class="text-sm text-gray-500">Rp {{ number_format($item['menuprice'], 0, ',', '.') }}</p>
                            </div>
                            <div class="flex items-center justify-between mx-[10px] my-[8px]">
                                <button
                                    wire:click="decreaseQuantity('{{ $item['menuid'] }}')"
                                    class="bg-[#00933B] text-[#FFFFFF] rounded-full px-3 py-1 font-bold hover:bg-[#FFFFFF] hover:text-[#00933B] transition duration-300 ease-in-out"
                                >-</button>
                                <span class="px-[20px] font-semibold">{{ $item['quantity'] }}</span>
                                <button
                                    wire:click="increaseQuantity('{{ $item['menuid'] }}')"
                                    class="bg-[#00933B] text-[#FFFFFF] rounded-full px-3 py-1 text-sm font-bold hover:bg-[#FFFFFF] hover:text-[#00933B] transition duration-300 ease-in-out"
                                >+</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <section>
                    <h3 class="font-inter font-bold text-[#000000] text-[18px] pt-[10px] pl-[20px] mt-[6px] mb-[0px] bg-[#FFFFFF]">Data Pelanggan</h3>
                    <form wire:submit.prevent="checkout" class="space-y-4 bg-[#FFFFFF] pt-[10px] pb-[10px]">
                        <input type="text" wire:model="name" placeholder="Nama" class="mb-[20px] h-[42px] w-[345px] rounded-[8px] pl-16 pr-4 text-black placeholder:font-semibold placeholder:text-[#BFBFBF] mx-[20px] px-[20px]">
                        <input type="text" wire:model="phone" placeholder="No. HP" class="mb-[20px] h-[42px] w-[345px] rounded-[8px] pl-16 pr-4 text-black placeholder:font-semibold placeholder:text-[#BFBFBF] mx-[20px] px-[20px]">
                        <input type="email" wire:model="email" placeholder="Email" class="mb-[20px] h-[42px] w-[345px] rounded-[8px] pl-16 pr-4 text-black placeholder:font-semibold placeholder:text-[#BFBFBF] mx-[20px] px-[20px]">
                    </form>
                </section>
                <section class="bottom-0 left-0 right-0 bg-[#FFFFFF] mt-[6px]">
                    <div class="flex justify-between items-center px-[20px] py-[10px]">
                        <div class="flex-col items-center">
                            <p class="font-inter font-bold text-[#000000] mx-[20px] py-[-50px]">Subtotal</p>
                            <p class="font-inter font-bold text-[#000000] mx-[20px]">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
                        </div>
                        <a href="/payment-success" wire:click="checkout" class="w-[142px] h-[47px] bg-[#00933B] text-[#FFFFFF] text-bold rounded-[9px] flex justify-center items-center mr-[20px] hover:bg-[#FFFFFF] hover:text-[#00933B] transition duration-300 ease">Bayar</a>
                    </div>
                </section>
            @else
                <p class="text-center text-[#000000]">Silakan memesan makanan</p>
                <a href="/" class="text-[#00933B] underline text-center block mt-4">Kembali ke Home</a>
            @endif
        </section>
    </main>
</div>