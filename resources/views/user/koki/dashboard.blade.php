@extends('layouts.main.layout')
@section('title')
    Dashboard
@endsection
@section('styles')
@endsection
@section('content')
<div class="row">
    <!-- Order cards start -->
    <div class="col-md-5 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Masuk</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>50</span></h2>
                {{-- <p class="m-b-0">Pesanan Diterima<span class="f-right">351</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-5 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Diproses</h6>
                <h2 class="text-right"><i class="ti-tag f-left"></i><span>11</span></h2>
                {{-- <p class="m-b-0">Bulan Ini<span class="f-right">213</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-5 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Selesai</h6>
                <h2 class="text-right"><i class="ti-tag f-left"></i><span>11</span></h2>
                {{-- <p class="m-b-0">Bulan Ini<span class="f-right">213</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-5 col-xl-3">
        <div class="card bg-c-yellow order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Diterima</h6>
                <h2 class="text-right"><i class="ti-reload f-left"></i><span>20</span></h2>
                {{-- <p class="m-b-0">Bulan Ini<span class="f-right">Rp.1.200.000</span></p> --}}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5>Extra area chart</h5>
                <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                <div class="card-header-right">                                                             <i class="icofont icofont-spinner-alt-5"></i>                                                         </div>
            </div>
            <div class="card-block">
                <div id="morris-extra-area" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="500.000" version="1.1" width="300.000" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; top: -0.71875px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="32.53125" y="354.6246660308838" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="3.9999912338257104" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#5fbeaa" d="M45.03125,354.6246660308838H274.417" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.53125" y="272.21849952316285" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="3.9999831733703672" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">50</tspan></text><path fill="none" stroke="#5fbeaa" d="M45.03125,272.21849952316285H274.417" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.53125" y="189.8123330154419" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="3.999990371704115" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">100</tspan></text><path fill="none" stroke="#5fbeaa" d="M45.03125,189.8123330154419H274.417" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.53125" y="107.40616650772094" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="3.9999975700378343" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">150</tspan></text><path fill="none" stroke="#5fbeaa" d="M45.03125,107.40616650772094H274.417" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.53125" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="3.9999990463256836" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">200</tspan></text><path fill="none" stroke="#5fbeaa" d="M45.03125,25H274.417" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="274.417" y="367.1246660308838" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6667)"><tspan dy="3.9999912338257104" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2016</tspan></text><text x="197.9899815152898" y="367.1246660308838" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6667)"><tspan dy="3.9999912338257104" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2014</tspan></text><text x="121.45826848471017" y="367.1246660308838" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6667)"><tspan dy="3.9999912338257104" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><text x="45.03125" y="367.1246660308838" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6667)"><tspan dy="3.9999912338257104" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010</tspan></text><path fill="#fad0c3" stroke="none" d="M45.03125,354.6246660308838C54.58462731058877,334.0231244039536,73.69138193176632,276.33880784854887,83.24475924235509,272.21849952316285C92.79813655294386,268.0981911977768,111.9048911741214,323.71953532214,121.45826848471017,321.66219942779543C131.0378194317663,319.599226996754,150.19692132587858,257.8002386526601,159.7764722729347,255.73726622161865C169.32984958352347,253.67993032727404,188.43660420470104,297.97042655682566,197.9899815152898,305.18096612625123C207.54335882587856,312.3915056956768,226.65011344705613,309.30127445163725,236.2034907576449,313.42158277702333C245.75686806823364,317.5418911024094,264.8636226894112,331.96297024126056,274.417,338.1434327293396L274.417,354.6246660308838L45.03125,354.6246660308838Z" fill-opacity="0.8" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.8;"></path><path fill="none" stroke="#fb9678" d="M45.03125,354.6246660308838C54.58462731058877,334.0231244039536,73.69138193176632,276.33880784854887,83.24475924235509,272.21849952316285C92.79813655294386,268.0981911977768,111.9048911741214,323.71953532214,121.45826848471017,321.66219942779543C131.0378194317663,319.599226996754,150.19692132587858,257.8002386526601,159.7764722729347,255.73726622161865C169.32984958352347,253.67993032727404,188.43660420470104,297.97042655682566,197.9899815152898,305.18096612625123C207.54335882587856,312.3915056956768,226.65011344705613,309.30127445163725,236.2034907576449,313.42158277702333C245.75686806823364,317.5418911024094,264.8636226894112,331.96297024126056,274.417,338.1434327293396" stroke-width="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="45.03125" cy="354.6246660308838" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="83.24475924235509" cy="272.21849952316285" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="121.45826848471017" cy="321.66219942779543" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="159.7764722729347" cy="255.73726622161865" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="197.9899815152898" cy="305.18096612625123" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="236.2034907576449" cy="313.42158277702333" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="274.417" cy="338.1434327293396" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#afb1db" stroke="none" d="M45.03125,354.6246660308838C54.58462731058877,348.44420354280476,73.69138193176632,340.20358689203266,83.24475924235509,329.9028160785675C92.79813655294386,319.6020452651024,111.9048911741214,271.60129875485944,121.45826848471017,272.21849952316285C131.0378194317663,272.8373912524753,150.19692132587858,328.65826877590644,159.7764722729347,334.8471860690308C169.32984958352347,341.0191937520646,188.43660420470104,335.67124773410796,197.9899815152898,321.66219942779543C207.54335882587856,307.6531511214829,226.65011344705613,220.71464545583729,236.2034907576449,222.7747996185303C245.75686806823364,224.8349537812233,264.8636226894112,309.3012744516373,274.417,338.1434327293396L274.417,354.6246660308838L45.03125,354.6246660308838Z" fill-opacity="0.8" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.8;"></path><path fill="none" stroke="#7e81cb" d="M45.03125,354.6246660308838C54.58462731058877,348.44420354280476,73.69138193176632,340.20358689203266,83.24475924235509,329.9028160785675C92.79813655294386,319.6020452651024,111.9048911741214,271.60129875485944,121.45826848471017,272.21849952316285C131.0378194317663,272.8373912524753,150.19692132587858,328.65826877590644,159.7764722729347,334.8471860690308C169.32984958352347,341.0191937520646,188.43660420470104,335.67124773410796,197.9899815152898,321.66219942779543C207.54335882587856,307.6531511214829,226.65011344705613,220.71464545583729,236.2034907576449,222.7747996185303C245.75686806823364,224.8349537812233,264.8636226894112,309.3012744516373,274.417,338.1434327293396" stroke-width="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="45.03125" cy="354.6246660308838" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="83.24475924235509" cy="329.9028160785675" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="121.45826848471017" cy="272.21849952316285" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="159.7764722729347" cy="334.8471860690308" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="197.9899815152898" cy="321.66219942779543" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="236.2034907576449" cy="222.7747996185303" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="274.417" cy="338.1434327293396" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#0ddbe4" stroke="none" d="M45.03125,354.6246660308838C54.58462731058877,352.5645118681908,73.69138193176632,354.6246660308838,83.24475924235509,346.3840493801117C92.79813655294386,332.9930473226071,111.9048911741214,247.90811674971548,121.45826848471017,247.49664957084656C131.0378194317663,247.08405508463827,150.19692132587858,354.4341510905308,159.7764722729347,343.0878027198029C169.32984958352347,331.77245530090755,188.43660420470104,163.6483751492405,197.9899815152898,156.84986641235352C207.54335882587856,150.05135767546653,226.65011344705613,266.0380370350838,236.2034907576449,288.69973282470704C245.75686806823364,311.3614286143303,264.8636226894112,325.78250775318145,274.417,338.1434327293396L274.417,354.6246660308838L45.03125,354.6246660308838Z" fill-opacity="0.8" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.8;"></path><path fill="none" stroke="#01c0c8" d="M45.03125,354.6246660308838C54.58462731058877,352.5645118681908,73.69138193176632,354.6246660308838,83.24475924235509,346.3840493801117C92.79813655294386,332.9930473226071,111.9048911741214,247.90811674971548,121.45826848471017,247.49664957084656C131.0378194317663,247.08405508463827,150.19692132587858,354.4341510905308,159.7764722729347,343.0878027198029C169.32984958352347,331.77245530090755,188.43660420470104,163.6483751492405,197.9899815152898,156.84986641235352C207.54335882587856,150.05135767546653,226.65011344705613,266.0380370350838,236.2034907576449,288.69973282470704C245.75686806823364,311.3614286143303,264.8636226894112,325.78250775318145,274.417,338.1434327293396" stroke-width="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="45.03125" cy="354.6246660308838" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="83.24475924235509" cy="346.3840493801117" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="121.45826848471017" cy="247.49664957084656" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="159.7764722729347" cy="343.0878027198029" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="197.9899815152898" cy="156.84986641235352" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="236.2034907576449" cy="288.69973282470704" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="274.417" cy="338.1434327293396" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 256.263px; top: 113px; display: none;"><div class="morris-hover-row-label">2012</div><div class="morris-hover-point" style="color: #fb9678">
Site A:
20
</div><div class="morris-hover-point" style="color: #7E81CB">
Site B:
50
</div><div class="morris-hover-point" style="color: #01C0C8">
Site C:
65
</div></div></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6">
        <div class="card tabs-card">
            <div class="card-block p-0">
                <div class="card-header">
                    <h5>Pesanan Masuk</h5>
                </div>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="home3" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Pelanggan</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Jumlah Harga</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Spagetti</td>
                                        <td>2</td>
                                        <td>Dodi</td>
                                        <td>06-05-2024</td>
                                        <td>Rp. 30.000</td>
                                        <td><span class="label label-danger">Menunggu</span></td>
                                    </tr>
                                    <tr>
                                        <td>Spagetti</td>
                                        <td>2</td>
                                        <td>Dodi</td>
                                        <td>06-05-2024</td>
                                        <td>Rp. 30.000</td>
                                        <td><span class="label label-danger">Menunggu</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card tabs-card">
            <div class="card-block p-0">
                <div class="card-header">
                    <h5>Semua Pesanan</h5>
                </div>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="home3" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Pelanggan</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Jumlah Harga</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Spagetti</td>
                                        <td>2</td>
                                        <td>Dodi</td>
                                        <td>06-05-2024</td>
                                        <td>Rp. 30.000</td>
                                        <td><span class="label label-primary">Selesai</span></td>
                                    </tr>
                                    <tr>
                                        <td>Cireng</td>
                                        <td>3</td>
                                        <td>Ani</td>
                                        <td>07-05-2024</td>
                                        <td>Rp. 45.000</td>
                                        <td><span class="label label-success">Diterima</span></td>
                                    </tr>
                                    <tr>
                                        <td>Bakso</td>
                                        <td>1</td>
                                        <td>Budi</td>
                                        <td>08-05-2024</td>
                                        <td>Rp. 20.000</td>
                                        <td><span class="label label-warning">Diproses</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
