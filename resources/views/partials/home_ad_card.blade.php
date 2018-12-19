<div class="card mt-3 mr-3 float-left" style="width: 30%; max-width: 340px; height: 350px">
    @if(strcmp($ad[$i+$j]['image_name'],"default") == 0)
        <img src="{{ URL::asset('/image/logo.jpg') }}"
             alt=""
             style="width:100%; height: 50%; object-fit: cover">
    @else
        <img src="{{ URL::asset($path.$ad[$i+$j]['image_name']) }}"
             alt=""
             style="width:100%; height: 50%; object-fit: cover">
    @endif
    <div style="height: 30%">
        <div class="card-body py-3">
            <h5 class="card-title" style="color: #53526B; line-height: 1.2em; max-height: 3.6em; overflow:hidden; text-overflow:ellipsis;">{{ $ad[$i+$j]['description'] }}</h5>
            <p class="card-text" style="color:#BCBCCB; line-height: 1.2em; max-height: 3.6em; overflow:hidden; text-overflow:ellipsis;">{{ $ad[$i+$j]['notes'] }}</p>
        </div>
    </div>
    <div style="height: 15%; margin-top: auto; margin-bottom: 1rem">
        <div class="card-body">
            <div id="container" class=" card-body col-md-12 p-0">
                <div style="float: left;">
                    @if( strcmp($ad[$i+$j]['category'],'prenájom') == 0)
                        <a>
                            <span data-feather="heart"></span>
                            <strong>&nbsp {{ $ad[$i+$j]['price'] }} €/mesiac</strong>
                        </a>
                    @else
                        <a>
                            <span data-feather="heart"></span>
                            <strong>&nbsp {{ $ad[$i+$j]['price'] }} €   </strong>
                        </a>
                    @endif
                </div>
                <div style="float: right; ">
                    <a href="{{ route('show', $ad[$i+$j]['id']) }}"
                       class="btn btn-secondary float-right"
                       style="text-align: center; width: 80px; height: 30px">Viac</a>
                </div>
            </div>
        </div>
    </div>
</div>