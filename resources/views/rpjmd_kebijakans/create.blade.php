@extends('layouts.with_sidebar')

@section('content')
		
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">RPJMD</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Kebijakan</a></li>
					</ol>
                    <div class="breadcrumb">
                        <a class="text-info divide-solid" href="#">Strategi : {{ $rpjmd_strategis->nama_strategi_rpjmd }}</a>
                    </div>
                </div>
				
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Input Kebijakan</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('rpjmd_kebijakans.store') }}" method="POST">
                                        @csrf
                                        <div class="input-group">
                                            <textarea class="form-control" rows="10" id="comment" name="nama_kebijakan_rpjmd" placeholder="Isi Kebijakan RPJMD..." required></textarea>
                                        </div>
                                        <div class="row align-items-center mt-3">
                                            <div class="col-auto my-1">
                                                <a href="{{ route('rpjmd_i_kebijakans', $rpjmd_strategis->id) }}" class="btn btn-warning mx-3">Batal</a>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_strategi_rpjmd" value="{{ $rpjmd_strategis->id }}">
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