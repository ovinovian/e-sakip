@extends('layouts.with_sidebar')

@section('content')
		
        <div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">RPJMD</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Input RPJMD</h4>
                            </div>
                            <div class="card-body">
                                <!-- action form yang mengarah ke route store untuk proses simpan data  -->
                                <form action="{{ route('rpjmds.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3 input-success">
                                        <label class="me-sm-2">Tahun Mulai</label>
                                        <select class="me-sm-2 default-select form-control wide" id="inlineFormCustomSelect" name="tahun_awal" required>
                                            <option value="" selected>Pilih Tahun...</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                        @error('tahun_awal')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 input-success">
                                        <label class="me-sm-2">Tahun Selesai</label>
                                        <select class="me-sm-2 default-select form-control wide" id="inlineFormCustomSelect" name="tahun_akhir" required>
                                            <option value="" selected>Pilih Tahun...</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                        </select>
                                        @error('tahun_akhir')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row align-items-center mt-3">
                                        <div class="col-auto my-1">
                                            <a href="{{ route('rpjmds.index') }}" class="btn btn-warning mx-3">Batal</a>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
					</div>                    
                </div>
            </div>
        </div>
		
@endsection