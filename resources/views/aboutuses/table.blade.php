<div class="table-responsive">
    <table class="table" id="aboutuses-table">
        <thead>
            <tr>
                
        <th>Text</th>
     
       
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($aboutuses as $aboutUs)
            <tr>
              
            <td>{{ $aboutUs->Text }}</td>
          
                <td>
                  
                    <div class='btn-group'>
                        <a href="{{ route('aboutuses.edit', [$aboutUs->id]) }}" class='btn btn-outline-primary btn-xs'><i
                                class="im im-icon-Pen"  data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                    </div>
                   
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
