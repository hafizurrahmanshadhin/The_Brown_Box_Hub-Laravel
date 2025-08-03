@extends('backend.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-content wrapper">
        <div class="container-fluid">
            <div class="row">
                <!-- Total Users Card -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Total Users</h5>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center">{{ $userCount }} Users</h3>
                        </div>
                    </div>
                </div>

                <!-- Active Users Card -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Active Users</h5>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center">{{ $activeUserCount }} Active</h3>
                        </div>
                    </div>
                </div>

                <!-- Total Orders Card -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Total Orders</h5>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center">{{ $orderCount }} Orders</h3>
                        </div>
                    </div>
                </div>

                <!-- Completed Orders Card -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Completed Orders</h5>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center">{{ $completedOrdersCount }} Completed</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Recent Orders -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Recent Orders</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentOrders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->user->firstName }} {{ $order->user->lastName }}</td>
                                            <td>${{ number_format($order->total_price, 2) }}</td>
                                            <td>{{ ucfirst($order->status) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Recent Transactions -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Recent Transactions</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentTransactions as $transaction)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $transaction->user->firstName }} {{ $transaction->user->lastName }}
                                            </td>
                                            <td>${{ number_format($transaction->amount, 2) }}</td>
                                            <td>{{ ucfirst($transaction->status) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Recent Contacts -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Recent Issues/Support</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentContacts as $contact)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $contact->firstName }} {{ $contact->lastName }}</td>
                                            <td>{{ $contact->phone_number }}</td>
                                            <td>{{ ucfirst($contact->status) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Recent Feedback -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Client Feedback</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentFeedbacks as $feedback)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $feedback->name }}</td>
                                            <td>{{ $feedback->rating }} / 5</td>
                                            <td>{{ ucfirst($feedback->status) }}</td>
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
