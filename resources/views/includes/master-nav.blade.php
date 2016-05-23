<div class="master-nav-wide-container">
    <div class="master-nav master-nav-wide hidden-xs hidden-sm">
        <a href="{{url('/')}}" class="master-nav-item u-my-a logo">
            <span>GiftX</span>
        </a>
        <a href="{{url('/groups')}}" class="master-nav-item u-my-a
    {{isset($amn) && $amn == 'groups' ? ' active-master-nav' : ''}}">
            <span>Groups <span class="glyphicon glyphicon-user"></span></span>
        </a>
        <a href="{{url('/messages')}}" class="master-nav-item u-my-a
    {{isset($amn) && $amn == 'messages' ? ' active-master-nav' : ''}}">
            <span>Messages <span class="glyphicon glyphicon-envelope"></span></span>
        </a>
        {{--<a href="#" class="master-nav-item u-my-a--}}
    {{--{{isset($amn) && $amn == 'notifications' ? ' active-master-nav' : ''}}">--}}
            {{--<span>Notifications <span class="glyphicon glyphicon-alert"></span></span>--}}
        {{--</a>--}}
        {{--------------------------------------------}}
        @if(Auth::check())
            <a href="{{url('logout')}}" class="master-nav-item u-my-a u-float-right">
                <span>Logout</span>
            </a>
            <a href="{{url('profile')}}" class="master-nav-item u-my-a u-float-right
    {{isset($amn) && $amn == 'profile' ? ' active-master-nav' : ''}}">
                @include('includes/prof-pic',
                ['filename' => auth()->user()->prof_pic_filename,
                 'class' => $class = 'u-fis3',])
                <span>Hey there, {{auth()->user()->first_name}}!</span>
            </a>
        @endif
    </div>
</div>

<div class="master-nav master-nav-tall visible-xs visible-sm">
    <div class="master-nav-heading">
        <a href="{{url('/')}}" class="u-my-a logo">GiftX</a>
        <span class="glyphicon glyphicon-menu-hamburger u-float-right tap-to-click"
        data-toggle="collapse" href="#master-nav-body-cont" aria-expanded="false" aria-controls="master-nav-body-cont"></span>
    </div>
    <div  class="collapse" id="master-nav-body-cont">
        <div class="master-nav-body">
            <a href="{{url('/groups')}}" class="master-nav-tall-item u-my-a
            {{isset($amn) && $amn == 'groups' ? ' active-master-nav' : ''}}">
                <span>Groups</span>
                <span class="glyphicon glyphicon-user u-float-right"></span>
            </a>
            <a href="{{url('/messages')}}" class="master-nav-tall-item u-my-a
            {{isset($amn) && $amn == 'messages' ? ' active-master-nav' : ''}}">
                <span>Messages</span>
                <span class="glyphicon glyphicon-envelope u-float-right"></span>
            </a>
            {{--<a href="{{url('/notifications')}}" class="master-nav-tall-item u-my-a--}}
            {{--{{isset($amn) && $amn == 'notifications' ? ' active-master-nav' : ''}}">--}}
                {{--<span>Notifications</span>--}}
                {{--<span class="glyphicon glyphicon-alert u-float-right"></span>--}}
            {{--</a>--}}
            <a href="{{url('/profile')}}" class="master-nav-tall-item u-my-a
            {{isset($amn) && $amn == 'profile' ? ' active-master-nav' : ''}}">
                <span>Profile</span>
                <span class="glyphicon glyphicon-cog u-float-right"></span>
            </a>
            <a href="{{url('/logout')}}" class="master-nav-tall-item u-my-a">
                <span>Logout</span>
                <span class="glyphicon glyphicon-log-out u-float-right"></span>
            </a>
        </div>
    </div>
</div>