function setBackgroundInput(element) {
    background          = '';
    background_parallax = '';
    wrapper             = element;
    bgColor1            = wrapper.find('.acf-section-styles-background-color_1').val();
    bgColor2            = wrapper.find('.acf-section-styles-background-color_2').val();
    gradStyle           = wrapper.find('.acf-section-styles-gradient-style').val();
    gradDirection       = wrapper.find('.acf-section-styles-gradient-direction').val();
    bgImage             = wrapper.find('.acf-section-styles-background-image-preview-container img').attr('src');
    bgSize              = wrapper.find('.image-size').val();
    bgStyle             = wrapper.find('.image-style').val();
    bgRepeat            = wrapper.find('.image-repeat').val();
    bgPosVert           = wrapper.find('.background-pos-vert').val();
    bgPosHor            = wrapper.find('.background-pos-hor').val();
    bgImageLayer        = wrapper.find('.image-layer').val();
    bgActual            = wrapper.find('.background-actual');
    bgParallax          = wrapper.find('.background-parallax');
    bgSample            = wrapper.find('.background-sample');

    if (!bgColor1 && !bgColor2)  {
        if (bgImage) {
            if (bgStyle == 'parallax') {
                background += 'url('+bgImage+') center center / cover no-repeat scroll';
                background_parallax = '';
            }
            else {
                if (bgRepeat == 'no-repeat') {
                    background += 'url('+bgImage+')'+bgPosVert+' '+bgPosHor+'/'+bgSize+' '+bgRepeat+' '+bgStyle;
                }
                else {
                    background += 'url('+bgImage+')'+bgRepeat+' '+bgStyle;
                }
                
            }
        }
        bgParallax.val(background_parallax);
        bgActual.val(background);
        bgSample.css('background',background);
    }
    if (bgColor1 && !bgColor2)  {
        gradient = 'linear-gradient('+gradDirection+','+bgColor1+','+bgColor1+')';
       
        if ( bgImage && bgImageLayer == 'below' ) {
            console.log('image below')
            if (bgRepeat == 'no-repeat') {
                background_image = 'url('+bgImage+')'+bgPosVert+' '+bgPosHor+'/'+bgSize+' '+bgRepeat+' '+bgStyle;
            }
            else {
                background_image = 'url('+bgImage+')'+bgRepeat+' '+bgStyle;
            }
            if (bgStyle == 'parallax') {
                background_image = 'url('+bgImage+') center center / cover no-repeat scroll';
                background_parallax = gradient;
            }

            background = gradient+','+background_image;
        } 
        if ( bgImage && bgImageLayer == 'above' ) {
            console.log('image below')
            if (bgRepeat == 'no-repeat') {
                background_image = 'url('+bgImage+')'+bgPosVert+' '+bgPosHor+'/'+bgSize+' '+bgRepeat+' '+bgStyle;
            }
            else {
                background_image = 'url('+bgImage+')'+bgRepeat+' '+bgStyle;
            }
            if (bgStyle == 'parallax') {
                background_image = 'url('+bgImage+') center center / cover no-repeat scroll';
                background_parallax = gradient;
            }
            background = background_image+','+gradient;
        } 

        if (!bgImage) {
            background = gradient;
        }
        bgParallax.val(background_parallax);
        bgActual.val(background);
        bgSample.css('background',background);
        
    }
    if (!bgColor1 && bgColor2)  {
        gradient = 'linear-gradient('+gradDirection+','+bgColor2+','+bgColor2+')';
       
        if ( bgImage && bgImageLayer == 'below' ) {
            console.log('image below')
            if (bgRepeat == 'no-repeat') {
                background_image = 'url('+bgImage+')'+bgPosVert+' '+bgPosHor+'/'+bgSize+' '+bgRepeat+' '+bgStyle;
            }
            else {
                background_image = 'url('+bgImage+')'+bgRepeat+' '+bgStyle;
            }
            if (bgStyle == 'parallax') {
                background_image = 'url('+bgImage+') center center / cover no-repeat scroll';
                background_parallax = gradient;
            }

            background = gradient+','+background_image;
        } 
        if ( bgImage && bgImageLayer == 'above' ) {
            console.log('image below')
            if (bgRepeat == 'no-repeat') {
                background_image = 'url('+bgImage+')'+bgPosVert+' '+bgPosHor+'/'+bgSize+' '+bgRepeat+' '+bgStyle;
            }
            else {
                background_image = 'url('+bgImage+')'+bgRepeat+' '+bgStyle;
            }
            if (bgStyle == 'parallax') {
                background_image = 'url('+bgImage+') center center / cover no-repeat scroll';
                background_parallax = gradient;
            }
            background = background_image+','+gradient;
        } 

        if (!bgImage) {
            background = gradient;
        }
        bgParallax.val(background_parallax);
        bgActual.val(background);
        bgSample.css('background',background);
        
    }

    if (bgColor1 && bgColor2)  {
        gradient = 'linear-gradient('+gradDirection+','+bgColor1+','+bgColor2+')';
       
        if ( bgImage && bgImageLayer == 'below' ) {
            console.log('image below')
            if (bgRepeat == 'no-repeat') {
                background_image = 'url('+bgImage+')'+bgPosVert+' '+bgPosHor+'/'+bgSize+' '+bgRepeat+' '+bgStyle;
            }
            else {
                background_image = 'url('+bgImage+')'+bgRepeat+' '+bgStyle;
            }
            if (bgStyle == 'parallax') {
                background_image = 'url('+bgImage+') center center / cover no-repeat scroll';
                background_parallax = gradient;
            }

            background = gradient+','+background_image;
        } 
        if ( bgImage && bgImageLayer == 'above' ) {
            console.log('image below')
            if (bgRepeat == 'no-repeat') {
                background_image = 'url('+bgImage+')'+bgPosVert+' '+bgPosHor+'/'+bgSize+' '+bgRepeat+' '+bgStyle;
            }
            else {
                background_image = 'url('+bgImage+')'+bgRepeat+' '+bgStyle;
            }
            if (bgStyle == 'parallax') {
                background_image = 'url('+bgImage+') center center / cover no-repeat scroll';
                background_parallax = gradient;
            }
            background = background_image+','+gradient;
        } 

        if (!bgImage) {
            background = gradient;
        }
        bgParallax.val(background_parallax);
        bgActual.val(background);
        bgSample.css('background',background);
        
    }
}
//Colours / Gradient
jQuery('#poststuff').on('input', '.acf-section-styles-gradient-style',function() {
    picker = jQuery(this).closest('.acf-pb-background');
    setBackgroundInput(picker)
});
jQuery('#poststuff').on('input', '.acf-section-styles-gradient-direction',function() {
    picker = jQuery(this).closest('.acf-pb-background');
    setBackgroundInput(picker)
});

