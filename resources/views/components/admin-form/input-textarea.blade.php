@props(["name","id","required"=>false,"label","readonly"=>false,"disabled"=>false,"value"=>"","direction"=>"rtl"])
<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">{{$label}}</div>
        <textarea type="number"  class="form-control" id="{{$id}}" name="{{$name}}" dir="{{$direction}}"
               @if($readonly)
                   readonly
               @endif
               @if($required)
                   required
               @endif
               @if($disabled)
                   disabled
            @endif
        >{{$value}}</textarea>
        <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
    </div>
</div>
