@props(['text'])

<div class="relative">
    <div class="inline-block cursor-pointer gap-2 px-2 py-1 md:px-4 md:py-2 text-white ring-1 ring-inset ring-[#F33A2E] rounded-lg">
        {{$slot ? $slot : $text}}
    </div>
    <div class="flex absolute top-0 left-0 cursor-pointer hover:-top-1 hover:-left-1.5 duration-150 gap-2 px-2 py-1 md:px-4 md:py-2 rounded-lg bg-white ring-1 ring-[#F33A2E] text-[#F33A2E] font-bold">
        {{$slot ? $slot : $text}}
    </div>
</div>
