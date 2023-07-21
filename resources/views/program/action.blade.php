<style>
    .swal2-confirm-margin {
        margin-right: 10px;
    }

    .swal2-cancel-margin {
        margin-right: 5px;
    }
</style>
<div class="d-flex">
    <a href="{{ route('urusan.edit',$model) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
    <a href="{{ route('urusan.destroy',$model) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('button#delete').on('click', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Hapus Data Ini?',
            text: "Perhatian data yang sudah di hapus tidak bisa di kembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal!',
            customClass: {
                confirmButton: 'swal2-confirm-margin',
                cancelButton: 'swal2-cancel-margin'
            },
        }).then((result) => {
            if (result.isConfirmed) {

                document.getElementById('deleteForm').action = href;
                document.getElementById('deleteForm').submit();

                Swal.fire(
                    'Terhapus!',
                    'Data sudah terhapus.',
                    'success'
                )
            }
        })
    });
</script>