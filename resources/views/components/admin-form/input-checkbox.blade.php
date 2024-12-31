@props(["name","id","required"=>false,"label","checked"=>false,"disabled"=>false])
<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">{{$label}}</div>
        <input type="checkbox" class="form-control" id="{{$id}}" name="{{$name}}"
               @if($required)
                   required
               @endif
               @if($disabled)
                   disabled
               @endif
               @if($checked)
                   checked
               @endif
        >
        <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
    </div>
</div>
