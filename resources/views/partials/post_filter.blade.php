<form action="{{ route($postRoute) }}" method="get">
    <div class="join">
        <input class="input input-bordered join-item" name="query" placeholder="Search" />
        <select class="select select-bordered join-item uppercase" name="filter" id="filterSelect">
            <option disabled selected>Фильтровать по:</option>
            <option value="title">title</option>
            <option value="preview">preview</option>
        </select>
        <div class="indicator">
            <button type="submit" class="btn join-item">Поиск</button>
        </div>
    </div>
</form>
