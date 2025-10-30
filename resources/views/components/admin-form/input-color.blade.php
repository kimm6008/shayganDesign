@props(["name","id","required"=>false,"label","placeholder"=>"","readonly"=>false,"disabled"=>false
,"value"=>"","faicon","direction"=>"rtl"])

<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">{{$label}}</div>
        <input type="color"  class="form-control" id="{{$id}}" name="{{$name}}" placeholder="{{$placeholder}}" value="{{$value}}"
               dir="{{$direction}}"
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
        <div class="input-group-addon"><i class="fa {{$faicon}}"></i></div>
    </div>
</div>
