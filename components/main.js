function confirmDelete(self) {
    var id = self.getAttribute("data-id");
    document.getElementById("delete_value").value = id;
}

function confirmEdit(self) {
    var id = self.getAttribute("data-id");
    var name = self.getAttribute("data-name");
    var parking = self.getAttribute("data-parking");
    var shower = self.getAttribute("data-shower");
    var floor = self.getAttribute("data-floor");
    var images = self.getAttribute("data-images");

    const imageFilename = images.split('/');

    document.getElementById("edit_value").value = id;
    document.getElementById("input_name").value = name;
    document.getElementById("input_parking").value = parking;
    document.getElementById("input_shower").value = shower;
    document.getElementById("input_floor").value = floor;


    console.log(id);
    console.log(name);
    console.log(parking);
    console.log(shower);
    console.log(floor);
    console.log(imageFilename[1]);
}

function viewImage(self) {
    var images = self.getAttribute("data-images");
    document.getElementById("view-image").src = images;
    console.log(images)
}