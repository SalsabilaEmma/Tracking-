<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Tracking</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="{{ url('stisla/dist') }}/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ url('stisla/dist') }}/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- jQuery CDN -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>

    <!-- Leaflet CSS-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/css/leaflet.css">
    <!-- Leaflet Geosearch CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css" />

    @section('css')
    @show
    @yield('css')
    <!-- /END GA -->
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>

            @include('layout.header')
            @yield('content')
            @include('layout.footer')

        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ url('stisla/dist') }}/assets/modules/jquery.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/popper.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/tooltip.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/moment.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    <script src="{{ url('stisla/dist') }}/assets/modules/datatables/datatables.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="{{ url('stisla/dist') }}/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/jquery-ui/jquery-ui.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/js/page/modules-datatables.js"></script>

    <!-- Template JS File -->
    <script src="{{ url('stisla/dist') }}/assets/js/scripts.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/js/custom.js"></script>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    {{-- <script src="{{ url('stisla/dist') }}/assets/js/leaflet.js"></script> --}}
    <!-- Leaflet Geosearch JS -->
    <script src="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.umd.js"></script>

    {{-- <script>
        const options = {
            coordinates: [-7.620871105192088, 111.52925235315845],
            name: "Dummy Judul",
            adress: "keterangan",
            postalCode: "keterangan 2",
            city: "keterangan 3 "
        }

        // Defining the map
        let map = L.map("map", {
            center: options.coordinates,
            zoom: 9,
            scrollWheelZoom: true
        });

        // Basemap config
        // L.tileLayer("https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png", {
        //     attribution: 'Map tiles by <a href="http://cartodb.com/attributions#basemaps">CartoDB</a> | Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        // }).addTo(map);
        L.tileLayer("https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png", {
            attribution: 'Marstech'
        }).addTo(map);

        // Setting the company logo as a custom icon
        let myIcon = L.divIcon({
            className: "logo",
            iconSize: [45, 72],
            iconAnchor: [22.5, 72],
            popupAnchor: [0, -72]
        });

        // adding the marker
        L.marker(options.coordinates, {
                icon: myIcon
            })
            .addTo(map)
            .bindPopup(
                L.popup({}).setContent(
                    `<h3>${options.name}</h3>
      <p>${options.adress}</p>
      <p>${options.postalCode}, ${options.city}</p>
      `
                )
            )
            .openPopup();

        // adding marker original
        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent(e.latlng.toString())
                .openOn(map);
        }

        map.on('click', onMapClick);

        // geosearch
        const providerOSM = new GeoSearch.OpenStreetMapProvider();
        const search = new GeoSearch.GeoSearchControl({
            provider: providerOSM,
            style: 'bar',
            searchLabel: 'Search',
        });

        leafletMap.addControl(search);
    </script> --}}

@show
@yield('js')
</body>

</html>
