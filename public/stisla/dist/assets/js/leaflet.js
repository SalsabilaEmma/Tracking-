
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
        provider: providerOSM,
        style: 'bar',
        searchLabel: 'Search',
    });

    leafletMap.addControl(search);

