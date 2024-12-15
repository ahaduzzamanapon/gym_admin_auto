<div class="table-responsive">
    <table class="table" id="purchasePackages-table">
        <thead>
            <tr>
                <th>SL</th>
        <th>Member Name</th>
        <th>Package Name</th>
        <th>Coupon Code</th>
        <th>Amount</th>
        <th>Tax</th>
        <th>Coupon Amount</th>
        <th>Gross Amount</th>
        <th>Pay Amount</th>
        <th>Due Amount</th>
        <th>Status</th>
        <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($purchasePackages as $key => $purchasePackage)
            <tr>
                <td>{{ ++$key }}</td>
            <td>{{ $purchasePackage->member_name }}</td>
            <td>{{ $purchasePackage->pack_name }}</td>
            <td>{{ $purchasePackage->coupons_id }}</td>
            <td>{{ $purchasePackage->amount }}</td>
            <td>{{ $purchasePackage->tax }}</td>
            <td>{{ $purchasePackage->coupon_amount }}</td>
            <td>{{ $purchasePackage->gross_amount }}</td>
            <td>{{ $purchasePackage->pay_amount }}</td>
            <td>{{ $purchasePackage->due_amount }}</td>
            <td>
                @if($purchasePackage->status == 1)
                    <span class="badge badge-warning">Pending</span>
                @elseif($purchasePackage->status == 2)
                    <span class="badge badge-danger">Due</span>
                @elseif($purchasePackage->status == 3)
                    <span class="badge badge-success">Fully Paid</span>
                @endif
            </td>
                <td>
                    {!! Form::open(['route' => ['purchasePackages.destroy', $purchasePackage->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('purchasePackages.show', [$purchasePackage->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye" data-placement="top" title="View"></i></a>
                        <a href="{{ route('purchasePackages.edit', [$purchasePackage->id]) }}" class='btn btn-outline-primary btn-xs'><i
                                class="im im-icon-Pen"  data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                        {!! Form::button('<i class="im im-icon-Remove" data-toggle="tooltip" data-placement="top" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        <a target="_blank" href="{{ route('purchasePackages.invoice', $purchasePackage->id) }}" class="btn btn-success">Invoice</a>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
