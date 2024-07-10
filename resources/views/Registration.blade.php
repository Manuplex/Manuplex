@extends('App.template')
@section('title','Rapport')
@section('content')
<body>
    <div class="container">
        <h1>Google Analytics Report</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Source</th>
                    <th>Sessions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reportData as $data)
                    <tr>
                        <td>{{ $data['source'] }}</td>
                        <td>{{ $data['sessions'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection