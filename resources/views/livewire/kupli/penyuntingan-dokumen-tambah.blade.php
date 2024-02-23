@php
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
@endphp
<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="card card-plain h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-3">Tambah Dokumen </h6>
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
                <form wire:submit.prevent='add()'>

                    {{-- KUPLI BEGIN --}}
                    
                    <div class="row">

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Nama Dokumen</label>
                            <input wire:model="dokumen_ojt_input_name" type="text" class="form-control border border-2 p-2">
                            @error('dokumen_ojt_input_name')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Penjelasan Dokumen</label>
                            <input wire:model="dokumen_ojt_input_description" type="text" class="form-control border border-2 p-2">
                            @error('dokumen_ojt_input_description')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Jenis Dokumen</label>
                            <select class="form-control" wire:model='dokumen_ojt_input_type'>
                                <option value="pengisian">Pengisian</option>
                                <option value="infomasi" selected>Infomasi</option>
                            </select>
                            @error('dokumen_ojt_input_type')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-12">

                            <label class="form-label">Dokumen</label>
                            <input wire:model="dokumen_ojt_input_file" type="file" class="form-control border border-2 p-2">
                            @error('dokumen_ojt_input_file')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="row col-12 container">
                            <div class="mb-3 col-12">
                                <button type="submit" class="btn btn-primary w-100">Muat Naik</button>
                            </div>
                        </div>

                    </div>

                    {{-- KUPLI ENDS --}}
                </form>
            </div>
        </div>
    </div>
</div>
