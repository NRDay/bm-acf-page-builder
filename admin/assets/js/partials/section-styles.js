var file_frame;

function getContrastYIQ(hexcolor) {
	var hexcolor = hexcolor.replace('#', ''),
			r = parseInt(hexcolor.substr(0,2),16),
			g = parseInt(hexcolor.substr(2,2),16),
			b = parseInt(hexcolor.substr(4,2),16),
			yiq = ((r*299)+(g*587)+(b*114))/1000;

	return (yiq >= 128) ? 'light' : 'dark';
}

function getOptimalTextColor(hexcolor) {
	return getContrastYIQ(hexcolor) == 'dark' ? '#fff' : '#444';
}

function initialize_section_styles( $el ) {
	
	// initialize container elements and labels
	var backgroundContainerEl = $('.acf-section-styles-padding', $el),
			backgroundContainerLabel = $('label', backgroundContainerEl).first(),
			borderContainerEl = $('.acf-section-styles-border', $el)
			borderContainerLabel = $('label', borderContainerEl).first();

	// initialize label color for background
	var backgroundColorPicker = $('.acf-section-styles-background-color-1', $el),
			backgroundColor = backgroundColorPicker.val(),
			backgroundTextColor = '#444';

	if ( backgroundColor !== '' ) {
		backgroundTextColor = getOptimalTextColor(backgroundColor);
	}

	backgroundContainerLabel.css('color', backgroundTextColor);

	// initialize label color for background
	var backgroundColorPicker2 = $('.acf-section-styles-background-color-2', $el),
			backgroundColor2 = backgroundColorPicker2.val()

	// initialize label color for border
	var borderColorPicker = $('.acf-section-styles-border-color', $el),
			borderColor = borderColorPicker.val(),
			borderTextColor = '#444';

	if ( borderColor !== '' ) {
		borderTextColor = getOptimalTextColor( borderColor );
	}

	borderContainerLabel.css('color', borderTextColor);

	var defaultBorderColor = '#f9f9f9',
			defaultBackgroundColor = '#eeeeee';

	// border color picker
	borderColorPicker.wpColorPicker({
		hide: true,
		change: function(event, ui) {
			var borderContainerEl = $(event.target).parents('.acf-section-styles-container').find('.acf-section-styles-border'),
					borderContainerLabel = $('label', borderContainerEl).first();

			// change the border-color
			borderContainerEl.css( 'background-color', ui.color.toString());

			// if border is dark lighten up the text
			borderContainerLabel.css('color', getOptimalTextColor(ui.color.toString()));
		}
	});

	$('.acf-section-styles-border-color-container .wp-picker-clear', $el).on('click', function() {
		var borderContainerEl = $(this).parents('.acf-section-styles-container').find('.acf-section-styles-border'),
				borderContainerLabel = $('label', borderContainerEl).first();
				borderContainerEl.css( 'background-color', defaultBorderColor);
				borderContainerLabel.css('color', getOptimalTextColor(defaultBorderColor));
	});
	$('.acf-section-styles-background-color-1').minicolors({
		format: "rgb",
		opacity: true,
		change: function(value) {
			backgroundContainerEl = $(this).parents('.acf-section-styles-container').find('.acf-section-styles-padding'),
			backgroundActual = $(this).parents('.acf-section-styles-container').find('.acf-section-styles-background-actual'),
			bg2 = $(this).parents('.acf-section-styles-container').find('.acf-section-styles-background-color-2'),
			bg2Val = $(bg2).val();
	        if ( !$(bg2).val() ) {
				backgroundContainerEl.css('background', 'linear-gradient('+value+','+value+')');
				backgroundActual.val('linear-gradient('+value+','+value+')');
			}
			if ( $(bg2).val() ) {
				backgroundContainerEl.css('background', 'linear-gradient('+value+','+bg2Val+')');
				backgroundActual.val('linear-gradient('+value+','+bg2Val+')');
			}
			$(this).addClass('test');
	    }
	});
	$('.acf-section-styles-background-color-2').minicolors({
		format: "rgb",
		opacity: true,
		change: function(value) {
			backgroundContainerEl = $(this).parents('.acf-section-styles-container').find('.acf-section-styles-padding'),
			backgroundActual = $(this).parents('.acf-section-styles-container').find('.acf-section-styles-background-actual'),
			bg1 = $(this).parents('.acf-section-styles-container').find('.acf-section-styles-background-color-1'),
			bg1Val = $(bg1).val();
	        if ( !$(bg1).val() ) {
				backgroundContainerEl.css('background', 'linear-gradient('+value+','+value+')');
				backgroundActual.val('linear-gradient('+value+','+value+')');
			}
			if ( $(bg1).val() ) {
				backgroundContainerEl.css('background', 'linear-gradient('+bg1Val+','+value+')');
				backgroundActual.val('linear-gradient('+bg1Val+','+value+')');
			}
	    }
	});

	/*function changeBgOne(){
		backgroundContainerEl = $(event.target).parents('.acf-section-styles-container').find('.acf-section-styles-padding'),
		bg2 = $(event.target).parents('.acf-section-styles-container').find('.acf-section-styles-background-color-2'),
		bg2Val = $(bg2).val();
		if ( !$(bg2).val() ) {
			console.log('bg2 = no');
			console.log(chosenColor);
			backgroundContainerEl.css('background', 'linear-gradient('+chosenColor+','+chosenColor+')');
			backgroundImageContainerEl.css('background', 'linear-gradient('+chosenColor+','+chosenColor+')');
		}
		if ( $(bg2).val() ) {
			console.log('bg2 = yes');
			console.log(chosenColor);
			backgroundContainerEl.css('background', 'linear-gradient('+chosenColor+','+bg2Val+')');
			backgroundImageContainerEl.css('background', 'linear-gradient('+chosenColor+','+bg2Val+')');
		}
	}

	function changeBgTwo() {
		backgroundContainerEl = $(event.target).parents('.acf-section-styles-container').find('.acf-section-styles-padding'),
		bg1 = $(event.target).parents('.acf-section-styles-container').find('.acf-section-styles-background-color-1'),
		bg1Val = $(bg1).val();
		if ( !$(bg1).val() ) {
			console.log('bg1 = no');
			console.log(chosenColor);
			backgroundContainerEl.css('background', 'linear-gradient('+chosenColor+','+chosenColor+')');
			backgroundImageContainerEl.css('background', 'linear-gradient('+chosenColor+','+chosenColor+')');
		}
		if ( $(bg1).val() ) {
			console.log('bg1 = yes');
			console.log(chosenColor);
			backgroundContainerEl.css('background', 'linear-gradient('+bg1Val+','+chosenColor+')');
			backgroundImageContainerEl.css('background', 'linear-gradient('+bg1Val+','+chosenColor+')');
		}
	}*/
	$('.acf-section-styles-background-color-container .wp-picker-clear', $el).on('click', function() {
		var backgroundContainerEl = $(this).parents('.acf-section-styles-container').find('.acf-section-styles-padding'),
				backgroundContainerLabel = $('label', backgroundContainerEl).first(),
				backgroundImageContainerEl = $(this).parents('.acf-section-styles-container').find('.acf-section-styles-background-image-preview-container');

		backgroundContainerEl.css('background-color', defaultBackgroundColor);
		backgroundImageContainerEl.css('background-color', defaultBackgroundColor);
		backgroundContainerLabel.css('color', getOptimalTextColor(defaultBackgroundColor));
	});

	// background image select
	$('.acf-section-styles-background-image-select', $el).on('click', function( event ) {

		event.preventDefault();

		var el = $(this);

		var backgroundImageContainerEl = el.parents('.acf-section-styles-background-image-container'),
				backgroundImageInput = $('.acf-section-styles-background-image-input', backgroundImageContainerEl),
				backgroundImagePreview = $('.acf-section-styles-background-image-preview', backgroundImageContainerEl);

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
			backgroundImagePreview.attr('src', attachment.sizes.medium.url);
			sectionParent = backgroundImageContainerEl.parents('.acf-section-styles-container');
			boxModel = sectionParent.find('.acf-section-styles-margin .acf-section-style-param');
			boxModel.addClass('ME');
			backgroundColorselect = sectionParent.find('.acf-section-styles-background-actual');
			backgroundDisplayEl = sectionParent.find('.acf-section-styles-padding')
			console.log(attachment.url);
				backgroundDisplayEl.css('background-image', 'url("' + attachment.url + '")');
		});

		// Finally, open the modal
		file_frame.open();

	});

	// remove background image
	$('.acf-section-styles-background-image-remove', $el).on('click', function( event ) {

		event.preventDefault();

		var backgroundImageContainerEl = $(this).parents('.acf-section-styles-background-image-container'),
				backgroundImageInput = $('.acf-section-styles-background-image-input', backgroundImageContainerEl);

		backgroundImageInput.val('');
		backgroundImageContainerEl.removeClass('has-value');

	});
	
}
	