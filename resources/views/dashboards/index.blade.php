@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row col-5" style="float: left;">
                        <canvas id="myChart1"></canvas>
                    </div>
                    <div class="row col-5" style="float: right;">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(document).ready(function() {
            const cData = JSON.parse(`<?php echo $data1;?>`);
            console.log(cData);
            const ctx = document.getElementById('myChart1').getContext('2d');

            const mychart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels:cData.label1,
                    datasets:[{
                        label:'Numero de proyectos:',
                        data:cData.data1,
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],

                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Canton Peñas',
                            fontSize: 24
                        },
                        legend: {
                            position: 'left'
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,

                            }
                        }]
                    }
                }
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            const cData = JSON.parse(`<?php echo $data2;?>`);
            console.log(cData);
            const ctx = document.getElementById('myChart2').getContext('2d');

            const mychart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels:cData.label2,
                    datasets:[{
                        label:'Numero de proyectos:',
                        data:cData.data2,
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],

                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Canton Batallas',
                            fontSize: 24
                        },
                        legend: {
                            position: 'left'
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,

                            }
                        }]
                    }
                }
            })
        });
    </script>
@stop