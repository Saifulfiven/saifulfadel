$(document).ready(function(){
    $('#filter-provinsi').on('change', function(){
    let id_provinsi = $(this).val();
    if(id_provinsi){
        jQuery.ajax({
        url: '/searchkabupaten',
        type: "post",
        data: { 
            _token: "{{ csrf_token() }}",
            id_provinsi: id_provinsi 
        },
        success: function(res){
            console.log(res);
            $('#filter-kabupaten').empty();
            $('#filter-kabupaten').append('<option value="" selected>Pilih Kabupaten</option>');
            res.forEach(function(objek, indeks) {
                console.log("Objek ke-" + (indeks + 1) + ":");
                console.log(objek.id);console.log(objek.name);
                $('#filter-kabupaten').append('<option value="'+ objek.id +'">'+ objek.name +'</option>');
            });
        }
    });
    }else{
        $('#filter-kabupaten').empty();
    }
});



function toggleOther(empat_7,empat_lainnya){
    var inp = document.getElementById(empat_lainnya);
    if(empat_7.checked){
        inp.style.display = "block";
        inp.style.opacity = 0;
        inp.style.transition = "opacity 1s";
        requestAnimationFrame(function(){
            inp.style.opacity = 1;
        });
    }else{
        inp.style.opacity = 1;
        inp.style.transition = "opacity 1s";
        requestAnimationFrame(function(){
            inp.style.opacity = 0;
            requestAnimationFrame(function(){
                inp.style.display = "none";
            });
        });
    }

}
toggleOther(document.getElementById('empat_7'),'empat_lainnya');


function toggleOthertiga(dicheck,lainnya){
    var inp = document.getElementById(lainnya);
    if(dicheck.checked){
        inp.style.display = "block";
        inp.style.opacity = 0;
        inp.style.transition = "opacity 1s";
        requestAnimationFrame(function(){
            inp.style.opacity = 1;
        });
    }else{
        inp.style.opacity = 1;
        inp.style.transition = "opacity 1s";
        requestAnimationFrame(function(){
            inp.style.opacity = 0;
            requestAnimationFrame(function(){
                inp.style.display = "none";
            });
        });
    }

}
toggleOthertiga (document.getElementById('dicheck'),'lainnya');
});