<div class="table-responsive">
    <table class="table" id="purchasePackages-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Member name</th>
        <th>Package name</th>
        <th>Coupons code</th>
        <th>Amount</th>
        <th>Tax</th>
        <th>Coupon Amount</th>
        <th>Gross Amount</th>
        <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($purchasePackages as $purchasePackage)
            <tr>
                <td>{{ $purchasePackage->id }}</td>
            <td>{{ $purchasePackage->member_name }}</td>
            <td>{{ $purchasePackage->pack_name }}</td>
            <td>{{ $purchasePackage->coupons_id }}</td>
            <td>{{ $purchasePackage->amount }}</td>
            <td>{{ $purchasePackage->tax }}</td>
            <td>{{ $purchasePackage->coupon_amount }}</td>
            <td>{{ $purchasePackage->gross_amount }}</td>
                <td>
                    {!! Form::open(['route' => ['purchasePackages.destroy', $purchasePackage->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('purchasePackages.show', [$purchasePackage->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Information"></i></a>
                        <a href="{{ route('purchasePackages.edit', [$purchasePackage->id]) }}" class='btn btn-outline-primary btn-xs'><i
                                class="im im-icon-File-Edit"></i></a>
                        {!! Form::button('<i class="im im-icon-Remove"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
