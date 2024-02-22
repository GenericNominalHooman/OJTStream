@php
    use Illuminate\Support\Facades\Storage;
    use Carbon\Carbon;
@endphp
{{-- PELAJAR SECTION BEGIN --}}
@if (in_array("Pelajar", auth()->user()->getRoles()))
<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="{{ asset('assets') }}/img/bruce-mars.jpg" alt="profile_image"
                        class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ $dokumenOJT->document_name }}
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        {{$dokumenOJT->document_description}}
                    </p>
                </div>
            </div>
        </div>
        <div class="card card-plain h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-3">Dokumen KVOJT</h6>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                @if (session('status'))
                <div class="row">
                    <div class="alert alert-success alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ Session::get('status') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                @if (Session::has('demo'))
                <div class="row">
                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ Session::get('demo') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                <form wire:submit.prevent='update'>

                    {{-- ORGANISASI LATIHAN BEGIN --}}
                    
                    <div class="row">

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nama Organisasi Latihan</label>
                            <input wire:model.lazy="company.comp_name" type="text" class="form-control border border-2 p-2">
                            @error('company.comp_name')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nombor Telefon</label>
                            <input wire:model.lazy="company.comp_contact" type="text" class="form-control border border-2 p-2">
                            @error('company.comp_contact')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nama Penyelia Organisasi</label>
                            <input wire:model.lazy="company.ojt_supervisor" type="text" class="form-control border border-2 p-2">
                            @error('company.ojt_supervisor')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Alamat Emel</label>
                            <input wire:model.lazy="company.comp_email" type="text" class="form-control border border-2 p-2">
                            @error('company.comp_email')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
        
                        <div class="mb-3 col-md-6">

                            <label class="form-label">Jawatan Diperoleh</label>
                            <input wire:model.lazy="pelajars_company.role" type="text" class="form-control border border-2 p-2">
                            @error('pelajars_company.role')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>


                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Dokumen OJT Anda</h6>
                            </div>
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Alamat Syarikat: Negeri</label>
                            <input wire:model.lazy="company.comp_address_province" type="text" class="form-control border border-2 p-2">
                            @error('company.comp_address_province')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        
                        <div class="mb-3 col-md-6">

                            <label class="form-label">Alamat Syarikat: Jalan</label>
                            <input wire:model.lazy="company.comp_address_street" type="text" class="form-control border border-2 p-2">
                            @error('company.comp_address_street')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        
                        <div class="mb-3 col-md-6">

                            <label class="form-label">Alamat Syarikat: Bandar</label>
                            <input wire:model.lazy="company.comp_address_city" type="text" class="form-control border border-2 p-2">
                            @error('company.comp_address_city')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-12">

                            <label for="skop_kerja_input">Skop Kerja</label>
                            <input wire:model="skop_kerja_input" type="file" class="form-control" id="skop_kerja_input">
                            @error('skop_kerja_input')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-12">
                            @if (true)
                                <p class="text text-success">Skop Kerja Telah Dimuat Naik</p>
                            @else
                                <p class="text text-danger">Skop Kerja Belum Dimuat Naik</p>
                            @endif
                            <button type="button" class="btn btn-primary" wire:click='downloadSkopKerja()'>Muat Turun Skop Kerja</button>
                        </div>
                    </div>

                    {{-- ORGANISASI LATIHAN ENDS --}}

                    <button type="submit" class="btn bg-gradient-dark">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
{{-- PELAJAR SECTION ENDS --}}