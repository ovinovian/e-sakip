@extends('layouts.with_sidebar')

@section('content')
		
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">RPJMD</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Sasaran</a></li>
					</ol>
                    <div class="breadcrumb">
                        <a class="text-info divide-solid" href="#">Tujuan : {{ $rpjmd_tujuans->nama_tujuan_rpjmd }}</a>
                    </div>
                </div>
				
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Input Sasaran</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('rpjmd_sasarans.store') }}" method="POST">
                                        @csrf
                                        <div class="input-group">
                                            <textarea class="form-control" rows="10" id="comment" name="nama_sasaran_rpjmd" placeholder="Isi Sasaran RPJMD..." required></textarea>
                                        </div>
                                        <div class="row align-items-center mt-3">
                                            <div class="col-auto my-1">
                                                <a href="{{ route('rpjmd_i_sasarans', $rpjmd_tujuans->id) }}" class="btn btn-warning mx-3">Batal</a>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_tujuan_rpjmd" value="{{ $rpjmd_tujuans->id }}">
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

<script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script>

@endsection