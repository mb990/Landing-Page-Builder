$(document).ready(function () {

    window.getElementSettingsData = function (e, elementId) {

        e.preventDefault();

        $.ajax({

            url: route('project.page-element.show', elementId),
            type:'get',
            success: function (data) {

                console.log(data);

                setFooterSettingsValues(data);
                setNewsletterSettingsValues(data);
                setGeneralContentThreeSettingsValues(data);
            }

        })

    }

})
