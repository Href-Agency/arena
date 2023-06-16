const map = (() => {

    if($('#map').length){

        var mapboxgl = require('mapbox-gl/dist/mapbox-gl.js');

        const geojson = {
            'type': 'FeatureCollection',
            'features': [
                {
                    'type': 'Feature',
                    'properties': {
                        'message': 'Arena',
                        'iconSize': [40, 59]
                    },
                    'geometry': {
                        'type': 'Point',
                        'coordinates': [-2.539580, 53.591770]
                    }
                }
            ]
            };

        mapboxgl.accessToken = 'pk.eyJ1IjoicmFkZWstZGV2IiwiYSI6ImNsaXhza3RpODA2d3QzamxyM3g1amtmNWoifQ.FhWZgj_EFJtffV8qaJukOA';

        var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/radek-dev/clixtbvgd007z01pb643r38z8',
        center: [-2.539580, 53.591770],
        zoom: 17
        });

        map.scrollZoom.disable();
        map.addControl(new mapboxgl.NavigationControl());

        for (const marker of geojson.features) {
            // Create a DOM element for each marker.
            const el = document.createElement('div');
            const width = marker.properties.iconSize[0];
            const height = marker.properties.iconSize[1];
            el.className = 'marker';
            el.style.width = `${width}px`;
            el.style.height = `${height}px`;
            el.style.backgroundSize = '100%';
            
            // Add markers to the map.
            new mapboxgl.Marker(el)
            .setLngLat(marker.geometry.coordinates)
            .addTo(map);
        }
        
    }

})();