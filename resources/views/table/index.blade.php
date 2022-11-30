@extends('main')
@section('content')
    <div class="row">
        <a class="btn btn-outline-primary col-1" href="../dashboard">Back</a>
        <h2>Reported Cases and Deaths by Country or Territory</h2>

    </div>
    <div class="container col-10 offset-1">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Country</th>
                <th scope="col">Total Cases</th>
                <th scope="col">New Cases</th>
                <th scope="col">Total Deaths</th>
                <th scope="col">New Deaths</th>
                <th scope="col">Total Recovered</th>
            </tr>
            </thead>
            <tbody>
            @forelse($data as $data)
                <tr>
                    <td>{{$data->Country}}</td>
                    <td>{{$data->Total_Cases}}</td>
                    <td>{{$data->New_Cases}}</td>
                    <td>{{$data->Total_Deaths}}</td>
                    <td>{{$data->New_Deaths}}</td>
                    <td>{{$data->Total_Recovered}}</td>
                </tr>
            @empty
                <tr class="text-warning">
                    <td> No table generated</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
