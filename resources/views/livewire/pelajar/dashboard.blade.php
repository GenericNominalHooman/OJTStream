@php
use Carbon\Carbon;
use App\Models\DokumenOJT;
@endphp
<div>
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-suitcase"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Status OJT</p>
                            <h4 class="mb-0"><x-pelajar.status-ojt :company="$pelajar_pelajar_company" ></x-pelajar.status-ojt></h4>
                         </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        @php
                            $ojt_begin_date = Carbon::parse($pelajar_pelajar_company->ojt_begin_date);
                            $ojt_end_date = Carbon::parse($pelajar_pelajar_company->ojt_end_date);
                            $current_time = Carbon::parse(now());
                        @endphp
                        @if ($current_time->gt($ojt_begin_date) && $current_time->gt($ojt_end_date))
                            {{-- TAMAT BEROJT --}}
                            <span class="d-block text-nowrap">Tamat OJT</span>
                        @elseif ($current_time->gt($ojt_begin_date) && $current_time->lt($ojt_end_date))
                            {{-- SEDANG BEROJT --}}
                            <span class="text-nowrap">{{$ojt_end_date->diffInDays()}}</span>
                            <span class="text-nowrap"> Hari Lagi Tamat OJT</span>
                        @else
                            {{-- BELUM BEROJT --}}
                            <span class="text-nowrap">{{$ojt_begin_date->diffInDays()}}</span>
                            <span class="text-nowrap"> Hari Lagi Mula OJT</span>
                        @endif
                </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-folder"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Dokumen KVOJT</p>
                            <h4 class="mb-0">{{$this->dokumen_ojt_pelajar_uploaded_all->count()}} / {{$this->dokumen_ojt_pelajar_all->count()}} Fail Dimuat Naik</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <a href="{{route('pelajar pengurusan dokumen')}}" class="mb-0"><i class="m-2 fas fa-eye"></i>Lihat Pengurusan Dokumen OJT</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-file"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Skop Kerja</p>
                            @if ($this->pelajar_skop_kerja)
                                <h4 class="mb-0 text text-success">Sudah Dimuat Naik</h4>
                            @else
                                <h4 class="mb-0 text text-danger">Belum Dimuat Naik</h4>
                            @endif
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <a href="{{route('user-profile',[
                            'active_tab' => 'organisasi'
                        ])}}" class="mb-0"><i class="m-2 fas fa-eye"></i>Lihat Pengurusan Skop Kerja</a>
                    </div>
                </div>
            </div>

            {{-- PENGUGUMAN(WIP) BEGIN --}}
            {{-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-secondary shadow-secondary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Penguguman(Belum Dibaca)</p>
                            <h4 class="mb-0"></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <a href="{{route("pelajar notifikasi")}}" class="mb-0"><i class="m-2 fas fa-eye"></i>Lihat Penguguman</a>
                    </div>
                </div>
            </div> --}}
            {{-- PENGUGUMAN(WIP) ENDS --}}

        </div>
        <div class="row mt-4">
        </div>
        <div class="row mb-4 d-flex justify-content-center align-items-center">
            <div class="col-lg-8 mb-md-0 mb-4">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h6>Proses OJT</h6>
                        <p class="text-sm">
                            <i class="fas fa-info" aria-hidden="true"></i>
                            <span class="m-3 font-weight-bold">Fasa-fasa OJT</span>
                        </p>
                    </div>
                    <div class="card-body p-3 d-flex justify-content-center">
                        <div class="timeline timeline-one-side">
                            <div class="timeline-block mb-3">
                                <span class="timeline-step">
                                    <i class="material-icons text-success text-gradient">notifications</i>
                                </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes
                                    </h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM
                                    </p>
                                </div>
                            </div>
                            <div class="timeline-block mb-3">
                                <span class="timeline-step">
                                    <i class="material-icons text-danger text-gradient">code</i>
                                </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM
                                    </p>
                                </div>
                            </div>
                            <div class="timeline-block mb-3">
                                <span class="timeline-step">
                                    <i class="material-icons text-info text-gradient">shopping_cart</i>
                                </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for
                                        April</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM
                                    </p>
                                </div>
                            </div>
                            <div class="timeline-block mb-3">
                                <span class="timeline-step">
                                    <i class="material-icons text-warning text-gradient">credit_card</i>
                                </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order
                                        #4395133</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM
                                    </p>
                                </div>
                            </div>
                            <div class="timeline-block mb-3">
                                <span class="timeline-step">
                                    <i class="material-icons text-primary text-gradient">key</i>
                                </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for
                                        development</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM
                                    </p>
                                </div>
                            </div>
                            <div class="timeline-block">
                                <span class="timeline-step">
                                    <i class="material-icons text-dark text-gradient">payments</i>
                                </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4 d-flex justify-content-center align-items-center">
            <div class="col-lg-8 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Dokumen Perlu Dimuat Naik(Minggu Ini)</h6>
                                <p class="text-sm mb-0">
                                    <i class="fas fa-file" aria-hidden="true"></i>
                                    <span class="font-weight-bold ms-1">{{$dokumen_ojt_pelajar_all_week->count()}}</span> dokumen perlu dimuat naik pada minggu ini
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        @if ($dokumen_ojt_pelajar_all_week->count())
                        <div class="table-responsive">
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
                                            Tarikh Hantar</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status Muat Naik</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Dihantar Pada</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($dokumen_ojt_pelajar_all_week as $dokumen_ojt_pelajar_row)
                                            @php
                                                $jenis = DokumenOJT::find($dokumen_ojt_pelajar_row->dokumen_ojt_id)->document_type;
                                            @endphp
                                            <x-pengurusan-dokumen.senarai-dokumen-pelajar :jenis="$jenis" :dokumen="$dokumen_ojt_pelajar_row" ></x-pengurusan-dokumen.senarai-dokumen-pelajar> 
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <p class="text text-muted p-4">Tiada dokumen OJT yang perlu dimuat naik pada minggu ini</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@push('js')
<script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
<script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

      new Chart(ctx, {
          type: "bar",
          data: {
              labels: ["M", "T", "W", "T", "F", "S", "S"],
              datasets: [{
                  label: "Sales",
                  tension: 0.4,
                  borderWidth: 0,
                  borderRadius: 4,
                  borderSkipped: false,
                  backgroundColor: "rgba(255, 255, 255, .8)",
                  data: [50, 20, 10, 22, 50, 10, 40],
                  maxBarThickness: 6
              }, ],
          },
          options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                  legend: {
                      display: false,
                  }
              },
              interaction: {
                  intersect: false,
                  mode: 'index',
              },
              scales: {
                  y: {
                      grid: {
                          drawBorder: false,
                          display: true,
                          drawOnChartArea: true,
                          drawTicks: false,
                          borderDash: [5, 5],
                          color: 'rgba(255, 255, 255, .2)'
                      },
                      ticks: {
                          suggestedMin: 0,
                          suggestedMax: 500,
                          beginAtZero: true,
                          padding: 10,
                          font: {
                              size: 14,
                              weight: 300,
                              family: "Roboto",
                              style: 'normal',
                              lineHeight: 2
                          },
                          color: "#fff"
                      },
                  },
                  x: {
                      grid: {
                          drawBorder: false,
                          display: true,
                          drawOnChartArea: true,
                          drawTicks: false,
                          borderDash: [5, 5],
                          color: 'rgba(255, 255, 255, .2)'
                      },
                      ticks: {
                          display: true,
                          color: '#f8f9fa',
                          padding: 10,
                          font: {
                              size: 14,
                              weight: 300,
                              family: "Roboto",
                              style: 'normal',
                              lineHeight: 2
                          },
                      }
                  },
              },
          },
      });


      var ctx2 = document.getElementById("chart-line").getContext("2d");

      new Chart(ctx2, {
          type: "line",
          data: {
              labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
              datasets: [{
                  label: "Mobile apps",
                  tension: 0,
                  borderWidth: 0,
                  pointRadius: 5,
                  pointBackgroundColor: "rgba(255, 255, 255, .8)",
                  pointBorderColor: "transparent",
                  borderColor: "rgba(255, 255, 255, .8)",
                  borderColor: "rgba(255, 255, 255, .8)",
                  borderWidth: 4,
                  backgroundColor: "transparent",
                  fill: true,
                  data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
                  maxBarThickness: 6

              }],
          },
          options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                  legend: {
                      display: false,
                  }
              },
              interaction: {
                  intersect: false,
                  mode: 'index',
              },
              scales: {
                  y: {
                      grid: {
                          drawBorder: false,
                          display: true,
                          drawOnChartArea: true,
                          drawTicks: false,
                          borderDash: [5, 5],
                          color: 'rgba(255, 255, 255, .2)'
                      },
                      ticks: {
                          display: true,
                          color: '#f8f9fa',
                          padding: 10,
                          font: {
                              size: 14,
                              weight: 300,
                              family: "Roboto",
                              style: 'normal',
                              lineHeight: 2
                          },
                      }
                  },
                  x: {
                      grid: {
                          drawBorder: false,
                          display: false,
                          drawOnChartArea: false,
                          drawTicks: false,
                          borderDash: [5, 5]
                      },
                      ticks: {
                          display: true,
                          color: '#f8f9fa',
                          padding: 10,
                          font: {
                              size: 14,
                              weight: 300,
                              family: "Roboto",
                              style: 'normal',
                              lineHeight: 2
                          },
                      }
                  },
              },
          },
      });

      var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

      new Chart(ctx3, {
          type: "line",
          data: {
              labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
              datasets: [{
                  label: "Mobile apps",
                  tension: 0,
                  borderWidth: 0,
                  pointRadius: 5,
                  pointBackgroundColor: "rgba(255, 255, 255, .8)",
                  pointBorderColor: "transparent",
                  borderColor: "rgba(255, 255, 255, .8)",
                  borderWidth: 4,
                  backgroundColor: "transparent",
                  fill: true,
                  data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                  maxBarThickness: 6

              }],
          },
          options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                  legend: {
                      display: false,
                  }
              },
              interaction: {
                  intersect: false,
                  mode: 'index',
              },
              scales: {
                  y: {
                      grid: {
                          drawBorder: false,
                          display: true,
                          drawOnChartArea: true,
                          drawTicks: false,
                          borderDash: [5, 5],
                          color: 'rgba(255, 255, 255, .2)'
                      },
                      ticks: {
                          display: true,
                          padding: 10,
                          color: '#f8f9fa',
                          font: {
                              size: 14,
                              weight: 300,
                              family: "Roboto",
                              style: 'normal',
                              lineHeight: 2
                          },
                      }
                  },
                  x: {
                      grid: {
                          drawBorder: false,
                          display: false,
                          drawOnChartArea: false,
                          drawTicks: false,
                          borderDash: [5, 5]
                      },
                      ticks: {
                          display: true,
                          color: '#f8f9fa',
                          padding: 10,
                          font: {
                              size: 14,
                              weight: 300,
                              family: "Roboto",
                              style: 'normal',
                              lineHeight: 2
                          },
                      }
                  },
              },
          },
      });

</script>
@endpush