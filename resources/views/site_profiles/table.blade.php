<div class="table-responsive">
    <table class="table" id="siteProfiles-table">
        <thead>
            <tr>
                
        <th>Logo Name</th>
        <th>Banner Status</th>
        <th>Banner Image</th>
        <th>Banner Video</th>
        <th>Title</th>
        <th>Small Banner Text</th>
        <th>Big Banner Text</th>
        <th>Footer Text</th>
      
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($siteProfiles as $siteProfile)
            <tr>
               
            <td>{{ $siteProfile->logo_name }}</td>
            <td>{{ $siteProfile->banner_status }}</td>
            <td>
                @if ($siteProfile->banner_image != null)
                    <img src="{{ asset('storage/' . $siteProfile->banner_image) }}" alt="image missing" class="rounded-circle img-size">
                @else
                    <p>No image set</p>
                @endif
            </td>
            <td>
                @if ($siteProfile->banner_video != null)
                    <video width="140" height="100" controls>
                        <source src="{{ asset('storage/' . $siteProfile->banner_video) }}" type="video/mp4">
                    </video>
                @else
                    <p>No video set</p>
                @endif
            </td>
            <td>{{ $siteProfile->title }}</td>
            <td>{{ $siteProfile->small_banner_text }}</td>
            <td>{{ $siteProfile->big_banner_text }}</td>
            <td>{{ $siteProfile->fotter_text }}</td>
            <td>{{ $siteProfile->created_at }}</td>
            <td>{{ $siteProfile->updated_at }}</td>
                <td>
                    <div class='btn-group'>
                        <a href="{{ route('siteProfiles.edit', [$siteProfile->id]) }}" class='btn btn-outline-primary btn-xs'><i
                                class="im im-icon-Pen"  data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
