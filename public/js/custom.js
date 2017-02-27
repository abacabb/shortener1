$(function () {
    var form = $('#short-url-form');
    var alertElement = form.find('div.alert-danger'),
        successElement = form.find('div.alert-success');

    form.find('button').on('click', function (event) {
        event.preventDefault();

        alertElement.hide();
        successElement.hide();

        $.ajax({
            'url': '/api/short_url',
            'method': 'POST',
            'data': {
                'url': form.find('input.short-url').val()
            },
            'dataType': 'json'
        }).done(function (data) {
            if (data['code'] != 200) {
                alertElement.text(data['error']).show();
            } else {
                successElement.text(data['short_url']).show();
            }
        }).fail(function () {
            alertElement.text('Plz try later!').show();
        });
    });
});