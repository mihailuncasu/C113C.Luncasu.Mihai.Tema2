<div class="container">
    <!-- Contact -->
    <div class="marginable">
        <h3>Contact info:</h3>
        <p><strong>Email: </strong>contact@pescarie.com </br>
            <strong>Telefon: </strong>+40 716 172 </br>
            <strong>Adresa postala: </strong>Strada Verii 14, Bucuresti</p> </br>
        <div id="googleMap" style="width:100%;height:400px"></div>
        <!-- Message box -->
        <div class="form-group">
            <label>Contacteaza-ne:</label>
            <textarea class="form-control" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-secondary">Send</button>
    </div>
</div>

<script>
    function myMap() {
        var mapProp = {
            center: new google.maps.LatLng(51.508742, -0.120850),
            zoom: 5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfHgNkKORH8SJjQwbZraB1yK26VMNpjSw&callback=myMap"></script>
