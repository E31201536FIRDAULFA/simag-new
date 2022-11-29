
    $('#absen').click(() => {
        $.post(
            '/dashboard/peserta/tambah/absen',
            (data) => {
                console.log(data)
            }
        )
    })
    
            var x = document.getElementById("lokasi");

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            function showPosition(position) {
                $.post(
                    '/dashboard/peserta/tambah/lokasi', {
                        latitude: position.coords.latitude,
                        longitude: position.coords.longitude
                    },
                    (data) => {
                        console.log(data)
                    }
                )
            }

    function isbeetweentwotime(startTime, endTime) {
        var d = new Date();
        var n = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
        if (n >= startTime && n <= endTime) {
            return true;
        } else {
            return false;
        }
    }

    dataAbsen = {}
    setInterval(() => {
        $.get(
            '/dashboard/peserta/data/absen' , 
            (data) => {
                if(data){
                    if(JSON.stringify(data) == JSON.stringify(globalThis.dataAbsen)){
                        return;
                    }else{
                        globalThis.dataAbsen = data
                        $('#start-time').html(data['datang'])
                        $('#end-time').html(data['pulang'])        
                    }
                }else{
                        $('#start-time').html(data['datang'])
                        $('#end-time').html(data['pulang'])
                        $('#message').html('Anda sudah absen')
                }
            }
        )
    }, 1000);