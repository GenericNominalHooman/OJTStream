
            <div class="container my-auto mt-5">
                <div class="row signin-margin">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom mt-6">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                                    <div class="row mt-3">
                                        <h6 class='text-white text-center'>
                                            <span class="font-weight-normal">Nombor Matrik:</span> AKV0222KA009
                                            <br>
                                            <span class="font-weight-normal">Kata laluan:</span> password</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent='store'>
                                    {{-- {{dd(session());}} --}}
                                    @if (session('status'))
                                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ session('status') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    <div class="input-group input-group-outline mt-3 @if(strlen($no_matrik ?? '') > 0) is-filled @endif">
                                        <label class="form-label">Nombor Matrik</label>
                                        <input wire:model='no_matrik' type="text" class="form-control">
                                    </div>
                                    @error('no_matrik')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror

                                    <div class="input-group input-group-outline mt-3 @if(strlen($password ?? '') > 0) is-filled @endif">
                                        <label class="form-label">Password</label>
                                        <input wire:model="password" type="password" class="form-control"
                                             >
                                    </div>
                                    @error('password')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                    <div class="form-check form-switch d-flex align-items-center my-3">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember
                                            me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign
                                            in</button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        Anda tidak mempunyai akaun?
                                        <a href="{{ route('register') }}"
                                            class="text-primary text-gradient font-weight-bold">Daftar Masuk</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>