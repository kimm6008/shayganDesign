<form method="post" action="{{route('ProductPrices.store')}}">
    @csrf
    <input type="hidden" name="pid" value="{{$pid}}">
    <x-admin-form.input-text id="persian_from_date"  name="persian_from_date" label="از تاریخ" faicon="fa-star"  :required="true"/>
    <x-admin-form.input-text id="persian_to_date" name="persian_to_date" label="تا تاریخ" faicon="fa-star" :required="false"/>
    <x-admin-form.input-combo-box id="currency_id" name="currency_id" :info="$currency" :required="true"
                                  label="ارز"  data_caption="name" faicon="fa-dollar" />
    <x-admin-form.input-text id="price" name="price" label="قیمت"  faicon="fa-star" :required="true"/>
    <x-admin-form.submit-button />
</form>
