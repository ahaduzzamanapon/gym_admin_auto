<div class="table-responsive">
    <table class="table" id="siteTrainers-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Trainer Name</th>
        <th>Trainer Type</th>
        <th>Image</th>
        <th>Description</th>
        <th>Facebook Link</th>
        <th>Twitter</th>
        <th>Linkedin</th>
        <th>Created At</th>
        <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($siteTrainers as $key => $siteTrainer)
            <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $siteTrainer->trainer_name }}</td>
            <td>{{ $siteTrainer->trainer_type }}</td>
            <td><img src="{{ Storage::url($siteTrainer->image) }}" width="100" height="100"></td>
            <td title="{{ $siteTrainer->description }}" style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ Str::limit($siteTrainer->description, 10) }}</td>
            <td>{{ $siteTrainer->facebook_link }}</td>
            <td>{{ $siteTrainer->twitter }}</td>
            <td>{{ $siteTrainer->linkedin }}</td>
            <td>{{ $siteTrainer->created_at }}</td>
            <td>{{ $siteTrainer->updated_at }}</td>
                <td>
                    {!! Form::open(['route' => ['siteTrainers.destroy', $siteTrainer->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('siteTrainers.show', [$siteTrainer->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye" data-placement="top" title="View"></i></a>
                        <a href="{{ route('siteTrainers.edit', [$siteTrainer->id]) }}" class='btn btn-outline-primary btn-xs'><i
                                class="im im-icon-Pen"  data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                        {!! Form::button('<i class="im im-icon-Remove" data-toggle="tooltip" data-placement="top" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
