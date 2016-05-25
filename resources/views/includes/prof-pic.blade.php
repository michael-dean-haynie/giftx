@if(file_exists('img/profile/'.$filename))
    <img src="{{asset('img/profile/'.$filename)}}"
         alt="Profile Picture" class="img-rounded {{$class}}"
            {{isset($id) ? 'id=' . $id . '' : ''}}>
@else
    <img src="{{asset('img/profile/default.png')}}"
         alt="Profile Picture" class="img-rounded {{$class}}"
            {{isset($id) ? 'id=' . $id . '' : ''}}>
@endif
