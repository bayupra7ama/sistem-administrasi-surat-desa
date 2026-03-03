@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Performa Kinerja</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    {{-- Grafik Pengajuan per Bulan --}}
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Pengajuan Surat per Bulan</h4>
                            </div>
                            <div class="card-body" style="height:300px;">
                                <canvas id="chartBulan"></canvas>
                            </div>
                        </div>
                    </div>

                    {{-- Grafik Status Pengajuan --}}
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Status Pengajuan</h4>
                            </div>
                            <div class="card-body" style="height:300px;">
                                <canvas id="chartStatus"></canvas>
                            </div>
                        </div>
                    </div>

                    {{-- Grafik Jenis Surat --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Pengajuan Berdasarkan Jenis Surat</h4>
                            </div>
                            <div class="card-body" style="height:300px;">
                                <canvas id="chartJenis"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // 🔹 Data dari controller (PHP -> JS)
            const bulanLabels = @json($bulanLabels);
            const dataBulan = @json($dataBulan);
            const statusCounts = @json($statusCounts);
            const jenisLabels = @json($jenisLabels);
            const jenisData = @json($jenisData);

            // 🔹 Grafik 1: Pengajuan per Bulan (Line Chart)
            new Chart(document.getElementById('chartBulan'), {
                type: 'line',
                data: {
                    labels: bulanLabels,
                    datasets: [{
                        label: 'Jumlah Pengajuan',
                        data: dataBulan,
                        borderColor: '#007bff',
                        backgroundColor: 'rgba(0,123,255,0.3)',
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // 🔹 Grafik 2: Status Pengajuan (Doughnut Chart)
            new Chart(document.getElementById('chartStatus'), {
                type: 'doughnut',
                data: {
                    labels: Object.keys(statusCounts),
                    datasets: [{
                        data: Object.values(statusCounts),
                        backgroundColor: ['#28a745', '#ffc107', '#dc3545']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });

            // 🔹 Grafik 3: Jenis Surat (Bar Chart)
            new Chart(document.getElementById('chartJenis'), {
                type: 'bar',
                data: {
                    labels: jenisLabels,
                    datasets: [{
                        label: 'Jumlah Pengajuan',
                        data: jenisData,
                        backgroundColor: ['#17a2b8', '#20c997', '#6f42c1', '#007bff', '#fd7e14']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
