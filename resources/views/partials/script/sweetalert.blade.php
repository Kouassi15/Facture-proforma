    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if (session('success'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-right',
                iconColor: 'white',
                color: 'white',
                background: '#15C162B6',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,

            })
            Toast.fire({
                text: "{{ session('success') }}",
                icon: "success",
            });
        @endif
        @if (session('warning'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-right',
                iconColor: 'white',
                color: 'white',
                background: '#C1B615B6',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,

            })
            Toast.fire({
                text: "{{ session('warning') }}",
                icon: "warning",
            });
        @endif
        @if (session('error'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-right',
                iconColor: 'white',
                color: 'white',
                background: '#E864C5B0',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,

            })

            Toast.fire({
                text: "{{ session('error') }}",
                icon: "error",
            });
        @endif
        @if ($errors->any())
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-right',
                iconColor: 'white',
                color: 'white',
                background: '#E864C593',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,

            })
            Toast.fire({
                icon: 'error',
                title: "{{ $errors->first() }}",
            })
        @endif
    </script>
