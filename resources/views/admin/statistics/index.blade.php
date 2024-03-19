<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 dark:text-white leading-tight ">
            {{ __('Statistics') }}
        </h2>
    </x-slot>
    <div class="container mx-auto p-8">
        <div class="bg-white hover:bg-gray-100 dark:bg-gray-800 rounded-lg shadow overflow-hidden">
            <div class="p-6 flex flex-wrap gap-4">
                <div class="w-full md:w-1/2 lg:w-1/4">
                    <canvas id="eventsChart" width="300" height="300"></canvas>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4">
                    <canvas id="newsChart" width="300" height="300"></canvas>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4">
                    <canvas id="usersChart" width="300" height="300"></canvas>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4">
                    <canvas id="reportsChart" width="300" height="300"></canvas>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4">
                    <canvas id="adsChart" width="300" height="300"></canvas>
                </div>

            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var publicEventsCount = parseInt(document.getElementById('publicEventsCount').dataset.count);
            var privateEventsCount = parseInt(document.getElementById('privateEventsCount').dataset.count);
            var publicNewsCount = parseInt(document.getElementById('publicNewsCount').dataset.count);
            var privateNewsCount = parseInt(document.getElementById('privateNewsCount').dataset.count);
            var usersCount = parseInt(document.getElementById('usersCount').dataset.count);
            var reportsCount = parseInt(document.getElementById('reportsCount').dataset.count);
            var ads = parseInt(document.getElementById('adsCount').dataset.count);
            var settledReportsCount = parseInt(document.getElementById('settledReportsCount').dataset.count);
            var pendingReportsCount = parseInt(document.getElementById('pendingReportsCount').dataset.count);
            var cancelledReportsCount = parseInt(document.getElementById('cancelledReportsCount').dataset.count);


            // Set up the charts for events
            var eventsCtx = document.getElementById('eventsChart').getContext('2d');
            var eventsChart = new Chart(eventsCtx, {
                type: 'bar',
                data: {
                    labels: ['Public Events', 'Private Events', 'Total Events'],
                    datasets: [{
                        label: 'Event Data',
                        data: [publicEventsCount, privateEventsCount, publicEventsCount + privateEventsCount],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 205, 86, 1)',
                        ],
                        borderWidth: 3
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Set up the charts for news
            var newsCtx = document.getElementById('newsChart').getContext('2d');
            var newsChart = new Chart(newsCtx, {
                type: 'bar',
                data: {
                    labels: ['Public News', 'Private News', 'Total News'],
                    datasets: [{
                        label: 'News Data',
                        data: [publicNewsCount, privateNewsCount, publicNewsCount + privateNewsCount],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 205, 86, 1)',
                        ],
                        borderWidth: 3
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Set up the charts for users
            var usersCtx = document.getElementById('usersChart').getContext('2d');
            var usersChart = new Chart(usersCtx, {
                type: 'bar',
                data: {
                    labels: ['Total Users'],
                    datasets: [{
                        label: 'Users Data',
                        data: [usersCount],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                        ],
                        borderWidth: 3
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var reportsCtx = document.getElementById('reportsChart').getContext('2d');
            var reportsChart = new Chart(reportsCtx, {
                type: 'bar',
                data: {
                    labels: ['Settled Complains', 'Pending Complains', 'Cancelled Complains', 'Total Complains'],
                    datasets: [{
                        label: 'Reports Data',
                        data: [settledReportsCount, pendingReportsCount, cancelledReportsCount, settledReportsCount + pendingReportsCount + cancelledReportsCount],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(255, 99, 255, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 205, 86, 1)',
                            'rgba(255, 99, 255, 1)',
                        ],
                        borderWidth: 3
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var adsCtx = document.getElementById('adsChart').getContext('2d');
            var adsChart = new Chart(adsCtx, {
                type: 'bar',
                data: {
                    labels: ['Total Advertisements'],
                    datasets: [{
                        label: 'Advertisement Data',
                        data: [adsCount],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                        ],
                        borderWidth: 3
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

    <div id="publicEventsCount" data-count="{{ $events->where('status', 'public')->count() }}" style="display: none;"></div>
    <div id="privateEventsCount" data-count="{{ $events->where('status', 'private')->count() }}" style="display: none;"></div>
    <div id="publicNewsCount" data-count="{{ $news->where('status', 'public')->count() }}" style="display: none;"></div>
    <div id="privateNewsCount" data-count="{{ $news->where('status', 'private')->count() }}" style="display: none;"></div>
    <div id="usersCount" data-count="{{ $users->count() }}" style="display: none;"></div>
    <div id="reportsCount" data-count="{{ $reports->count() }}" style="display: none;"></div>
    <div id="adsCount" data-count="{{ $advertisements->count() }}" style="display: none;"></div>
    <div id="settledReportsCount" data-count="{{ $reports->where('status', 'settled')->count() }}" style="display: none;"></div>
    <div id="pendingReportsCount" data-count="{{ $reports->where('status', 'pending')->count() }}" style="display: none;"></div>
    <div id="cancelledReportsCount" data-count="{{ $reports->where('status', 'cancelled')->count() }}" style="display: none;"></div>


</x-app-layout>