<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ship Tracker</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styleassets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    
    <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('style/assets/js/main.js') }}"></script>

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href=""><img class="user-avatar rounded-circle" src="{{ asset('style/images/shiprack2.png') }}"></a>
                <a class="navbar-brand hidden" href="">SR</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href=""> <i class="menu-icon fa fa-dashboard"></i>Cek Resi</a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <div class="header-left">
                        {{-- <button class="search-trigger"><i class="fa fa-search"></i></button> --}}
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                        <div class="dropdown for-notification">
                          {{-- <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">3</span>
                          </button> --}}
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                            <img class="user-avatar rounded-circle" src="{{ asset('style/images/ship.png') }}">
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>
                            <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    {{-- <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-id"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-id"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-jp"></i>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>

        </header><!-- /header -->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Ship Tracker Application</h1>
                    </div>
                    
                </div>
               
            </div>
            {{-- <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><i class="fa fa-dashboard"></i></li>
                        </ol>
                    </div>
                </div>
            </div> --}}
        </div>

        

        <div class="content mt-3">
            <div class="animated fadeIn">
                @if($error)

                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                @endif
                
                <form method="POST" action="lacak">
                    @csrf
                    <label for="resi">Input Resi</label>
                    <input type="text" class="form-control" id="resi" name="no_resi" required placeholder="Masukkuan Nomor Resi ">
                    <br> 
                    <label for="kurir" name="kurir">Pilih Kurir</label>
                    <select class="form-control" name="kurir" tabindex="0" required >
                        <option default value="jne">JNE</option>
                        <option value="jnt">J&T</option>
                        <option value="pos">Pos Indonesia</option>
                        <option value="sicepat">Si Cepat</option>
                        <option value="tiki">Tiki</option>
                        <option value="anteraja">Anter Aja</option>
                        <option value="wahana">Wahana</option>
                        <option value="ninja">Ninja</option>
                        <option value="lion">Lion Parcel</option>
                    </select>
                    </div>
                    <div>
                    <br>
                    <div class="checkbox">
                    </div>
                    <button type="submit" class="btn btn-primary">Lacak</button>
                    <br><br>
                  </form>
            </div>
        </div>


        {{-- Data Result --}}

        @if ($data)
            <!--  -->
            <div class="content mt-3">
            <table class="table">
            <h4 style="margin:10px 0 0 0;">Detail</h4>
            <br>
            <tbody><tr>
                    <td width="130">No Resi</td>
                    <td>:</td>
                    <td><b>{{$data['summary']['awb']}}</b></td>
                    </tr>
                    <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>{{$data['summary']['status']}}</td>
                    </tr>
                    <tr>
                    <td>Service</td>
                    <td>:</td>
                    <td>{{$data['summary']['service']}}</td>
                    </tr>
                    <tr>
                    <td>Harga</td>
                    <td>:</td>
                    <td>Rp.{{$data['summary']['amount']}},--</td>
                    </tr>
                    <tr>
                    <td>Berat</td>
                    <td>:</td>
                    <td>{{$data['summary']['weight']}} gram</td>
                    </tr>
                    <tr>
                    <td valign="top">Pengirim </td>
                    <td valign="top">:</td>
                    <td valign="top">{{$data['detail']['shipper']}}<br></td>
                    </tr>
                    <tr>
                    <td valign="top">Alamat Asal </td>
                    <td valign="top">:</td>
                    <td valign="top">{{$data['detail']['origin']}}<br></td>
                    </tr>
                    <tr>
                    <td valign="top">Penerima</td>
                    <td valign="top">:</td>
                    <td valign="top">{{$data['detail']['receiver']}}<br></td>
                    </tr>
                    <tr>
                    <td valign="top">Alamat Tujuan</td>
                    <td valign="top">:</td>
                    <td valign="top">{{$data['detail']['destination']}}<br></td>
                    </tr>
                    </tbody></table><h4 style="margin:10px 0 0 0;">
                                </div>

                                <div class="content mt-2">
                    <h4 style="margin:10px 0 0 0;">History</h4>
                    <br>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="date">Tanggal</th>
                            <th scope="desc">Deskripsi</th>
                            <th scope="location">Lokasi</th>
                        </tr>
                        </thead>
                        @foreach ($data['history'] as $history)
                                <tr>
                                    <td>
                                        {{$history['date']}}
                                    </td>
                                    <td>
                                        {{$history['desc']}}
                                    </td>
                                    <td>
                                        {{$history['location']}}
                                    </td>
                                </tr>
                                @endforeach   
                        </table>
                    </div>
                </div>  
            </body>       
            @endif 