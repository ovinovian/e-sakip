@extends('layouts.with_sidebar')

@section('content')
		
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">RPJMD</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Indikator Tujuan</a></li>
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
                                <h4 class="card-title">Form Input Indikator Tujuan</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('rpjmd_s_tujuan_indikators',$rpjmd_tujuans->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="nama_tujuan_indikator_rpjmd" class="mb-1"> Indikator Tujuan <span class="text-danger">*</span></label>
                                            <textarea class="form-control" rows="10" id="comment" name="nama_tujuan_indikator_rpjmd" placeholder="Isi Indikator Tujuan RPJMD..." required></textarea>
                                        </div>
                                        <div class="mb-3 input-success">
                                            <label for="id_satuan" class="mb-1"> Satuan <span class="text-danger">*</span></label>
                                            <select name="id_satuan" class="id_satuan form-control @error('id_satuan') is-invalid @enderror" id="id_satuan">
                                                <option value="">Pilih Urusan</option>
                                                @forelse ($satuans as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_satuan }}</option>
                                                @empty
                                                <option value="">Satuan tidak ditemukan</option>
                                                @endforelse
                                            </select>
                                            @error('id_satuan')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row align-items-center mt-3">
                                            <div class="col-auto my-1">
                                                <a href="{{ route('rpjmd_i_tujuans', $rpjmd_tujuans->id_misi_rpjmd) }}" class="btn btn-warning mx-3">Batal</a>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_tujuan_rpjmd" value="{{ $rpjmd_tujuans->id }}">
                                        <input type="hidden" name="id_misi_rpjmd" value="{{ $rpjmd_tujuans->id_misi_rpjmd }}">
                                    </form>
                                </div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
@endsection