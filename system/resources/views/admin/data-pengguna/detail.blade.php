<x-layouts.app>
    <div class="col-span-12">
        <h2 class="section-content-title">FORM DETAIL DATA PENGGUNA</h2>
    </div>
    <div class="col-span-8">
        <div class="box">
            <div class="body">
                <ul>
                    <li>
                        <span>Email</span>
                        <span>:</span>
                        <span>{{ $list->email }}</span>
                    </li>
                    <li>
                        <span>NIK</span>
                        <span>:</span>
                        <span>{{ $list->nik_kk }}</span>
                    </li>
                    <li>
                        <span>Nama</span>
                        <span>:</span>
                        <span>{{ $list->nama_kk }}</span>
                    </li>
                    <li>
                        <span>Telepon</span>
                        <span>:</span>
                        <span>{{ $list->tlp_kk }}</span>
                    </li>
                    <li>
                        <span>Alamat</span>
                        <span>:</span>
                        <span>{{ $list->alamat_kk }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-span-4">
        <div class="box">
            <div class="body">
                <div id="map" class="dashboard-map"></div>
            </div>
        </div>
    </div>

    @push('js')
        <link href="https://api.mapbox.com/mapbox-gl-js/v3.8.0/mapbox-gl.css" rel="stylesheet">
        <script src="https://api.mapbox.com/mapbox-gl-js/v3.8.0/mapbox-gl.js"></script>
        <script>

            var center = [{{ $list->lng_kk }}, {{ $list->lat_kk }}];
            mapboxgl.accessToken =
                'pk.eyJ1IjoibXVoYW1tYWR5dXN1ZjE5OTIiLCJhIjoiY20xbGZ2YjI4MGM4OTJsc2VvbGUyMXRxYyJ9.QQGJGqMmKkNkP3FlGpyCrA';

            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v12',
                center: center,
                zoom: 13
            });
            marker = new mapboxgl.Marker()
                .setLngLat(center)
                .addTo(map);
        </script>
    @endpush


</x-layouts.app>
