<div class="row u-pad1">
    <div class="col-xs-4 u-tal u-red-text u-bold">
        Unloved
    </div>
    <div class="col-xs-4 u-tac">
        {{$amtLoved}}%
    </div>
    <div class="col-xs-4 u-tar u-green-text u-bold">
        Loved
    </div>
    <div class="col-xs-12">
        <div class="progress">
            <div class="progress-bar progress-bar-striped active
            progress-bar-{{$amtLoved > 70 ? 'success' : ($amtLoved > 50 ? 'info' : ($amtLoved > 30 ? 'warning' : 'danger'))}}"
            role="progressbar" aria-valuenow="{{$amtLoved}}"
            aria-valuemin="0" aria-valuemax="100" style="{{'width:'.$amtLoved}}%"></div>
        </div>
    </div>
</div>