//Image
jQuery('#poststuff').on('input', '.image-size',function() {
    picker = jQuery(this).closest('.acf-pb-background');
    setBackgroundInput(picker)
});
jQuery('#poststuff').on('input', '.image-style',function() {
    picker = jQuery(this).closest('.acf-pb-background');
    setBackgroundInput(picker)
});
jQuery('#poststuff').on('input', '.image-repeat',function() {
    picker = jQuery(this).closest('.acf-pb-background');
    setBackgroundInput(picker)
});
jQuery('#poststuff').on('input', '.background-pos-vert',function() {
    picker = jQuery(this).closest('.acf-pb-background');
    setBackgroundInput(picker)
});
jQuery('#poststuff').on('input', '.background-pos-hor',function() {
    picker = jQuery(this).closest('.acf-pb-background');
    setBackgroundInput(picker)
});
jQuery('#poststuff').on('input', '.image-layer',function() {
    picker = jQuery(this).closest('.acf-pb-background');
    setBackgroundInput(picker)
});

//Clear Colours
jQuery('#poststuff').on('mouseup', '.wp-picker-clear',function() {
    picker = jQuery(this).closest('.acf-pb-background');
    setBackgroundInput(picker)
});

// background image select
jQuery('#poststuff').on('click', '.acf-section-styles-background-image-select', function( event ) {
    console.log('IMAGE-SELECT');
    event.preventDefault();

    var el = jQuery(this);

    var backgroundImageContainerEl = el.parents('.acf-section-styles-background-image-container'),
            backgroundImageInput = jQuery('.acf-section-styles-background-image-input', backgroundImageContainerEl),
            backgroundImagePreview = jQuery('.acf-section-styles-background-image-preview', backgroundImageContainerEl);

    file_frame = wp.media.frames.file_frame = wp.media({
        title: acf._e( 'section_styles', 'file_select_title' ),
        button: {
            text: acf._e( 'section_styles', 'file_select_text' )
        },
        library: { type : 'image' },
        multiple: false
    });

    file_frame.on( 'select', function() {
        attachment = file_frame.state().get('selection').first().toJSON();
        backgroundImageInput.val(attachment.id);
        backgroundImageContainerEl.addClass('has-value');
        backgroundImagePreview.attr('src', attachment.url);
        picker = el.closest('.acf-pb-background');
        setBackgroundInput(picker)
    });
    // Finally, open the modal
    file_frame.open();

});

// remove background image
jQuery('#poststuff').on('click', '.acf-section-styles-background-image-remove', function( event ) {
    console.log('IMAGE-remove');
    var el = jQuery(this);

    event.preventDefault();

    var     backgroundImageContainerEl = jQuery(this).parents('.acf-section-styles-background-image-container'),
            backgroundImageInput = jQuery('.acf-section-styles-background-image-input', backgroundImageContainerEl);
            backgroundImagePreview = jQuery('.acf-section-styles-background-image-preview', backgroundImageContainerEl);

    backgroundImageInput.val('');
    backgroundImagePreview.removeAttr('src');
    backgroundImageContainerEl.removeClass('has-value');
    picker = el.closest('.acf-pb-background');
    setBackgroundInput(picker)

});