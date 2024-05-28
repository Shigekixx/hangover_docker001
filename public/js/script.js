document.getElementById("ageLink").addEventListener("click", function(event) {
    event.preventDefault();
    document.getElementById("imageContainer").style.display = "block";
    document.getElementById("displayedImage").src = imageUrl;
});