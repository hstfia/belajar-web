<x-layouts.app>
    <div class="col-span-12">
        <h2 class="section-content-title">DASHBOARD</h2>
    </div>
    <div class="col-span-12">
        <div class="box">
            <div class="body">
                <div class="container">
                    <h2 class="title">LOKASI PERUMAHAN MASYARAKAT</h2>
                    <div class="row mt-5">
                        {{-- total user card --}}
                        <div class="col-md-3 mb-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Total User</h5>
                                    <h4 style="color:white" id="totalUsers">600</h4>
                                </div>
                            </div>
                        </div>

                        {{-- total kejadian --}}
                        <div class="col-md-3 mb-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Total Kejadian</h5>
                                    <h4 style="color:white" id="totalKejadian">600</h4>
                                </div>
                            </div>
                        </div>

                        {{-- total kejadian --}}
                        <div class="col-md-3 mb-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Total Perumahan</h5>
                                    <h4 style="color:white" id="totalPerumahan">600</h4>
                                </div>
                            </div>
                        </div>

                        {{-- total kejadian --}}
                        {{-- <div class="col-md-3 mb-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Total Kejadian</h5>
                                    <h4 style="color:white" id="totalUSers">600</h4>
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-md-6 mt-4">
                            <canvas id="emergencyChart" width="400" height="200"></canvas>
                        </div>
                        <div class="col-md-6 mt-4">
                            <div id="map" class="dashboard-map"></div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

    @push('js')
        <link href="https://api.mapbox.com/mapbox-gl-js/v3.8.0/mapbox-gl.css" rel="stylesheet">
        <script src="https://api.mapbox.com/mapbox-gl-js/v3.8.0/mapbox-gl.js"></script>
        <script>
            var center = [109.9541154, -1.8590690];

            mapboxgl.accessToken =
                'pk.eyJ1IjoibXVoYW1tYWR5dXN1ZjE5OTIiLCJhIjoiY20xbGZ2YjI4MGM4OTJsc2VvbGUyMXRxYyJ9.QQGJGqMmKkNkP3FlGpyCrA';

            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v12',
                center: center,
                zoom: 13
            });

            async function ambilData() {
                try {
                    $.get("{{ url('admin/dashboard/loadMarker') }}", function(data) {
                        for (const list of data) {
                            var imageMarker = `{{ url('${list.foto_kk}') }}`;
                            let updatedUrl = imageMarker.replace(/\\/g, '/');

                            const el = document.createElement('div');
                            el.className = 'marker';
                            el.style.backgroundImage = `url(${updatedUrl})`; // Ganti dengan path ke gambar Anda
                            el.style.backgroundSize = 'contain'; // Mengatur ukuran gambar
                            el.style.width = '25px'; // Atur lebar marker
                            el.style.height = '25px'; // Atur tinggi marker
                            el.style.borderRadius = '50%'; // Atur tinggi marker
                            el.style.cursor = 'pointer'; // Menambahkan kursor pointer
                            console.log(el)
                            marker = new mapboxgl.Marker(el)
                                .setLngLat([list.lng_kk, list.lat_kk])
                                .setPopup(
                                    new mapboxgl.Popup({
                                        offset: 25
                                    }) // add popups
                                    .setHTML(
                                        `<h3>${list.alamat_kk}</h3>`
                                    )
                                )
                                .addTo(map);
                        }

                    });
                } catch (error) {
                    console.log(error.message)
                }
            }
            ambilData()
        </script>
        </script>

        //CHART
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Inisialisasi chart
            const ctx = document.getElementById('emergencyChart').getContext('2d');

            const emergencyChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [], // Placeholder untuk kategori
                    datasets: [{
                        label: 'Jumlah Kejadian',
                        data: [], // Placeholder untuk data kejadian
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Hubungkan SSE
            const source = new EventSource("{{ url('/dashboard/stream-emergency-events') }}");

            source.onmessage = function(event) {
                const data = JSON.parse(event.data);

                // Update chart dengan data baru
                emergencyChart.data.labels = data.labels;
                emergencyChart.data.datasets[0].data = data.counts;
                emergencyChart.update(); // Refresh chart
            };

            source.onerror = function() {
                console.error('SSE connection error.');
                source.close();
            };
        </script>
    @endpush
</x-layouts.app>
