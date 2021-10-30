<!-- Header -->
<div class="card-header">
    <h5 class="card-header-title">
        <i class="tio-align-to-top"></i> {{trans('messages.top_selling_foods')}}
    </h5>
</div>
<!-- End Header -->

<!-- Body -->
<div class="card-body">
    <div class="row">
        @foreach($top_sell as $key=>$item)
            <div class="col-md-4 col-sm-6 mt-2"
                 onclick="location.href='{{route('vendor.food.view',[$item['food_id']])}}'"
                 style="cursor: pointer;padding-right: 6px;padding-left: 6px">
                <div class="grid-card">
                    <label class="label_1">Sold : {{$item['count']}}</label>
                    <img style="width: 100%;height: 120px"
                         src="{{asset('storage/product')}}/{{$item->food['image']}}"
                         onerror="this.src='{{asset('assets/admin/img/160x160/img2.jpg')}}'"
                         alt="{{$item->food->name}} image">
                    <div class="text-center mt-2">
                        <span class="" style="font-size: 10px">{{$item->food['name']}}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- End Body -->
