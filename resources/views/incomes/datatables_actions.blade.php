{!! Form::open(['route' => ['incomes.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('incomes.show', $id) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye"></i>
    </a>
    <a href="{{ route('incomes.edit', $id) }}" class='btn btn-outline-primary btn-xs'><i
                                class="im im-icon-Pen"></i>
    </a>
    {!! Form::button('<i class="im im-icon-Remove"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-outline-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
