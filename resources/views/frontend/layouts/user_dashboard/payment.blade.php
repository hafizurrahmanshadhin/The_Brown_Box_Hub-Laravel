@extends('frontend.user_dashboard')

@section('title', 'Payment History')

@section('content')
    <section class="custom-content">
        <h2>Your Payment History</h2>

        @if ($payments->isEmpty())
            <p>No payments found.</p>
        @else
            <div class="payment-history-table-wrapper">
                <table class="payment-history-table">
                    <thead>
                        <tr>
                            <th>Payment ID</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Subscription Plan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr class="{{ $loop->even ? 'even' : 'odd' }}">
                                <td>{{ $payment->id }}</td>
                                <td>${{ number_format($payment->total_price, 2) }}</td>
                                <td>
                                    @if ($payment->status == 'completed')
                                        <span class="status completed">✔ Completed</span>
                                    @elseif($payment->status == 'pending')
                                        <span class="status pending">⏳ Pending</span>
                                    @else
                                        <span class="status failed">❌ Failed</span>
                                    @endif
                                </td>
                                <td>{{ $payment->created_at->format('d-m-Y H:i') }}</td>
                                <td>{{ $payment->subscription ? $payment->subscription->name : 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection

@push('styles')
    <style>
        .payment-history-table-wrapper {
            overflow-x: auto;
            margin-top: 20px;
        }

        .payment-history-table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .payment-history-table th,
        .payment-history-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .payment-history-table th {
            background-color: #f4f4f4;
            font-weight: bold;
            color: #333;
        }

        .payment-history-table tr.even {
            background-color: #f9f9f9;
        }

        .payment-history-table tr:hover {
            background-color: #f1f1f1;
        }

        .status {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .status.completed {
            color: green;
            background-color: #d4edda;
        }

        .status.pending {
            color: orange;
            background-color: #ffeeba;
        }

        .status.failed {
            color: red;
            background-color: #f8d7da;
        }

        .payment-history-table td,
        .payment-history-table th {
            word-wrap: break-word;
        }

        /* For responsive design */
        @media (max-width: 768px) {

            .payment-history-table th,
            .payment-history-table td {
                padding: 10px;
            }

            .payment-history-table {
                font-size: 14px;
            }
        }
    </style>
@endpush
