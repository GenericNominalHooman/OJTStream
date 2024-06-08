<div>
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Senarai Pelajar</h6>
                        </div>
                    </div>
        
                    <div class="card-body px-0 pb-2">
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

                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-2 ps-4">
                                <a type="button" class="btn btn-primary w-100" href="{{route('kupli tambah pelajar')}}">+ TAMBAH PELAJAR</a>
                            </div>
                            <div class="col-12 col-sm-4 col-md-2 ps-4">
                                <input class="form-control w-100 border border-secondary p-2" type="text" wire:model="search" wire:model.debounce.500ms placeholder="Cari nama...">
                                {{-- <input type="text" wire:model="search" wire:model.debounce.500ms class="form-control w-100 border border-secondary p-2" placeholder="Cari nama..."></input> --}}
                            </div>
                        </div>
                        {{-- TABLE BEGIN --}}

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            BIL</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kad Matrik</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nombor Kad Pengenalan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Program</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status OJT</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pelajars->count())
                                        @foreach ($pelajars as $pelajar)
                                            <x-kupli.senarai-pelajar :iteration="$loop->iteration" :pelajar="$pelajar"></x-kupli.senarai-pelajar> 
                                        @endforeach
                                    @else
                                        X DKOUMEN OJT
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        {{-- TABLE END --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>