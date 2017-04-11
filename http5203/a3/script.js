setInterval(function() {
    getMessages();
}, 1000);
$(document).ready(function() {
    getMessages();

    $('#submitmsg').on('submit', function(e) {
        e.preventDefault();
        var content = $('#content').val();
        $.ajax({
            url: 'getMessage.php',
            method: 'POST',
            data: {content: content},
            dataType: 'json',
            success: function(messages) {
                $('#content').val('');
                var msgs = renderMsgs(messages);
                $('#messages').html(msgs);
                scrollToBottom();
            }
        });
    });
});

function getMessages() {
    $.ajax({
        url: 'getMessage.php',
        method: 'GET',
        dataType: 'json',
        success: function(messages) {
            var msgs = renderMsgs(messages);
            $('#messages').html(msgs);
            scrollToBottom();
        }
    });
}

function renderMsgs(messages) {
    var msgs = '';
    messages.map(function(msg) {
        msgs += '<div class="row">' +
                    '<div class="col-md-12">' +
                        '<div class="pull-left message row">' +
                            '<div class="inline-block">' +
                                '<img src="' + msg.profileimage + '" />' +
                            '</div>' +
                            '<div class="inline-block">' +
                                '<p class="content">' + msg.content + '</p>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</div>';
    });
    return msgs;
}

function scrollToBottom() {
    var wtf = $('#messages');
    var height = wtf[0].scrollHeight;
    wtf.scrollTop(height);
}