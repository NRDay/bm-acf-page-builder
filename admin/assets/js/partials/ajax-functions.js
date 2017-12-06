function getThemePalette() {

    $.ajax({
        url: my-plugin.ajax_url,
        type: 'POST',
        data: {
            'user_input': user_input_last
        },
        success:function(data) {
            console.log(data);
        },
        error: function(errorThrown){
            console.log(errorThrown);
        }
    });

};