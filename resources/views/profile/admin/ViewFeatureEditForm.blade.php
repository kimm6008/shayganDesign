<form action="{{route("Feature.update",$feature->id)}}" method="post" >
    @csrf
    @method('put')
    @foreach($languages as $value)
        <x-admin-form.input-text id="{{$value->lang_code}}_name" name="{{$value->lang_code}}_name"
                                 label="عنوان مشخصه({{$value->lang_name}})"
                                 placeholder="" value="{{$feature->feature_with_lang_filter($value->id)->first()->name}}" direction="{{$value->lang_dir}}"
                                 :required="true" :readonly="false" :disabled="false" faicon="fa-star"/>
    @endforeach
    <x-admin-form.input-checkbox id="isColor" :checked="$feature->isColor" name="isColor" label="ویژگی از نوع رنگ است" />
    <x-admin-form.submit-button/>
</form>
