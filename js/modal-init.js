(function() {
    var $content = $('#ud-modal').detach();     //remove modal

    
    $('#ud-update-booking').on('click', function() {
        modal.open({content: $content, width:300, height:500});
        //w:340,h:300
        $('#body').css({
            "opacity": "0.1",
            "background-color": "green"
        });

        
        //grap id from hidden button
        var $id = $('#id-holder').attr('value');
        
        //insert id value to ud form using hidden button
        $('#modal-ud-id').attr('value', $id);
    });
    
}());