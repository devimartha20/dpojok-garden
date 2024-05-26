@extends('layouts.main.layout')
@section('title')
    Dashboard
@endsection
@section('styles')

@endsection
@section('content')
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Online</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>486</span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Offline</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>486</span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Produk Terjual</h6>
                <h2 class="text-right"><i class="ti-tag f-left"></i><span>1641</span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-yellow order-card">
            <div class="card-block">
                <h6 class="m-b-20">Total Pendapatan</h6>
                <h2 class="text-right"><i class="ti-reload f-left"></i><span>Rp. 12.000.000</span></h2>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Grafik Kinerja Karyawan</h5>
                <p></p>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-times close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <canvas id="Statistics-chart" height="200"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Grafik Pemesanan</h5>
            </div>
            <div class="card-block">
                <span class="d-block text-c-blue f-24 f-w-600 text-center">365247</span>
                <canvas id="feedback-chart" height="100"></canvas>
                <div class="row justify-content-center m-t-15">
                    <div class="col-auto b-r-default m-t-5 m-b-5">
                        <h4>83%</h4>
                        <p class="text-success m-b-0"><i class="ti-hand-point-up m-r-5"></i>Online</p>
                    </div>
                    <div class="col-auto m-t-5 m-b-5">
                        <h4>17%</h4>
                        <p class="text-danger m-b-0"><i class="ti-hand-point-down m-r-5"></i>Offline</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col=md-12">
        <div class="card">
            <div class="card-header">
                <h5>Grafik Kinerja Karyawan</h5>
                <span></span>
                <div class="card-header-right">                                                             <i class="icofont icofont-spinner-alt-5"></i>                                                         </div>
            </div>
            <div class="card-block">
                <div id="morris-extra-area" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="353.333" version="1.1" width="299.417" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; top: -0.71875px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="32.53125" y="320.6566660308838" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="3.9999782943725677" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#5fbeaa" d="M45.03125,320.6566660308838H274.417" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.53125" y="246.74249952316285" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="3.999996356964118" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">50</tspan></text><path fill="none" stroke="#5fbeaa" d="M45.03125,246.74249952316285H274.417" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.53125" y="172.8283330154419" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="3.999999160766606" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">100</tspan></text><path fill="none" stroke="#5fbeaa" d="M45.03125,172.8283330154419H274.417" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.53125" y="98.91416650772095" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.000001964569094" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">150</tspan></text><path fill="none" stroke="#5fbeaa" d="M45.03125,98.91416650772095H274.417" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.53125" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="3.9999990463256836" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">200</tspan></text><path fill="none" stroke="#5fbeaa" d="M45.03125,25H274.417" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="274.417" y="333.1566660308838" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6667)"><tspan dy="3.9999782943725677" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2016</tspan></text><text x="197.9899815152898" y="333.1566660308838" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6667)"><tspan dy="3.9999782943725677" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2014</tspan></text><text x="121.45826848471017" y="333.1566660308838" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6667)"><tspan dy="3.9999782943725677" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><text x="45.03125" y="333.1566660308838" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6667)"><tspan dy="3.9999782943725677" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010</tspan></text><path fill="#fad0c3" stroke="none" d="M45.03125,320.6566660308838C54.58462731058877,302.1781244039536,73.69138193176632,250.4382078485489,83.24475924235509,246.74249952316285C92.79813655294386,243.0467911977768,111.9048911741214,292.9363257462166,121.45826848471017,291.0909994277954C131.0378194317663,289.2406174208306,150.19692132587858,233.81004822858347,159.7764722729347,231.95966622161865C169.32984958352347,230.11433990319745,188.43660420470104,269.84067655682566,197.9899815152898,276.30816612625125C207.54335882587856,282.77565569567685,226.65011344705613,280.00387445163733,236.2034907576449,283.69958277702335C245.75686806823364,287.3952911024094,264.8636226894112,300.33027024126056,274.417,305.8738327293396L274.417,320.6566660308838L45.03125,320.6566660308838Z" fill-opacity="0.8" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.8;"></path><path fill="none" stroke="#fb9678" d="M45.03125,320.6566660308838C54.58462731058877,302.1781244039536,73.69138193176632,250.4382078485489,83.24475924235509,246.74249952316285C92.79813655294386,243.0467911977768,111.9048911741214,292.9363257462166,121.45826848471017,291.0909994277954C131.0378194317663,289.2406174208306,150.19692132587858,233.81004822858347,159.7764722729347,231.95966622161865C169.32984958352347,230.11433990319745,188.43660420470104,269.84067655682566,197.9899815152898,276.30816612625125C207.54335882587856,282.77565569567685,226.65011344705613,280.00387445163733,236.2034907576449,283.69958277702335C245.75686806823364,287.3952911024094,264.8636226894112,300.33027024126056,274.417,305.8738327293396" stroke-width="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="45.03125" cy="320.6566660308838" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="83.24475924235509" cy="246.74249952316285" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="121.45826848471017" cy="291.0909994277954" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="159.7764722729347" cy="231.95966622161865" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="197.9899815152898" cy="276.30816612625125" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="236.2034907576449" cy="283.69958277702335" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="274.417" cy="305.8738327293396" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#afb1db" stroke="none" d="M45.03125,320.6566660308838C54.58462731058877,315.1131035428047,73.69138193176632,307.7216868920326,83.24475924235509,298.4824160785675C92.79813655294386,289.2431452651024,111.9048911741214,246.18890162763648,121.45826848471017,246.74249952316285C131.0378194317663,247.2976141252523,150.19692132587858,297.3661200481362,159.7764722729347,302.91726606903075C169.32984958352347,308.4532450242944,188.43660420470104,303.656407734108,197.9899815152898,291.0909994277954C207.54335882587856,278.5255911214828,226.65011344705613,200.5461454558373,236.2034907576449,202.3939996185303C245.75686806823364,204.2418537812233,264.8636226894112,280.0038744516373,274.417,305.8738327293396L274.417,320.6566660308838L45.03125,320.6566660308838Z" fill-opacity="0.8" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.8;"></path><path fill="none" stroke="#7e81cb" d="M45.03125,320.6566660308838C54.58462731058877,315.1131035428047,73.69138193176632,307.7216868920326,83.24475924235509,298.4824160785675C92.79813655294386,289.2431452651024,111.9048911741214,246.18890162763648,121.45826848471017,246.74249952316285C131.0378194317663,247.2976141252523,150.19692132587858,297.3661200481362,159.7764722729347,302.91726606903075C169.32984958352347,308.4532450242944,188.43660420470104,303.656407734108,197.9899815152898,291.0909994277954C207.54335882587856,278.5255911214828,226.65011344705613,200.5461454558373,236.2034907576449,202.3939996185303C245.75686806823364,204.2418537812233,264.8636226894112,280.0038744516373,274.417,305.8738327293396" stroke-width="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="45.03125" cy="320.6566660308838" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="83.24475924235509" cy="298.4824160785675" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="121.45826848471017" cy="246.74249952316285" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="159.7764722729347" cy="302.91726606903075" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="197.9899815152898" cy="291.0909994277954" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="236.2034907576449" cy="202.3939996185303" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="274.417" cy="305.8738327293396" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#0ddbe4" stroke="none" d="M45.03125,320.6566660308838C54.58462731058877,318.8088118681908,73.69138193176632,320.6566660308838,83.24475924235509,313.2652493801117C92.79813655294386,301.25419732260707,111.9048911741214,224.93731483453078,121.45826848471017,224.56824957084655C131.0378194317663,224.19817316945358,150.19692132587858,320.48578375810945,159.7764722729347,310.30868271980285C169.32984958352347,300.15938796848616,188.43660420470104,149.3605851492405,197.9899815152898,143.26266641235352C207.54335882587856,137.16474767546654,226.65011344705613,241.1989370350838,236.2034907576449,261.52533282470705C245.75686806823364,281.85172861433034,264.8636226894112,294.7867077531815,274.417,305.8738327293396L274.417,320.6566660308838L45.03125,320.6566660308838Z" fill-opacity="0.8" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.8;"></path><path fill="none" stroke="#01c0c8" d="M45.03125,320.6566660308838C54.58462731058877,318.8088118681908,73.69138193176632,320.6566660308838,83.24475924235509,313.2652493801117C92.79813655294386,301.25419732260707,111.9048911741214,224.93731483453078,121.45826848471017,224.56824957084655C131.0378194317663,224.19817316945358,150.19692132587858,320.48578375810945,159.7764722729347,310.30868271980285C169.32984958352347,300.15938796848616,188.43660420470104,149.3605851492405,197.9899815152898,143.26266641235352C207.54335882587856,137.16474767546654,226.65011344705613,241.1989370350838,236.2034907576449,261.52533282470705C245.75686806823364,281.85172861433034,264.8636226894112,294.7867077531815,274.417,305.8738327293396" stroke-width="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="45.03125" cy="320.6566660308838" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="83.24475924235509" cy="313.2652493801117" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="121.45826848471017" cy="224.56824957084655" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="159.7764722729347" cy="310.30868271980285" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="197.9899815152898" cy="143.26266641235352" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="236.2034907576449" cy="261.52533282470705" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="274.417" cy="305.8738327293396" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 71.4583px; top: 92px; display: none;"><div class="morris-hover-row-label">2012</div><div class="morris-hover-point" style="color: #fb9678">
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
</div>
@endsection
@section('scripts')

@endsection
