<div class="card mt-3 mr-3 float-left" style="width: 30%; max-width: 340px; height: 400px">
    <div class="col-md-12 p-0" style="display: flex; flex-direction: column;">
        <div style="max-height: 55%">
            <img class="card-img-top" src="{{URL::asset('/image/1.jpg')}}"
                 alt="fotka nehnutelnosti"
                 style="background-size: cover">
        </div>
        <div style="max-height: 30%">
            <div class="card-body py-3">
                <h5 class="card-title" style="color: #53526B;">{{ $ad[$i+$j]['description'] }}</h5>
                <p class="card-text" style="color:#BCBCCB; line-height: 1.2em; max-height: 3.6em; overflow:hidden; text-overflow:ellipsis;">{{ $ad[$i+$j]['notes'] }}</p>
            </div>
        </div>
        <div style="max-height: 15%; margin-top: auto; margin-bottom: 1rem">
            <div class="card-body">
                <div id="container" class=" card-body col-md-12 p-0">
                    <div style="float: left;">
                        <a>
                            <span data-feather="heart"></span>
                            &nbsp {{ $ad[$i+$j]['price'] }} EUR
                        </a>
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
</div>