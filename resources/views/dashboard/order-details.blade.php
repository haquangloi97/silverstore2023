@extends('dashboard.master')
@section('body')
    <div class="container">
        <p class="p-2 fs-5 text-center shadow-sm text-white bg-indigo bg-gradient border fw-bolder">Order #{{ $order->created_at->format('jny').$order->id }}</p>
        <table id="example" class="row-border py-2">
            <thead class="text-bg-secondary">
            <tr>
                <th></th>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($order->getDetails as $detail)
                <tr>
                    <th>
                        {{ $loop->iteration }}
                    </th>
                    <td>
                        <img src="front/img/{{ $detail->getProduct->img }}" width="60" alt="">
                    </td>
                    <td>
                        <span class="text-success">{{ $detail->getProduct->name }}</span>
                    </td>
                    <td>
                        {{ $detail->qty }}
                    </td>
                    <td>
                        <span class="text-danger">{{ number_format($detail->price * $detail->qty, 0, ',', '.') }}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot class="text-bg-secondary">
            <tr>
                <th></th>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Amount</th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
