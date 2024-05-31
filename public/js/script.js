document.addEventListener("DOMContentLoaded", function() {
    // imageUrl変数はビューから設定されたものを使用
    var modal = document.getElementById("myModal");
    var modalImage = document.getElementById("modalImage");
    var span = document.getElementsByClassName("close")[0];

    document.getElementById("ageLink").addEventListener("click", function(event) {
        event.preventDefault();
        modal.style.display = "block";
        modalImage.src = imageUrl;
    });

    span.onclick = function() {
        modal.style.display = "none";
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
});
