@extends('layouts.with_sidebar')

@section('content')
		
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">RPJMD</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Strategi</a></li>
					</ol>
                    <div class="breadcrumb">
                        <a class="text-info divide-solid" href="#">Sasaran : {{ $rpjmd_sasarans->nama_sasaran_rpjmd }}</a>
                    </div>
                </div>
				
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Input Strategi</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('rpjmd_strategis.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3 input-success">
                                        <label for="" class="mb-1">Strategi<span class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="10" id="comment" name="nama_strategi_rpjmd" placeholder="Isi Strategi RPJMD..." required></textarea>
                                    </div>
                                    <div class="row align-items-center mt-3">
                                        <div class="col-auto my-1">
                                            <a href="{{ route('rpjmd_i_strategis', $rpjmd_sasarans->id) }}" class="btn btn-warning mx-3">Batal</a>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_sasaran_rpjmd" value="{{ $rpjmd_sasarans->id }}">
                                </form>
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