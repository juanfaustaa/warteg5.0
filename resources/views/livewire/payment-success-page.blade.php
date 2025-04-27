<div class="bg-gradient-to-b from-[#00933B] to-[#F9A719] min-h-screen">
    <h1 class="text-center text-[#FFFFFF] mt-[70px]">Pembayaran Berhasil!</h1>
    <img src="assets/successful man winner.png" alt="man" class="flex justify-center mx-auto mt-[25px]">
    <div class="w-[369px] h-[166px] mx-auto bg-[#FFFFFF] rounded-[15px] px-[24px] flex flex-col justify-between mt-[25px]">
        <div class="flex justify-between">
            <p class="text-sm font-semibold text-left">ID Pesanan</p>
            <p class="text-sm text-right">{{ $transaction->transactionid }}</p>
        </div>
        <div class="flex justify-between">
            <p class="text-sm font-semibold text-left">Waktu Pembelian</p>
            <p class="text-sm text-right">{{ $transaction->transactiondate }}</p>
        </div>
        <div class="flex justify-between">
            <p class="text-sm font-semibold text-left">Subtotal</p>
            <p class="text-sm text-right">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
        </div>
    </div>
    <a href="/" wire:click="forgetAll()" class="w-[272px] h-[47px] mx-auto bg-[#00933B] rounded-[9px] flex justify-center items-center mt-[25px]">
        <h3 class="text-[#FFFFFF]">Selesai</h3>
    </a>
</div>