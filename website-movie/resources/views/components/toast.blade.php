@if (session()->has('message'))
<div class="fixed top-4 right-4 text-4xl z-10">
    <div class="relative">
        <div id="toast" class="flex justify-between items-center px-4 gap-4 py-2 w-full text-gray-700 bg-white border">
            <div>

                {{session('message')}}
            </div>
            <div id="close" class="cursor-pointer rounded-full h-10 w-10 border flex justify-center items-center text-center bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <span id="loading" class="absolute bottom-0 left-0 bg-[#F33A2E] h-[2px] w-full"></span>
        </div>
    </div>
</div>
@endif

<script>
    const toast = document.getElementById("toast");
    const loading = document.getElementById("loading");
    const close = document.getElementById("close");

    /**
     * Set element to invisible.
     * @param {object} element - The target element that you wanna set to invisible.
     */
    const setInvisible = (element) => {
        if(!element.classList.contains("invisible")){
            element.classList.add('invisible');
        }
    }

    close.addEventListener("click", () => {
        loading.classList.remove('duration-[3s]');
	    setInvisible(loading);
	    setInvisible(toast);
    });

    if (toast.textContent) {
        setTimeout(() => {
            loading.classList.add('duration-[3s]');
            loading.classList.replace('w-full', 'w-0');
        }, 100);
        setTimeout(() => {
            loading.classList.remove('duration-[3s]');
            loading.classList.replace('w-0', 'w-full');
            setInvisible(loading);
            setInvisible(toast);
        }, 3000);
    }else{
        toast.classList.remove('invisible');
        loading.classList.remove('invisible');
    }
</script>
