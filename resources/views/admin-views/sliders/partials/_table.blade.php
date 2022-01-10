@foreach($sliders as $key=>$slider)
    <tr>
        <td>{{$key+1}}</td>
        {{-- <td>
            <span class="media align-items-center">
                <img class="avatar avatar-lg mr-3" src="{{asset('storage/banner')}}/{{$slider['image']}}" 
                        onerror="this.src='{{asset('assets/admin/img/160x160/img2.jpg')}}'" alt="{{$banner->name}} image">
                <div class="media-body">
                    <h5 class="text-hover-primary mb-0">{{$banner['title']}}</h5>
                </div>
            </span>
        <span class="d-block font-size-sm text-body">
            
        </span>
        </td> --}}
        {{-- <td>{{$banner['type']}}</td> --}}
        <td>{{ $slider->title }}</td>
        <td>
            <label class="toggle-switch toggle-switch-sm" for="stocksCheckbox18">
                <input type="checkbox" onclick="location.href='{{route('admin.sliders.status',[$slider['id'],$slider->status?0:1])}}'"class="toggle-switch-input" id="stocksCheckbox18" {{$slider->status?'checked':''}}>
                <span class="toggle-switch-label">
                    <span class="toggle-switch-indicator"></span>
                </span>
            </label>
        </td>
        <td>
            <a class="btn btn-sm btn-white" href="{{route('admin.sliders.edit',[$slider['id']])}}"title="{{__('messages.edit')}} {{__('messages.slider')}}"><i class="tio-edit"></i>
            </a>
            <a class="btn btn-sm btn-white" href="javascript:" onclick="form_alert('slider-{{$slider['id']}}','Want to delete this slider?')" title="{{__('messages.delete')}} {{__('messages.slider')}}"><i class="tio-delete-outlined"></i>
            </a>
            <form action="{{route('admin.sliders.delete',[$slider['id']])}}"
                        method="post" id="slider-{{$slider['id']}}">
                    @csrf @method('delete')
            </form>
        </td>
    </tr>
@endforeach