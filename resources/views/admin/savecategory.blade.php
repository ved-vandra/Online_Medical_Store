@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-12">
    <form id="frmcatcreate" method="post" action="@if(!empty($category)) {{ route('editcategory',$category->cid) }} @else {{ route('savecategory') }} @endif">
        @csrf
        <table class="table table-dark" style="width:55%;margin: auto;">
            <tr align="center">
                <td colspan="5">
                    <h4 style="color: white">CREATE NEW DATA OF CATEGORY</h4>
                </td>
            </tr>
            <tr>
                <td> CATEGORY NAME</td>
                <td>
                    <input type="text" name="cname" @if(!empty($category)) { value={{ $category->cname }} } @endif id="cname" >
                </td>
                <td>
                    <label for="cname" class="error" id="cname-error" style="color: red;"></label>
                </td>
            </tr>
            <tr>
                <td> CATEGORY DESCRIPTION</td>
                <td>
                    <input type="text" name="cdesc" @if(!empty($category)) { value={{ $category->cdesc }} } @endif id="cdesc" >
                </td>
                <td>
                    <label for="cdesc" class="error" id="cdesc-error" style="color: red;"></label>
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
      $("#frmcatcreate").validate({      
          rules:{
              cname:"required",
              cdesc:"required",
          },
          messages:
          {
              cname:"please enter Category Name!",
              cdesc:"please enter Category-Description!",
          }
      });
    });
</script>
@endsection