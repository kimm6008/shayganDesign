<x-admin-form.navbar-header :multilang="false" />
<div class="tab-content">
    <x-admin-form.fa-tab-view>
        <x-slot:headerData>
            <th>عنوان محصول</th>
            <th>از تاریخ</th>
            <th>تا تاریخ</th>
            <th>ارز</th>
            <th>قیمت</th>
        </x-slot:headerData>
        <x-slot:bodyData>
            @foreach($product_prices as $product_price)
                <tr>
                    <td>{{$product_price['product_name']}}</td>
                    <td>{{$product_price['fromDate']}}</td>
                    <td>{{$product_price['toDate']}}</td>
                    <td>{{$product_price['currency']}}</td>
                    <td>{{number_format($product_price['price'])}}</td>

                </tr>
            @endforeach
        </x-slot:bodyData>
    </x-admin-form.fa-tab-view>

</div>
