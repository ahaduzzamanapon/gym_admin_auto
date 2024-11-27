<div class="table-responsive">
    <table class="table" id="siteSettings-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Name</th>
        <th>Logo</th>
        <th>Slogan</th>
        <th>Created At</th>
        <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($siteSettings as $siteSetting)
            <tr>
                <td>{{ $siteSetting->id }}</td>
            <td>{{ $siteSetting->name }}</td>
            <td>{{ $siteSetting->logo }}</td>
            <td>{{ $siteSetting->slogan }}</td>
            <td>{{ $siteSetting->created_at }}</td>
            <td>{{ $siteSetting->updated_at }}</td>
                <td>
                    {!! Form::open(['route' => ['siteSettings.destroy', $siteSetting->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('siteSettings.show', [$siteSetting->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Information"></i></a>
                        <a href="{{ route('siteSettings.edit', [$siteSetting->id]) }}" class='btn btn-outline-primary btn-xs'><i
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