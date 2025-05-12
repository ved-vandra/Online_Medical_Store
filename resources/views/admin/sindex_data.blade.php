<table class="table table-striped">
    <tr>
        <td colspan="7">
            <a href="{{ route('savesubcategoryshow') }}" class="btn bg-gradient-success  float-right">INSERT</a>
        </td>
    </tr>
    <tr  align="center">
        <th>@sortablelink('sid')</th>
        <th>@sortablelink('sub-categpry name')</th>
        <th>@sortablelink('category name')</th>
        <th>@sortablelink('sub-category description')</th>
        <th colspan="2">@sortablelink('Actions')</td>
    </tr>
    <tbody class="opp">
    @foreach($all as $data)
        <tr align="center">
            <td>{{ $data->sid}}</td>    
            <td>{{ $data->sname}}</td>
            <td>{{ $data->cname }}</td>
            <td>{{ $data->sdesc}}</td>
            <td width="15%">
                <a href="{{ route('editsubcategoryshow',$data->sid) }}"><button type="button" class="btn bg-gradient-info">EDIT</button></a>&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;<form style="display:inline-block" action="{{ route('sdelete',$data->sid) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn bg-gradient-danger">DELETE</button>
                </form>
            </td>
        </tr>
    @endforeach
    
    </tbody>
    
</table>
{{ $all->appends(\Request::except('page'))->render() }}