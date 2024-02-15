
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">

            <h1>Clientes</h1>

            <x-button @click="$dispatch('notify', { title: 'enviando notificação..' })">Clique aqui!</x-button>

            <div
                x-data="{open: false}"
                x-show="open"
                @notify.window="Toastify({
                    text: 'This is a toast',
                    duration: 3000,
                    newWindow: true,
                    close: true,
                    gravity: 'top',
                    position: 'right',
                    stopOnFocus: true,
                    style: {
                        background: 'linear-gradient(to right, #00b09b, #96c93d)',
                    },
                }).showToast();"
            >

            </div>
        </div>
    </div>
</div>

