@props(["name","id","required"=>false,"label","value"=>""])

<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">{{$label}}</div>
        <input type="file" class="dropify-fa" data-height="100" data-width="100" data-show-loader="true" name="{{$name}}" id="{{$id}}"
               @if($required)
                   required
            @endif
        >
        @if($value!="")
            <img src="{{asset($value)}}" width="100" height="100">
        @endif
        <div class="input-group-addon"><i class="fa fa-file-image-o"></i></div>
    </div>
</div>



