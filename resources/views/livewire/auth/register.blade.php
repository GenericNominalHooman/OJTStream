

        <main class="main-content  mt-0">
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row">
                            <div
                                class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                                <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                                    style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
                                </div>
                            </div>
                            <div
                                class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                                <div class="card card-plain mt-8">
                                    <div class="card-header">
                                        <h4 class="font-weight-bolder">Daftar Pelajar</h4>
                                        <p class="mb-0">Masukkan nama, email, nombor matrik dan kata laluan anda</p>
                                    </div>
                                    <div class="card-body">
                                        <form wire:submit.prevent ="store">

                                            <div class="input-group input-group-outline @if(strlen($username?? '') > 0) is-filled @endif">
                                                <label class="form-label">Nama Pengguna</label>
                                                <input wire:model="username" type="text" class="form-control">
                                            </div>
                                            @error('username')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                            
                                            <div class="input-group input-group-outline mt-3 @if(strlen($name?? '') > 0) is-filled @endif">
                                                <label class="form-label">Nama</label>
                                                <input wire:model="name" type="text" class="form-control" 
                                                >
                                            </div>
                                            @error('name')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror

                                            <div class="input-group input-group-outline mt-3 @if(strlen($email ?? '') > 0) is-filled @endif">
                                                <label class="form-label">Email</label>
                                                <input wire:model="email" type="email"  class="form-control"
                                                     >
                                            </div>
                                            @error('email')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror

                                            <div class="input-group input-group-outline mt-3 @if(strlen($no_matrik ?? '') > 0) is-filled @endif">
                                                <label class="form-label">Nombor Matrik</label>
                                                <input wire:model="no_matrik" type="text"  class="form-control"
                                                     >
                                            </div>
                                            @error('no_matrik')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror

                                            <div class="input-group input-group-outline mt-3 @if(strlen($password ?? '') > 0) is-filled @endif">
                                                <label class="form-label">Kata Laluan</label>
                                                <input wire:model="password" type="password" class="form-control" >
                                            </div>
                                            @error('password')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                            <div class="form-check form-check-info text-start ps-0 mt-3">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault" checked>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Saya setuju kepada <a href="javascript:;"
                                                        class="text-dark font-weight-bolder">Terma Dan Syarat</a>
                                                </label>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit"
                                                    class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Daftar Masuk</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-2 text-sm mx-auto">
                                            Anda sudah mempunyai akaun?
                                            <a href="{{ route('login') }}"
                                                class="text-primary text-gradient font-weight-bold">Log masuk</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>