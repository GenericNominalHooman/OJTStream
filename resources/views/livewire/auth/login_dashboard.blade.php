
            <div class="container my-auto mt-8">
                <div class="row signin-margin">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Log Masuk</h4>
                                </div>
                            </div>
                            <div class="card-body container">
                                @if (Session::has('status'))
                                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                    <span class="text-sm">{{ Session::get('status') }}</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                                        data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                
                                <div class="d-grid gap-2">
                                    {{-- <a href="{{route('login', ['login_type'=>'kupli'])}}" class="btn btn-outline-secondary" type="button">Pensyarah</a>
                                    <a href="{{route('login', ['login_type'=>'pelajar'])}}" class="btn btn-outline-secondary" type="button">Pelajar</a> --}}
                                    <a href="{{route('login', ['login_type'=>'streamlined'])}}" class="btn btn-outline-secondary" type="button">Log Masuk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>