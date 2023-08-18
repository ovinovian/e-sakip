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
                                <h4 class="card-title">Form Rubah RPJMD</h4>
                            </div>
                            <div class="card-body">
                                <!-- action form yang mengarah ke route store untuk proses ubah data  -->
                                <form action="{{ route('rpjmds.update',$rpjmd->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-6">
                                        <label class="me-sm-2">Tahun Mulai</label>
                                        <select class="me-sm-2 mb-2 default-select form-control wide" id="inlineFormCustomSelect" name="tahun_awal" required>
                                            <option value="">Pilih Tahun...</option>
                                            @if (old('tahun_awal', 2023) == $rpjmd->tahun_awal)
                                            <option value="2023" selected>2023</option>
                                            @else
                                            <option value="2023">2023</option>
                                            @endif
                                            @if (old('tahun_awal', 2024) == $rpjmd->tahun_awal)
                                            <option value="2024" selected>2024</option>
                                            @else
                                            <option value="2024">2024</option>
                                            @endif
                                            @if (old('tahun_awal', 2025) == $rpjmd->tahun_awal)
                                            <option value="2025" selected>2025</option>
                                            @else
                                            <option value="2025">2025</option>
                                            @endif
                                            
                                        </select>
                                    </div>
                                    <div class="row mb-6 input-success">
                                        <label class="me-sm-2">Tahun Selesai</label>
                                        <select class="me-sm-2 default-select form-control wide" id="inlineFormCustomSelect" name="tahun_akhir" required>
                                            <option value="" selected>Pilih Tahun...</option>
                                            @if (old('tahun_akhir', 2023) == $rpjmd->tahun_akhir)
                                            <option value="2023" selected>2023</option>
                                            @else
                                            <option value="2023">2023</option>
                                            @endif
                                            @if (old('tahun_akhir', 2024) == $rpjmd->tahun_akhir)
                                            <option value="2024" selected>2024</option>
                                            @else
                                            <option value="2024">2024</option>
                                            @endif
                                            @if (old('tahun_akhir', 2025) == $rpjmd->tahun_akhir)
                                            <option value="2025" selected>2025</option>
                                            @else
                                            <option value="2025">2025</option>
                                            @endif
                                            @if (old('tahun_akhir', 2026) == $rpjmd->tahun_akhir)
                                            <option value="2026" selected>2026</option>
                                            @else
                                            <option value="2026">2026</option>
                                            @endif
                                            @if (old('tahun_akhir', 2027) == $rpjmd->tahun_akhir)
                                            <option value="2027" selected>2027</option>
                                            @else
                                            <option value="2027">2027</option>
                                            @endif
                                            @if (old('tahun_akhir', 2028) == $rpjmd->tahun_akhir)
                                            <option value="2028" selected>2025</option>
                                            @else
                                            <option value="2028">2028</option>
                                            @endif
                                            @if (old('tahun_akhir', 2029) == $rpjmd->tahun_akhir)
                                            <option value="2029" selected>2029</option>
                                            @else
                                            <option value="2029">2029</option>
                                            @endif
                                            @if (old('tahun_akhir', 2030) == $rpjmd->tahun_akhir)
                                            <option value="2030" selected>2030</option>
                                            @else
                                            <option value="2030">2030</option>
                                            @endif
                                        </select>
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