<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel Dependent Dropdown  Tutorial With Example</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  </head>
  <body>
    <div class="container">
    <h2>Laravel Dependent Dropdown  Tutorial With Example</h2>
            <div class="form-group">
                <label for="county">Select County:</label>
                <select name="county" class="form-control" style="width:250px">
                    <option value="">--- Select County ---</option>
                    @foreach ($counties as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="town">Select Town:</label>
                <select name="town" class="form-control"style="width:250px">
                <option>--Town--</option>
                </select>
            </div>
      </div>


<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="county"]').on('change',function(){
               var countyID = jQuery(this).val();
               if(countyID)
               {
                  jQuery.ajax({
                     url : 'dropdownlist/gettowns/' +countyID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="town"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="town"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="town"]').empty();
               }
            });
    });
    </script>
  </body>
</html>
