<table class="table table-striped">
    <tr>
        <td colspan="13">
            <a href="{{ route('saveproductshow') }}" class="btn bg-gradient-success float-right">INSERT</a>
        </td>
    </tr>
    <tr  align="center">
        <th>@sortablelink('Product ID')</td>
        <th>@sortablelink('SKU')</td>
        <th>@sortablelink('category name')</td>
        <th>@sortablelink('sub-category name')</td>
        <th>@sortablelink('product name')</td>
        <th>@sortablelink('Price')</td>
        <th>@sortablelink('Quantity')</td>
        <th>@sortablelink('Stock Status')</td>
        <th>@sortablelink('Images')</td>
        <th colspan="2">@sortablelink('Actions')</td>
    </tr>
    @foreach($all as $data)
        <tr align="center">
            <td width="7%">{{ $data->pid}}</td>    
            <td width="10%">{{ $data->sku}}</td>     
            <td width="11%">{{ $data->cname }}</td>
            <td width="11%">{{ $data->sname }}</td>   
            <td width="10%">{{ $data->pname}}</td>  
            <td width="10%">{{ $data->price}}</td>    
            <td width="10%">{{ $data->quan}}</td>    
            <td width="10%">{{ $data->stock}}</td>
            <td width="10%">
                @foreach ($data->iname as $image)
                    <a class="imglink" href="{{ route('imgdel',$image->iid) }}">
                        <img class="img" style="display:inline-block" height="36px" width="36px" src="/uploads/{{$image->iname}}" alt="">
                        <span class="imgspan"><i class="fas fa-times"></i></span>
                    </a>
                @endforeach
            </td>
            <td width="11%">
                <a href="{{ route('editproductshow',$data->pid) }}"><button type="button" class="btn bg-gradient-info">EDIT</button></a>&nbsp;&nbsp;
                <form style="display:inline-block" action="{{ route('pdelete',$data->pid) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn bg-gradient-danger">DELETE</button>
                </form>
            </td>
        </tr>
    @endforeach
    
</table>
{{ $all->appends(\Request::except('page'))->render() }}