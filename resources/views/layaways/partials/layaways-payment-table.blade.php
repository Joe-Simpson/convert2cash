<table class="table">
    <thead>
        <tr>
            <th scope="col">Payment Date</th>
            <th scope="col">Payment Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($layaways->layawayPayment as $layawayPayment)
        <tr>
            <th scope="row">{{ $layawayPayment->created_at->format('d-m-Y') }}</th>
            <td>£ {{ $layawayPayment->payment }}</td>
        </tr>
        @endforeach
    </tbody>
</table>