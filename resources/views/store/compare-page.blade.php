<div class="compare_specs">
    <table class="table table-striped" id="table" style="width:100%">
        <tr>
            <th colspan="4">So sánh cấu hình</th>
        <tr>
            <th></th>
            <th>
                <img height="100px" src="{{ url('/') }}/public/{{ $products[0]->photos[0]->url }}">
                <p>{{ $products[0]->name }} </p>
            </th>
            <th>
                <img height="100px" src="{{ url('/') }}/public/{{ $products[1]->photos[0]->url }}">
                <p>{{ $products[1]->name }} </p>
            </th>
            <th>
                <img height="100px" src="{{ url('/') }}/public/{{ $products[2]->photos[0]->url }}">
                <p>{{ $products[2]->name }} </p>
            </th>
        </tr>
        <tr>
            <th>Giá thành</th>
            <th class="price">{{ number_format($products[0]->price) }}đ</th>
            <th class="price">{{ number_format($products[1]->price) }}đ</th>
            <th class="price">{{ number_format($products[2]->price) }}đ</th>
        </tr>
        <tr>
            <th>Màn hình</th>
            <th>{{ $products[0]->display }} </th>
            <th>{{ $products[1]->display }} </th>
            <th>{{ $products[2]->display }} </th>
        </tr>
        <tr>
            <th>OS</th>
            <th>{{ $products[0]->os }} </th>
            <th>{{ $products[1]->os }} </th>
            <th>{{ $products[2]->os }} </th>
        </tr>
        <tr>
            <th>Camera sau</th>
            <th>{{ $products[0]->bcam }} </th>
            <th>{{ $products[1]->bcam }} </th>
            <th>{{ $products[2]->bcam }} </th>
        </tr>
        <tr>
            <th>Camera trước</th>
            <th>{{ $products[0]->fcam }} </th>
            <th>{{ $products[1]->fcam }} </th>
            <th>{{ $products[2]->fcam }} </th>
        </tr>
        <tr>
            <th>CPU</th>
            <th>{{ $products[0]->cpu }} </th>
            <th>{{ $products[1]->cpu }} </th>
            <th>{{ $products[2]->cpu }} </th>
        </tr>
        <tr>
            <th>GPU</th>
            <th>{{ $products[0]->gpu }} </th>
            <th>{{ $products[1]->gpu }} </th>
            <th>{{ $products[2]->gpu }} </th>
        </tr>
        <tr>
            <th>RAM</th>
            <th>{{ $products[0]->ram }} </th>
            <th>{{ $products[1]->ram }} </th>
            <th>{{ $products[2]->ram }} </th>
        </tr>
        <tr>
            <th>Bộ nhớ trong</th>
            <th>{{ $products[0]->storage }} </th>
            <th>{{ $products[1]->storage }} </th>
            <th>{{ $products[2]->storage }} </th>
        </tr>
        <tr>
            <th>Thẻ nhớ</th>
            <th>{{ $products[0]->sd }} </th>
            <th>{{ $products[1]->sd }} </th>
            <th>{{ $products[2]->sd }} </th>
        </tr>
        <tr>
            <th>SIM</th>
            <th>{{ $products[0]->sim }} </th>
            <th>{{ $products[1]->sim }} </th>
            <th>{{ $products[2]->sim }} </th>
        </tr>
        <tr>
            <th>Pin</th>
            <th>{{ $products[0]->battery }} </th>
            <th>{{ $products[1]->battery }} </th>
            <th>{{ $products[2]->battery }} </th>
        </tr>
        <tr>
            <th>Kết nối</th>
            <th>{{ $products[0]->connect }} </th>
            <th>{{ $products[1]->connect }} </th>
            <th>{{ $products[2]->connect }} </th>
        </tr>
        <tr>
            <th>Kích thước</th>
            <th>{{ $products[0]->weight }} </th>
            <th>{{ $products[1]->weight }} </th>
            <th>{{ $products[2]->weight }} </th>
        </tr>			
    </table>
</div>