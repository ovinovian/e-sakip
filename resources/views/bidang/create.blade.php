@extends('layouts.with_sidebar')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('bidang.index') }}">Bidang</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah</a></li>
            </ol>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h5 class="card-title">Tambah Bidang</h5>
                        </div>

                        <div class="card-body">
                            <!-- action form yang mengarah ke route store untuk proses simpan data  -->
                            <form action="{{ route('bidang.store') }}" method="post">
                                @csrf
                                <div class="mb-3 input-success">
                                    <label for="" class="mb-1">Nama Bidang<span class="text-danger">*</span></label>
                                    <input type="text" name="nama_bidang" class="form-control @error('nama_bidang') is-invalid @enderror">
                                    @error('nama_bidang')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 input-success">
                                    <label for="" class="mb-1">Kode Bidang<span class="text-danger">*</span></label>
                                    <input type="text" name="kode_bidang" class="form-control @error('kode_bidang') is-invalid @enderror">
                                    @error('kode_bidang')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 input-success">
                                    <label for="id_urusan" class="mb-1"> Urusan <span class="text-danger">*</span></label>
                                    <select name="id_urusan" class="id_urusan form-control @error('id_urusan') is-invalid @enderror" id="id_urusan">
                                        <option value="">Pilih Urusan</option>
                                        @forelse ($urusans as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_urusan }}</option>
                                        @empty
                                        <option value="">Urusan tidak ditemukan</option>
                                        @endforelse
                                    </select>
                                    @error('id_urusan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2 mt-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('assets/vendor/select2/js/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.id_urusan').select2({
            placeholder: 'Pilih Data Urusan'
        });
    })
</script>
<script>
    @if($message = Session::get('error'))
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'error..',
        html: '{{ $message }}',
        timer: 4000
    })
    @endif
</script>
@endsection