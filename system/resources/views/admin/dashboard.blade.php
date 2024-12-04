<x-layouts.app>
    <div class="col-span-12">
        <h2 class="section-content-title">DASHBOARD</h2>
    </div>
    <div class="col-span-12">
        <div class="box">
            <div class="header">
                <h2 class="title">LOKASI PERUMAHAN MASYARAKAT</h2>
            </div>
            <div class="body">
                <div id="map" class="dashboard-map"></div>
            </div>
        </div>
    </div>

    @push('js')
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.8.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v3.8.0/mapbox-gl.js"></script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoibXVoYW1tYWR5dXN1ZjE5OTIiLCJhIjoiY20xbGZ2YjI4MGM4OTJsc2VvbGUyMXRxYyJ9.QQGJGqMmKkNkP3FlGpyCrA';
        const geojson = {
            'type': 'FeatureCollection',
            'features': [
                {
                    'type': 'Feature',
                    'properties': {
                        'message': 'Foo',
                        'imageId': 1011,
                        'iconSize': [60, 60]
                    },
                    'geometry': {
                        'type': 'Point',
                        'coordinates': [-66.324462, -16.024695]
                    }
                },
                {
                    'type': 'Feature',
                    'properties': {
                        'message': 'Bar',
                        'imageId': 870,
                        'iconSize': [50, 50]
                    },
                    'geometry': {
                        'type': 'Point',
                        'coordinates': [-61.21582, -15.971891]
                    }
                },
                {
                    'type': 'Feature',
                    'properties': {
                        'message': 'Baz',
                        'imageId': 837,
                        'iconSize': [40, 40]
                    },
                    'geometry': {
                        'type': 'Point',
                        'coordinates': [-63.292236, -18.281518]
                    }
                }
            ]
        };

        const map = new mapboxgl.Map({
            container: 'map',
            // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
            style: 'mapbox://styles/mapbox/streets-v12',
            center: [109.97198683068454,-1.8582829874849025],
            zoom: 5
        });

        // Add markers to the map.
        for (const marker of geojson.features) {
            // Create a DOM element for each marker.
            const el = document.createElement('div');
            const width = marker.properties.iconSize[0];
            const height = marker.properties.iconSize[1];
            el.className = 'marker';
            el.style.backgroundImage = `url(https://picsum.photos/id/${marker.properties.imageId}/${width}/${height})`;
            el.style.width = `${width}px`;
            el.style.height = `${height}px`;
            el.style.backgroundSize = '100%';

            el.addEventListener('click', () => {
                window.alert(marker.properties.message);
            });

            // Add markers to the map.
            new mapboxgl.Marker(el)
                .setLngLat(marker.geometry.coordinates)
                .addTo(map);
        }
    </script>
    @endpush
</x-layouts.app>
