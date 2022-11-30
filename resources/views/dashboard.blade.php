@extends('main')

@section('content')

    <div class="card">
        <div class="card-header bg-info text-center h5">Main window</div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-center pt-5">
                    <h1 class="display-one mt-5">{{ config('app.name') }}</h1>
                    <p>This is the main Dashboard for this website. Please choose:</p>
                    <br>
                    <a href="/blog" class="btn btn-outline-primary m-3">Show Blog</a>
                    <a href="/table" class="btn btn-outline-primary m-3">Table from Section 2</a>
                </div>
            </div>
        </div>
    </div>

@endsection('content')
