<style>
    .swal2-confirm-margin {
        margin-right: 10px;
    }

    .swal2-cancel-margin {
        margin-right: 5px;
    }
</style>
<div class="d-flex">
    <a href="{{ route('program.edit',['program' => $id]) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
    <a href="#" class="btn btn-danger shadow btn-xs sharp delete-btn" data-url="{{ route('program.destroy', ['program' => $id]) }}"><i class="fa fa-trash"></i></a>
</div>

<script>
    $('a.delete-btn').on('click', function(e) {
    e.preventDefault();

    const href = $(this).data('url');

    Swal.fire({
        title: 'Hapus Data Ini?',
        text: "Perhatian data yang sudah dihapus tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
        customClass: {
            confirmButton: 'swal2-confirm-margin',
            cancelButton: 'swal2-cancel-margin'
        },
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deleteForm').action = href;
            document.getElementById('deleteForm').submit();
            
        }
    });
});

</script>