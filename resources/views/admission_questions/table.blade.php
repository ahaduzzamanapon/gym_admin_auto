<div class="table-responsive">
    <table class="table" id="admissionQuestions-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Questions</th>
        <th>Created At</th>
        <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($admissionQuestions as $admissionQuestions)
            <tr>
                <td>{{ $admissionQuestions->id }}</td>
            <td>{{ $admissionQuestions->questions }}</td>
            <td>{{ $admissionQuestions->created_at }}</td>
            <td>{{ $admissionQuestions->updated_at }}</td>
                <td>
                    {!! Form::open(['route' => ['admissionQuestions.destroy', $admissionQuestions->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admissionQuestions.show', [$admissionQuestions->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Information"></i></a>
                        <a href="{{ route('admissionQuestions.edit', [$admissionQuestions->id]) }}" class='btn btn-outline-primary btn-xs'><i
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
