<div class="relative">
    <div class="hidden md:flex cursor-pointer justify-center gap-2 px-4 py-2 text-white ring-1 ring-inset ring-[#F33A2E] rounded-lg">
        {{$slot}}
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
    </div>
    <div class="hidden md:flex w-full h-full justify-center absolute top-0 left-0 cursor-pointer hover:-top-1 hover:-left-1 duration-150 gap-2 px-4 py-2 rounded-lg bg-[#F33A2E] text-white font-bold">
        {{$slot}}
    </div>
</div>
