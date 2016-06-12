$(document).ready(function () {

    var alert = new Alert("#notifications");

    $('.btn-vote').click(function (e) {
        e.preventDefault();

        var form = $('#form-vote');

        var button = $(this);
        var ticket = button.closest('.ticket');
        var id = ticket.data('id');

        var action = form.attr('action').replace(':id', id);

        button.addClass('hidden');

        console.log(form.serialize());
        $.post(action, form.serialize(), function (response) {
            //alert
            //update count votes
            ticket.find('.btn-unvote').removeClass('hidden');

            alert.success("¡Gracias por tu voto!");

            var votesCount = ticket.find('.votes-count');

            var votos = parseInt(votesCount.text().split(' ')[0]);
            votos++;

            votesCount.text(votos == 1 ? '1 voto': votos + ' votos');
        }).fail(function () {
            //print error messages
            button.removeClass('hidden');

            alert.error("Ocurrió un error :(");
        });

    });
});