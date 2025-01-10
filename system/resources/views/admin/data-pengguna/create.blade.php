<x-layouts.app>
    <div class="col-span-12">
        <h2 class="section-content-title">FORM TAMBAH DATA PENGGUNA</h2>
    </div>

    <div class="col-span-12">
        <div class="box">
            <div class="body">
                <form action="{{ url('admin/pengguna/store') }}" method="POST" enctype="multipart/form-data" class="form-input">
                    <input type="hidden" name="lat_kk" id="lat" class="form-control">
                    <input type="hidden" name="lng_kk" id="lng" class="form-control">
                    @csrf
                    <div class="col-span-4">
                        <x-input.input title="Email" name="email" placeholder="Masukan Email ..." />
                    </div>
                    <div class="col-span-4">
                        <x-input.input title="NIK" name="nik_kk" placeholder="Masukan NIK ..." />
                    </div>
                    <div class="col-span-4">
                        <x-input.input title="Nama Kepala Keluarga" name="nama_kk"
                            placeholder="Masukan nama kk ..." />
                    </div>
                    <div class="col-span-4">
                        <x-input.input title="Telepon" name="tlp_kk" placeholder="Masukan telepon ..." />
                    </div>
                    <div class="col-span-4">
                        <x-input.input type="file" title="Foto" name="foto_kk"
                            placeholder="Masukan foto ..." />
                    </div>
                    <div class="col-span-8">
                        <x-input.input title="Alamat" name="alamat_kk" placeholder="Masukan alamat kk ..." readonly/>
                    </div>
                    <div class="col-span-12">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-span-12">
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
            mapboxgl.accessToken =
                'pk.eyJ1IjoibXVoYW1tYWR5dXN1ZjE5OTIiLCJhIjoiY20xbGZ2YjI4MGM4OTJsc2VvbGUyMXRxYyJ9.QQGJGqMmKkNkP3FlGpyCrA';

            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v12',
                center: [109.97198683068454, -1.8582829874849025],
                zoom: 13
            });

            let marker = null; // Variabel untuk menyimpan marker

            map.on('click', function(e) {
                // Jika marker sudah ada, tidak perlu menambahkan yang baru
                if (marker) {
                    alert("Hanya satu marker yang diperbolehkan.");
                    return; // Keluar dari fungsi jika marker sudah ada
                }

                var lat = e.lngLat.lat.toFixed(7);
                var lng = e.lngLat.lng.toFixed(7);

                async function getAddress() {
                    try {
                        await $.ajax({
                            url: `https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`,
                            dataType: 'json',
                            success: function(data) {
                                console.log(data);
                                $('#alamat_kk').val(data.display_name);
                                $('#lat').val(lat);
                                $('#lng').val(lng);

                                // Buat marker baru
                                marker = new mapboxgl.Marker({
                                        draggable: true
                                    })
                                    .setLngLat([lng, lat]) // Perhatikan urutan lng, lat
                                    .addTo(map);

                                // Event listener untuk dragend
                                marker.on('dragend', function() {
                                    const lngLat = marker.getLngLat();
                                    $('#lat').val(lngLat.lat.toFixed(7));
                                    $('#lng').val(lngLat.lng.toFixed(7));

                                    // Dapatkan alamat baru setelah marker dipindahkan
                                    getAddressFromLatLng(lngLat.lat, lngLat.lng);
                                });
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.log('Error fetching data:', textStatus, errorThrown);
                            }
                        });
                    } catch (error) {
                        console.error('Error:', error);
                    }
                }

                // Fungsi untuk mendapatkan alamat dari lat dan lng
                function getAddressFromLatLng(lat, lng) {
                    $.ajax({
                        url: `https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`,
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            $('#alamat_kk').val(data.display_name);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log('Error fetching data:', textStatus, errorThrown);
                        }
                    });
                }

                getAddress();
            });
        </script>
    @endpush


</x-layouts.app>
