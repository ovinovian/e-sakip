@extends('layouts.with_sidebar')

@section('style')

<!-- Datatable -->
<link href="{{ asset('assets//vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

@endsection

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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-block">
                                <a class="btn btn-rounded btn-warning" href="{{ route('rpjmds.create') }}"><span class="btn-icon-start text-warning"><i class="fa fa-plus color-info"></i></span>Tambah RPJMD</a>
                            </div>
                            <div class="card-body">
                                <div class="accordion accordion-header-shadow accordion-rounded" id="accordion-two">
                                    @foreach ($rpjmds as $key => $rpjmd)
								    <div class="accordion-item">
                                        <div class="accordion-header rounded-lg" id="accord-2{{ ++$i }}" data-bs-toggle="collapse" data-bs-target="#collapse2{{ $i }}" aria-controls="collapse2{{ $i }}" aria-expanded="true" role="button">
                                            <span class="accordion-header-text">RPJMD {{ $rpjmd->tahun_awal }} - {{ $rpjmd->tahun_akhir }}</span>
                                            <span class="accordion-header-indicator"></span>
                                        </div>
                                        <div id="collapse2{{ $i }}" class="collapse accordion__body show" aria-labelledby="accord-2{{ $i }}" data-bs-parent="#accordion-two">
                                            <div class="accordion-body-text">
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <a href="{{route('rpjmd_i_visis', ['id' => $rpjmd->id])}}" class="badge badge-outline-secondary"><i class="fa fa-plus color-dark"></i> Input Visi</a>
                                                    </div>
                                                </div>                                                
                                                <div class="row mb-2">
                                                    <div class="col-2">Tahun Mulai</div>
                                                    <div class="col-3">{{ $rpjmd->tahun_awal }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-2">Tahun Selesai</div>
                                                    <div class="col-3">{{ $rpjmd->tahun_akhir }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-2">Status</div>
                                                    <div class="col-3">{{ $rpjmd->status_rpjmd }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-2">Aksi</div>
                                                    <div class="col-3">
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{ route('rpjmds.edit',$rpjmd->id) }}">Edit</a>
                                                                <form action="{{ route('rpjmds.destroy',$rpjmd->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah yakin ingin menghapus rpjmd?');">Delete</a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
								    </div>
                                    @endforeach							    
								</div>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>
		
@endsection

@section('script')

<!-- Apex Chart -->
<script src="{{ asset('assets//vendor/apexchart/apexchart.js') }}"></script>
	
<!-- Datatable -->
<script src="{{ asset('assets//vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>

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

@push('after-scripts')
  
@endpush