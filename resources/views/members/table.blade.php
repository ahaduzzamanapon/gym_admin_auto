@section('header_styles')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered', 'id' => 'table1']) !!}

@section('footer_scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endsection
