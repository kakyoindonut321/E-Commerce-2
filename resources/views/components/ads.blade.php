@props(['type'])
@if(isset($type))


@switch($type['type'])
    @case(1)
    <div style="height: 360px">
        <div id="slider" class="carousel slide border mx-auto w-50 border" data-bs-ride="carousel">
          <div class="carousel-inner ">
              <div class="carousel-item bg-dark active">
                  <img src="{{ URL::to('/image/iklan/iklan.png') }}" class="d-block w-100" alt="1">
              </div>
              <div class="carousel-item bg-dark">
                  <img src="{{ URL::to('/image/iklan/iklan2.jpg') }}" class="d-block w-100" alt="2">
              </div>
              <div class="carousel-item bg-dark">
                  <img src="{{ URL::to('/image/iklan/iklan3.png') }}" class="d-block w-100" alt="3">
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
          </div>
      </div>
      
      </div>
        @break
        
    @case(2)
        <h3>iklan type kedua</h3>
        @break

    @case(3)
        <h3>iklan type kedua</h3>
        @break

    @default
    <h3>iklan default</h3>
        
@endswitch
@endif