let image = document.getElementById("emptyHeart");
image.addEventListener("click", function(){
	if (image.src = "./assets/images/emptyHeart.svg")
	{
		image.src = "./assets/images/fullHeart.svg";
	}
	else
	{
		image.src = "./assets/images/emptyHeart.svg";
		image.style.width = "51px";
		image.style.height = "51px";
	}
});