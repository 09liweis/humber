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
            }
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
            }
        });
    }
    
    function renderMsgs(messages) {
        var msgs = '';
        messages.map(function(msg) {
            msgs += '<div class="row">' +
                        '<div class="pull-left col-md-12">' +
                            '<h4>' + msg.username + '</h4>' +
                            '<p>' + msg.content + '</p>' +
                        '</div>' +
                    '</div>';
        });
        return msgs;
    }
    
});