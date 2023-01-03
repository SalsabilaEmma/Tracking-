<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <!-- Styles -->
    <style>
        :root {
            --color-primary: grey;
            /* --logo: url(https://s.cdpn.io/profiles/user/1490182/80.jpg?1538125571); */
        }

        .map {
            height: 100vh;
            min-height: 350px;
            position: relative;
        }

        .map .logo {
            mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 62.5 100'%3E%3Cpath d='M53.3 9.2A31.26 31.26 0 009.1 53.4s22.1 21.7 22.1 46.7c0-25 22.1-46.7 22.1-46.7 12.3-12.2 12.3-32 0-44.2zM31.2'/%3E%3C/svg%3E%0A");
            background-color: var(--color-primary);
            background-size: contain;
            background-repeat: no-repeat;
            position: relative;
        }

        .map .logo::before {
            box-sizing: border-box;
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            background-image: var(--logo);
            background-color: var(--color-primary);
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            border: 2px solid var(--color-primary);
        }

        .leaflet-popup-content {
            padding: 0.5rem;
            line-height: 1.8;
            position: relative;
            z-index: 1;
            min-width: 200px;
            font-size: 0.9rem;
            font-family: inherit;
        }

        .leaflet-popup-content h3 {
            margin: 0 0 0.5rem;
        }

        .leaflet-popup-content p {
            margin: 0;
        }

        .leaflet-popup-content .links {
            margin-top: 0.5rem;
        }

        .leaflet-popup-content a {
            color: var(--color-primary);
            padding-right: 1rem;
        }

        .leaflet-container a.leaflet-popup-close-button {
            padding: 0.8rem;
            z-index: 1;
        }
    </style>

    <!-- GEOSEARCH -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css" />
    <script src="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.umd.js"></script>

</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="map" id="map">
        </div>
    </div>
</body>

<script>
    const options = {
        coordinates: [-7.620871105192088, 111.52925235315845],
        name: "Dummy Judul",
        adress: "keterangan",
        postalCode: "keterangan 2",
        city: "keterangan 3 "
        // website: ["https://apk-demo.my.id/", "Apk Demo →"],
        // socialMedia: ["https://id.linkedin.com/in/faisal-dwiki-amrizal-56121b208", "Linkedin →"]
        //     <div class="links">
        //     <a href="${options.website[0]}">${options.website[1]}</a>
        //     <a href="${options.socialMedia[0]}">${options.socialMedia[1]}</a>
        //   </div>
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
    // var marker = L.marker([51.5, -0.09]).addTo(map);
    // marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();

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
        provider: new GeoSearch.OpenStreetMapProvider(),
    });

    map.addControl(search);
</script>

</html>
