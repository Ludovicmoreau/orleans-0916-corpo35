$( document ).ready(function() {

    $('.gallery-item').on('click', function() {
        var num_thumbnails = $('.gallery-item').children().length;
        var sr = $(this).children('img').attr('src');
        var clicked_thumbnail_index = $($('.gallery-item')).index(this);
        if(num_thumbnails > 1) {
            $('nav').html('<button type="button" class="previous">Prev</button><button type="button" class="next">Next</button>');
        }

        var caption = $(this).children('img').attr('alt');
        $('#modal-image').attr('src', sr);
        $('h4.modal-image-caption').html(caption);
        $('#myModal').modal('show');

        //***************************
        // Modal Navigation:Next code
        //***************************
        $('button.next').on('click', function() {
            clicked_thumbnail_index += 1;


            if(clicked_thumbnail_index >= num_thumbnails) {
                clicked_thumbnail_index = 0;
            }

            var next_sibling = $('.gallery-item:eq(' + clicked_thumbnail_index + ')').children('img').attr('src');
            $('#modal-image').attr('src', next_sibling);
            var next_caption = $('.gallery-item:eq(' + clicked_thumbnail_index + ')').children('img').attr('alt');
            $('#modal-image').attr('alt', next_caption);
            $('h4.modal-image-caption').html(next_caption);
        });

        //***************************
        // Modal Navigation:Previous code
        //***************************
        $('button.previous').on('click', function() {
            clicked_thumbnail_index -= 1;

            if(clicked_thumbnail_index < 0) {
                clicked_thumbnail_index = (num_thumbnails - 1);
            }

            var next_sibling = $('.gallery-item:eq(' + clicked_thumbnail_index + ')').children('img').attr('src');
            $('#modal-image').attr('src', next_sibling);
            var next_caption = $('.gallery-item:eq(' + clicked_thumbnail_index + ')').children('img').attr('alt');
            $('#modal-image').attr('alt', next_caption);
            $('h4.modal-image-caption').html(next_caption);
        });

    });

});