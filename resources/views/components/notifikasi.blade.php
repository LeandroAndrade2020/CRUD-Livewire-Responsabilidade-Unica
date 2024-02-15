<div
    x-data="{open: false}"
    x-show="open"
    @notify.window="Toastify({
        text: $event.detail.message,
        duration: 3000,
        newWindow: true,
        close: true,
        gravity: 'top',
        position: 'right',
        stopOnFocus: true,
        style: {
            background: ($event.detail.title === 'success') ? 'linear-gradient(to right, #29f096, #1f6e4a)' : 'linear-gradient(to right, #f22727, #8c0707)',
        },
    }).showToast();"
>
</div>
