@extends('backend.app')

@section('title', 'Calendly')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('calendly.index') }}">Table</a></li>
                                <li class="breadcrumb-item active">Scheduled Events</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Scheduled Events</h5>
                        </div>
                        <div class="card-body">
                            <table id="datatable"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="column-id">#</th>
                                        <th class="column-content">Event Name</th>
                                        <th class="column-content">Invitee Name</th>
                                        <th class="column-content">Start Time</th>
                                        <th class="column-content">End Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events['collection'] as $event)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $event['name'] }}</td>
                                            <td>{{ $event['invitee']['name'] ?? 'N/A' }}</td>
                                            <td>{{ $event['start_time'] }}</td>
                                            <td>{{ $event['end_time'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
