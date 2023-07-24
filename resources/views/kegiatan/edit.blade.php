@extends('layouts.with_sidebar')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('kegiatan.index') }}">Kegiatan</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
            </ol>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h5 class="card-title">Edit Kegiatan</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('kegiatan.update',$id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 input-success">
                                    <label for="" class="mb-1">Nama Kegiatan<span class="text-danger">*</span></label>
                                    <input type="text" name="nama_kegiatan" value="{{$kegiatan->nama_kegiatan}}" class="form-control @error('nama_kegiatan') is-invalid @enderror">
                                    @error('nama_kegiatan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 input-success">
                                    <label for="" class="mb-1">Kode Kegiatan<span class="text-danger">*</span></label>
                                    <input type="text" name="kode_kegiatan" value="{{$kegiatan->kode_kegiatan}}" class="form-control @error('kode_kegiatan') is-invalid @enderror">
                                    @error('kode_kegiatan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 input-success">
                                    <label for="id_program" class="mb-1">Program <span class="text-danger">*</span></label>
                                    <select name="id_program" class="id_program form-control @error('id_program') is-invalid @enderror" id="id_program">
                                    <option value="{{$current_program->id}}" selected>{{$current_program->nama_program}}</option>
                                        @foreach ($programs as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_program }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_program')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Ubah</button>
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
        $('.id_program').select2({
            placeholder: 'Pilih Data Program'
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