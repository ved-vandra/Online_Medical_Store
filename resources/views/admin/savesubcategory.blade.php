@extends('layouts.main')

@section('content')
{{-- @dd( $subcategory->sid ); --}}
<div class="row">
    <div class="col-md-12">
    <form id="frmscatecreate" method="post" action="@if(!empty($subcategory)) {{ route('editsubcategory',$subcategory->sid) }} @else {{ route('savesubcategory') }} @endif">
        @csrf
        <table class="table table-dark" style="width: 50%;margin: auto;">
            <tr align="center">
                <td colspan="5">
                    <h4 style="color: white;">CREATE NEW DATA OF SUB-CATEGORY</h4>
                </td>
            </tr>
            <tr>
                <td> SUB-CATEGORY NAME</td>
                <td>
                    <input type="text" name="sname" class="form-control " @if(!empty($subcategory))  value='{{ $subcategory->sname }}'  @endif style="width:180px;" id="sname" >
                </td>
                <td>
                    <label for="sname" class="error" style="color:red;" id="sname-error"></label>
                </td>
            </tr>
            <tr>
                <td> CATEGORY NAME</td>
                    <td><select name="cid" id="cid" style="width:185px;">
                        <option hidden value="">SELECT CATEGORY</option>
                        @foreach ($category as $cat)
                            <option value="{{ $cat->cid }}"@if(!empty($subcategory)) {{$cat->cid == $subcategory->cid  ? 'selected' : ''}} @endif >{{ $cat->cname }}</option>
                        @endforeach
                    </select>
                    </td>
                    <td>
                        <label for="cid" class="error" style="color:red;" id="cid-error"></label>
                    </td>
                </tr>
            </tr>
            <tr>
                <td> SUB-CATEGORY DESCRIPTION</td>
                <td><input type="text" name="sdesc" class="form-control " @if(!empty($subcategory))  value='{{ $subcategory->sdesc }}'  @endif style="width: 180px;" id="sdesc" ></td>
                <td>
                    <label for="sdesc" class="error" style="color:red;" id="sdesc-error"></label>
                </td>
            </tr>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function(){
      $("#frmscatecreate").validate({      
          rules:{
              sname:"required",
              cid:"required",
              sdesc:"required",
          },
          messages:
          {
              sname:"Please enter Sub-Category Name!",
              cid:"please enter Category Name!",
              sdesc:"please enter Sub-Category-Description!",
          },
      });
    });
</script>
@endsection