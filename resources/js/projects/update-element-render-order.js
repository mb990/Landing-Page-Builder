$(document).ready(function () {

    window.updateProjectElementRenderOrderValue = function (e, orderValue, elementId) {

        e.preventDefault();

        $.ajax({

            url: route('project.page-element.update', elementId),
            data: {
                render_order: orderValue
            },
            type: 'put'

        }).done(function (data) {

            console.log(data);

        })

    }

})
