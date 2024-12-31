@props(["name","id","required"=>false,"label"])

<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">{{$label}}</div>
        <input type="file" class="form-control " name="{{$name}}" id="{{$id}}"
               @if($required)
                   required
            @endif
        >
        <div class="input-group-addon"><i class="fa fa-file-image-o"></i></div>
    </div>
</div>



