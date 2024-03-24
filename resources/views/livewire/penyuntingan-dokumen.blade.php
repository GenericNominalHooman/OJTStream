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
                <i class="fas fa-file" style="font-size: 3em; padding-left: 0.5em;"></i>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ pathinfo($dokumenOJT->document_name, PATHINFO_FILENAME) }}
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
                        <div class="h-100">
                            <h6 class="mb-1">
                                Dokumen OJT
                            </h6>
                            <p class="mb-0 font-weight-normal text-sm">
                                Dikemaskini pada: {{Carbon::parse($dokumenOJT->updated_at)->format("d/m/Y - h:iA")}}
                            </p>
                        </div>
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
                {{-- PELAJAR BEGIN --}}

                <div class="row">

                    <div class="mb-3 col-12">
                        <button wire:click='downloadKVOJT()' class="btn btn-success w-100">Muat Turun
                            {{pathinfo($dokumenOJT->document_name, PATHINFO_FILENAME)}}</button>
                    </div>

                    <div class="mb-3 col-12">
                        <div class="row"></div>
                    </div>
                    
                </div>
                <div class="row">

                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <div class="h-100">
                                <h6 class="mb-1">
                                    Dokumen OJT Anda
                                </h6>
                                @if ($pelajarHasUploadKVOJT) 
                                {{-- PELAJAR HAS UPLOAD KVOJT --}}
                                    <p class="mb-0 font-weight-normal text-sm text-success">
                                        Status muat naik: <b>Sudah dimuat naik</b>
                                    </p>
                                    <p class="mb-0 font-weight-normal text-sm text-success">
                                        Dikemaskini pada: {{Carbon::parse($dokumenOJTPelajar->updated_at)->format("d/m/Y - h:iA")}}
                                    </p>
                                @else
                                {{-- PELAJAR HASNT UPLOAD KVOJT --}}
                                    <p class="mb-0 font-weight-normal text-sm text-danger">
                                        Status muat naik: <b>Belum dimuat naik</b>
                                    </p>
                                    <p class="mb-0 font-weight-normal text-sm text-danger">
                                        Tarikh hantar: {{Carbon::parse($dokumenOJTPelajar->deadline_date)->format("d/m/Y - h:iA")}}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>    

                    
                    <form wire:submit.prevent="uploadKVOJT()" class="p-0 m-0">
                        <div class="row col-12 container">
                            <div class="mb-3 col-md-6">
                                <button type="button" wire:click='downloadKVOJTPelajar()' class="btn btn-success w-100" @if (!$pelajarHasUploadKVOJT) disabled @endif>Muat Turun {{pathinfo($dokumenOJT->document_name, PATHINFO_FILENAME)}} Anda</button>
                            </div>
    
                            <div class="mb-3 col-md-6">
                                <button type="submit" class="btn btn-primary w-100" @if($kvojt_input == null) disabled @endif>Muat Naik {{pathinfo($dokumenOJT->document_name, PATHINFO_FILENAME)}}</button>
                            </div>
                        </div>

                        <div class="row">

                            <input wire:model.lazy="kvojt_input" type="file" placeholder="Fail {{$dokumenOJT->document_name}} anda..." class="form-control border border-2 p-2">
                            @error('kvojt_input')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                    </form>

                    <div class="mb-3 col-12">
                        <div class="row"></div>
                    </div>
                    
                </div>

                {{-- PELAJAR ENDS --}}

            </div>
        </div>
    </div>
</div>
@endif
{{-- PELAJAR SECTION ENDS --}}