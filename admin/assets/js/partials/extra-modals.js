popTriggers = $('.acf-pb-options-modal-triggers a');
$(popTriggers).click(function(e) {
	e.preventDefault();
	popUp = $(this).attr('href');
	currentPop = $(this).closest('.acf-field').find(popUp);
	parentColumn = $(this).closest('.pb-column');
	$(currentPop).addClass('modal-active');
	if ( !$(this).closest('.acf-pb-options-modal-triggers').find('.option-modal-underlay').hasClass('modal-active') ) {
		$(this).closest('.acf-pb-options-modal-triggers').find('.option-modal-underlay').addClass('modal-active');
	}
	if ( !$('body').hasClass('modal-active') ) {
		$('body').addClass('modal-active');
	}
	if ( !$(parentColumn).hasClass('child-modal-active') ) {
		$(parentColumn).addClass('child-modal-active');
	}
	sectionStyles = $(this).closest('.acf-pb-options-modal-triggers').next('.acf-section-styles-container');

	sectionStyles.find('.acf-type-input' ).each(function() {
        picker = $(this);
        setTypoInput(picker);
    });
	
	sectionStyles.find('.acf-section-styles-border-color').wpColorPicker();
	
	sectionStyles.find('.bm-pb-typo-color.acf-section-styles-text-shadow-color').wpColorPicker({
		palettes: $palettes,
		change: function(event, ui) {
			
		    picker = $(this);
		    setShadow(picker)
		}
	});
	sectionStyles.find('.bm-pb-typo-color').wpColorPicker({
	    palettes: $palettes,
	    change: function(event, ui) {
	    	
	        picker = $(this);
	        setTypoInput(picker)
	    }
	});

	sectionStyles.find('.acf-section-styles-background-color_1').wpColorPicker({
	    palettes: $palettes,
	    change: function(event, ui) {
	    	
	        picker = $(this).closest('.acf-pb-background');
    		setBackgroundInput(picker)
	    }
	});

	sectionStyles.find('.acf-section-styles-background-color_2').wpColorPicker({
	    palettes: $palettes,
	    change: function(event, ui) {
	    	
	        picker = $(this).closest('.acf-pb-background');
    		setBackgroundInput(picker)
	    }
	});

	$bg_section = sectionStyles.find('.acf-pb-background');
	setBackgroundInput($bg_section);

});
$('.tb-close-icon').click(function(e){
	$(this).closest('.acf-pb-options-modal').removeClass('modal-active');
	$('.option-modal-underlay').removeClass('modal-active');
	activeModal = $('#poststuff').find('.modal-active');
	parentColumn = $(this).closest('.pb-column');
	$(parentColumn).removeClass('child-modal-active');
	if ( ! $('#poststuff').find('.column-modal-open').length ) {
		$('.option-modal-underlay').removeClass('modal-active');
		$('body').removeClass('modal-active');
	}
});