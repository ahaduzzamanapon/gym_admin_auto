<div class="table-responsive">
    <table class="table" id="siteFeatures-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Title</th>
        <th>image</th>
        <th>Description</th>
        <th>Created At</th>
        <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($siteFeatures as $key => $siteFeature)
            <tr>
                <td>{{ $key+1 }}</td>
            <td>{{ $siteFeature->title }}</td>
            <td><img src="{{ Storage::url($siteFeature->image) }}" alt="image missing" class="rounded-circle img-size"></td>
            <td>{{ $siteFeature->description }}</td>
            <td>{{ $siteFeature->created_at }}</td>
            <td>{{ $siteFeature->updated_at }}</td>
                <td>
                    {!! Form::open(['route' => ['siteFeatures.destroy', $siteFeature->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('siteFeatures.show', [$siteFeature->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye"></i></a>
                        <a href="{{ route('siteFeatures.edit', [$siteFeature->id]) }}" class='btn btn-outline-primary btn-xs'><i
                                class="im im-icon-Pen"></i></a>
                        {!! Form::button('<i class="im im-icon-Remove"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
