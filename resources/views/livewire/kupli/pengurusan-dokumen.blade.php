<div>
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Pengurusan Dokumen OJT</h6>
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

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Dokumen OJT</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jenis Dokumen(Pengisian/Infomasi)</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Dikemaskini Pada</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($dokumen_ojts->count())
                                        @foreach ($dokumen_ojts as $dokumen_ojt)
                                            <x-kupli.senarai-pengurusan-dokumen :dokumen="$dokumen_ojt"></x-kupli.senarai-pengurusan-dokumen> 
                                        @endforeach
                                    @else
                                        X DKOUMEN OJT
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="w-100 container d-flex justify-content-center align-items-center">
                            <a class="btn btn-primary w-100" href="{{route('kupli penyuntingan dokumen tambah')}}">+ Tambah Dokumen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>