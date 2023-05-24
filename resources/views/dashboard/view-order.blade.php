@extends('dashboard.master')
@section('body')
    <div class="container">
        <p class="text-uppercase p-2 fs-5 text-center shadow-sm text-white bg-indigo bg-gradient fw-bolder">List of Orders</p>
        <table id="example" class="cell-border stripe py-2">
            <thead class="text-bg-secondary">
            <tr>
                <th></th>
                <th>Id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Note</th>
                <th>Total</th>
                <th>Invoice date</th>
                <th>Detail</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>
                        <button type="button" class="btn btn-sm btn-close" title="Delete" data-bs-toggle="modal" data-bs-target="#staticDelete" onclick="TransferId({{ $order->id }})"></button>
                    </td>
                    <td><span class="fw-semibold">{{ $order->created_at->format('jny').$order->id }}</span></td>
                    <td><span class="fw-semibold text-success">{{ $order->name }}</span></td>
                    <td><span class="fw-semibold text-success">{{ $order->phone }}</span></td>
                    <td><span class="text-dark">{{ $order->address }}</span></td>
                    <td><span class="text-dark">{{ $order->note }}</span></td>
                    <td>
                        @php $sum = 0 @endphp
                        @foreach ($order->getDetails as $detail)
                            @php $sum += $detail->price * $detail->qty @endphp
                        @endforeach
                        <span class="text-danger fw-semibold">{{ number_format($sum, 0, ',', '.') }}</span>
                    </td>
                    <td>
                        <span class="text-dark">{{ $order->created_at->format('M d, Y H:i:s') }}</span>
                    </td>
                    <td>
                        <a href="{{ route('viewOrder', $order->id) }}" class="btn btn-sm btn-outline-secondary rounded-circle" title="Order #{{ $order->created_at->format('jny').$order->id }}"><i class="fa-solid fa-file-import"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot class="text-bg-secondary">
            <tr>
                <th></th>
                <th>Id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Note</th>
                <th>Total</th>
                <th>Invoice date</th>
                <th>Detail</th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
