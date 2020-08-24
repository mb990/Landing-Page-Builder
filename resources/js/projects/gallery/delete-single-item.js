$(document).ready(function () {

    window.deleteProjectGallerySingleItem = function (id, type) {

        console.log('delete gallery item funkcija pokrenuta, pre if-ova');

        console.log('id slike je: ' + id);

        if (type === 'image') {

            $.ajax({

                url: route('project.gallery-image-item-image.delete', id),
                type: 'delete',
                success: function (data) {

                    console.log(data.success);

                    $.ajax({

                        url: route('project.gallery-image-item.delete', id),
                        type: 'delete',
                        success:function (data) {

                            console.log(data.success);
                        }

                    })

                }

            })
        }

        else if (type === 'video') {

            $.ajax({

                url: route('project.gallery-video-item.delete', id),
                type: 'delete',
                success: function (data) {

                    console.log(data.success);
                }

            })

        }

    }

})
