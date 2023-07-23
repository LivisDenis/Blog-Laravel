function filter() {
    document.getElementById("filterSelect").addEventListener("change", function() {
        localStorage.setItem("selectedFilter", this.value);
    });

    document.addEventListener("DOMContentLoaded", function() {
        const selectedFilter = localStorage.getItem("selectedFilter");
        if (selectedFilter) {
            document.getElementById("filterSelect").value = selectedFilter;
        }
    });
}

filter()
