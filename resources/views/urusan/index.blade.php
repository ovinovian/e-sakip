@extends('layouts.with_sidebar')

@section('style')

<!-- Datatable -->
<link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

@endsection

@section('content')

<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">URUSAN</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('urusan.create') }}" class="btn btn-primary">Tambah Urusan</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataUrusan" class="table table-bordered table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Urusan</th>
                                        <th>Kode Urusan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form action="" method="POST" id="deleteForm">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Hapus" style="display: none">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<!-- Datatable -->
<script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>

<script>
        $(function() {
            $('#dataUrusan').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                autoWidth: false,
                paging:true,
                ajax: '{{ route('data-urusan') }}',
                language: {
                    paginate: {
                    next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                    previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
                    }
		        },
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama_urusan',
                        searchable:true
                    },
                    {
                        data: 'kode_urusan',
                        searchable:true
                    },
                    {
                        data: 'action'
                    }
                ]
            })
        })
</script>
<script>
    @if($message = Session::get('success'))
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Selamat',
        html: '{{ $message }}',
        timer: 4000
    })
    @endif
    @if($message = Session::get('success_delete'))
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Selamat',
        html: '{{ $message }}',
        timer: 4000
    })
    @endif
</script>

@endsection