// $(document).ready(function(){
//     let keyword = document.getElementById('keyword');
//     keyword.addEventListener('keyup', function() {
        
//     });
// });

$(document).ready(function(){
    $('#tombol-cari').hide();

    $('#keyword').on('keyup', function() {
        $('.loading').show();

        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {
            $('#container').html(data);
            $('.loading').hide();
        });
    });
});