@extends('layouts.main')

@section('content')
<meta name= "csrf-token" content="{{ csrf_token() }}" />
<div class="row" >
    <div class="col-md-12" >
    <form enctype="multipart/form-data" id="frmpcreate" method="POST" action="@if(!empty($product)) {{ route('editproduct',$product->pid) }} @else {{ route('saveproduct') }} @endif" >
        @csrf
        <table class="table table-dark" style="width: 60%; margin:auto;" >
            <tr align="center">
                <td colspan="5">
                    <h4 style="color:white">CREATE NEW DATA OF PRODUCT</h4>
                </td>
            </tr>
            <tr>
                <td> SKU</td>
                <td ><input type="text" name="sku" @if (!empty($product)) value="{{ $product->sku }}"  @endif id="sku" ></td>
                <td>
                    @if (!empty($product))
                    <input type="hidden" name="pid" id="pid" value="{{ $product->pid }}">
                    @endif
                    <label for="sku" class="error" style="color:red;" id="sku-error"></label>
                </td>
            </tr>
            <tr>
                <td>
                    CATEGORY NAME
                </td>
                <td>
                    <select name="cid" id="cid" class="form-control" style="width: 200px">
                        <option value="" hidden>choose category </option>
                            @foreach ($category as $cat)
                                <option value="{{ $cat->cid }}"@if(!empty($product)) {{$cat->cid == $product->cid  ? 'selected' : ''}} @endif>{{ $cat->cname }}</option>
                            @endforeach
                    </select>
                </td>
                <td>
                    <label for="cid" class="error" style="color:red;" id="cid-error"></label>
                </td>
            </tr>
            <tr >
                <td>
                    SUB-CATEGORY NAME
                </td>
                <td>
                    <select name="sid" id="sid"class="form-control" style="width: 200px">
                        <option hidden value=""> SELECT SUB-CATEGORY</option>
                            @foreach ($subcategory as $item)
                                <option value="{{ $item->sid }}">{{ $item->sname }}</option>
                            @endforeach
                    </select>
                </td>
                <td>
                    <label for="sid" class="error" style="color:red;" id="sid-error"></label>
                </td>
            </tr>
            <tr>
                <td>
                    PRODUCT NAME
                </td>
                <td>
                    <input type="text" name="pname" @if (!empty($product)) value="{{ $product->pname }}"  @endif id="pname">
                </td>
                <td>
                    <label for="pname" class="error" style="color:red;" id="pname-error"></label>
                </td>
            </tr>
            <tr>
                <td> PRICE</td>
                <td ><input type="text" name="price" @if (!empty($product)) value="{{ $product->price }}" @endif id="price" ></td>
                <td>
                    <label for="price" class="error" style="color:red;" id="price-error"></label>
                </td>

            </tr>
            <tr>
                <td> SALE START DATE</td>
                <td ><input type="date" name="salestartdate" @if (!empty($product)) value="{{ $product->salestartdate }}"  @endif id="salestartdate" ></td>
                <td>
                    <label for="salestartdate" class="error" style="color:red;" id="salestartdate-error"></label>
                </td>

            </tr>
            <tr class="change">
                <td> SALE END DATE</td>
                <td ><input type="date" name="saleenddate" @if (!empty($product)) value="{{ $product->saleenddate }}"  @endif id="saleenddate" ></td>
                <td>
                    <label for="saleenddate" class="error" style="color:red;" id="saleenddate-error"></label>
                </td>

            </tr>
            <tr class="change">
                <td> SALE PRICE</td>
                <td ><input type="text" name="saleprice" @if (!empty($product)) value="{{ $product->saleprice }}"  @endif id="saleprice" ></td>
                <td>
                    <label for="saleprice" class="error" style="color:red;" id="saleprice-error"></label>
                </td>

            </tr>
            <tr>
                <td> QUANTITY</td>
                <td ><input type="text" name="quan" @if (!empty($product)) value="{{ $product->quan }}"  @endif id="quan" ></td>
                <td>
                    <label for="quan" class="error" style="color:red;" id="quan-error"></label>
                </td>
            </tr>
            <tr>
                <td> STOCK</td>
                <td ><select name="stock" id="stock" class="form-control" style="width: 200px">
                            <option value="" hidden>SELECT STOCK STATUS</option>
                            <option value="out of stock" @if (!empty($product)){{$product->stock == 'out of stock'  ? 'selected' : ''}}@endif>
                                out of stock</option>
                            <option value="in stock"@if (!empty($product)){{$product->stock == 'in stock'  ? 'selected' : ''}}@endif>in stock</option>
                    </select>
                </td>
                <td>
                    <label for="stock" class="error" style="color:red;" id="stock-error"></label>
                </td>
            </tr>
            <tr>
                <td>
                    IMAGES
                </td>
                <td>
                    @if (!empty($product))
                        <input type="file" name="images[]" id="images" multiple/>                        
                    @else
                        <input type="file" name="images[]" id="images" required multiple/>
                    @endif
                </td>
                <td>
                    <label for="images" class="error" style="color:red;" id="images-error"></label>
                </td>
            </tr>
            @if (!empty($product))
                <tr>
                    <td colspan="5"  align="center">
                        @foreach ($img as $image)
                            <a class="imglink" style="position: relative;display: inline-block;" href="{{ route('imgdel',$image->iid) }}">
                                <img class="img" height="50px" width="50px" src="/uploads/{{$image->iname}}" alt="">
                                <span class="imgspan"><i class="fas fa-times"></i></span>
                            </a>
                        @endforeach
                    </td>
                </tr>    
            @endif
            <tr>
                <td colspan="5" align="center">
                    <button type="submit"class="btn btn-dark">SAVE</button>  &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="reset" class="btn btn-success">RESET</button>
                </td>
            </tr>
        </table>
    </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#salestartdate').on('blur',function(){
            var date = $(this).val();
            var enddate = $('#saleenddate').val();
            var saleprice = $('#saleprice').val();
            if (date != "") {
                // console.log('filled');
                $('.change').css("display","table-row");
            } else {
                // console.log('empty');
                $('saleprice').append('');

                // $('.change').css("display","none");
            }
        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.validator.addMethod('le', function (value, element, param) {
            return this.optional(element) || value <= $(param).val();
        }, 'Invalid value');
        $("#frmpcreate").validate({      
            rules:
            {
                sku:    
                    {
                        required:true,
                        remote:{
                            url:'{{ route("skucheck") }}',
                            type:'post',
                            data:{
                                sku:function(){
                                    return $('#frmpcreate :input[name="sku"]').val();
                                },
                                pid:function(){
                                    return $('#frmpcreate :input[name="pid"]').val();
                                },
                            },
                        },
                    },
                cid:"required",
                sid:"required",
                pname:"required",
                price:"required",
                saleprice:{ 
                            number:true,
                            le:'#price',
                          },
                quan:"required",
                stock:"required",
            },
            messages:
            {
                sku:{required:"please enter SKU!",remote:"SKU already exists!"},
                cid:"Please Select Catogory Name",
                sid:"Please Select Sub-Catogory Name",
                pname:"Please Enter Product Name",
                price:"Please Enter Price!",
                saleprice:{  number:"Sale Price Must Be Integer!", le:"Sale Price Must Be Less Than Price!"},
                quan:"please enter Quantity!",
                stock:"please enter Stock Status!",
                images:"Please select Images!",
            },
        });
        $('#cid').on('change',function(){
            var cid=$(this).val();
            if(cid){
                $.ajax({
                    url:'/getscate/'+cid,
                    type:'GET',
                    data : {"_token":"{{ csrf_token() }}"},
                    datatype:'json',
                    success:function(data){
                        $('#sid').empty();
                        $.each(data, function(key,scate){
                            $('#sid').append('<option value='+scate.sid+'>'+ scate.sname +'</option>');
                        });
                    }
                });
            }
            else{
                $('#sid').empty();
            }
        });
    });
  </script>
@endsection