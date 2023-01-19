var image;
$("#qr-form").on("submit", function (e) {
    e.preventDefault();
    if (image) {
        document.getElementById("download-btn").href = image;
        document.getElementById("download-btn").style.display = "";
    }
});

$("#qr-form").on("change", function (e) {
    e.preventDefault();
    if ($("#url").val()) {
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "/qr/create",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                document.getElementById("image").innerHTML = "<h2>Preview</h2>";
                image = data;
                console.log("success");
                // console.log(data);
                const myImage = new Image(500, 500);
                myImage.src = data;
                document.getElementById("download-btn").href = data;
                document.getElementById("download-btn").style.display = "none";
                document.getElementById("image").appendChild(myImage);
            },
            error: function (data) {
                console.log("error");
                console.log(data);
            },
        });
    }
});
