<table class="table table-striped">
    <tr>
        <td colspan="7">
            <a href="{{ route('savecategoryshow') }}" class="btn bg-gradient-success float-right">INSERT</a>
        </td>
    </tr>
    <tr  align="center">
        <th>@sortablelink('Category ID')</td>
        <th>@sortablelink('Category Name')</td>
        <th>@sortablelink('Category Description')</td>
        <th colspan="2">@sortablelink('Actions')</td>
    </tr>
    @foreach($all as $data)
        <tr align="center">
            <td>{{ $data->cid}}</td>    
            <td>{{ $data->cname}}</td>
            <td>{{ $data->cdesc}}</td>
            <td width="20%">
                <a href="{{ route('editcategoryshow',$data->cid) }}"><button type="button" class="btn bg-gradient-info">EDIT</button></a>&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;<form style="display:inline-block" action="{{ route('cdelete',$data->cid) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn bg-gradient-danger">DELETE</button>
                </form>
            </td>
        </tr>
    @endforeach
    
</table>
{{ $all->appends(\Request::except('page'))->render() }}