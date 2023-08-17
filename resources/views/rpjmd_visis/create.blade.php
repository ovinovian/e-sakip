@extends('layouts.with_sidebar')

@section('content')
		
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">RPJMD</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Visi</a></li>
					</ol>
                    <div class="breadcrumb">
                            <a class="text-info divide-solid" href="#">RPJMD {{ $rpjmds->tahun_awal }} - {{ $rpjmds->tahun_akhir }}</a>
                    </div>
                </div>
                
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Input Visi</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('rpjmd_visis.store') }}" method="POST">
                                        @csrf
                                        <div class="input-group">
                                            <textarea class="form-control" rows="10" id="comment" name="nama_visi_rpjmd" placeholder="Isi Visi Bupati..." required></textarea>
                                        </div>
                                        <div class="row align-items-center mt-3">
                                            <div class="col-auto my-1">
                                                <a href="{{ route('rpjmd_i_visis',['id' => $rpjmds->id]) }}" class="btn btn-warning mx-3">Batal</a>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_rpjmd" value="{{ $rpjmds->id }}">
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