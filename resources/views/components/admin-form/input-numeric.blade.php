@props(["name","id","required"=>false,"label","min"=>0,"max"=>10000000000,"placeholder"=>"","readonly"=>false,"disabled"=>false,"value"=>""])
<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">{{$label}}</div>
        <input type="number" min="{{$min}}" max="{{$max}}" class="form-control" id="{{$id}}" name="{{$name}}" placeholder="{{$placeholder}}"
               value="{{$value}}"
               @if($readonly)
                   readonly
               @endif
               @if($required)
                   required
               @endif
               @if($disabled)
                   disabled
            @endif
        >
        <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
    </div>
</div>
