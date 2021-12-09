function inserirmarcador (lat,long)
    {
        lat = $latitude;
        long = $longitude;
        
    var marcador = L.marker([lat, long], { icon: myIcone, draggable:false });
    //adicionar PopUp
    //var popup = marcador.bindPopup('Coordenadas ' + marcador.getLatLng()).openPopup();
    marcador.addTo(map);

    console.log(marcador.toGeoJSON());
    
}
