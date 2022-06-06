<div class="col">
    <a href="/eventlist?category={{ $category->name }}">
        <div class="card bg-dark text-white" style="width: 16rem">
        <img src="https://source.unsplash.com/254x144?{{ $category->name }}" class="card-img-top" alt="...">
        <div class="card-img-overlay d-flex align-items-center p-0">
            <h5 class="card-title text-center flex-fill fs-2" style="background-color: rgba(0,0,0,0.7)">{{ $category->name }}</h5>
        </div>
        </div>
    </a>
</div>