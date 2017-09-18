popTriggers = $('.acf-pb-options-modal-triggers a');
$(popTriggers).click(function(e) {
	e.preventDefault();
	popUp = $(this).attr('href');
	currentPop = $(this).closest('.acf-field').find(popUp);
	$(currentPop).addClass('modal-active');
	if ( !$('.pb-modal-underlay').hasClass('modal-active') ) {
		$('.pb-modal-underlay').addClass('modal-active');
	}
	if ( !$('body').hasClass('modal-active') ) {
		$('body').addClass('modal-active');
	}
});
$('.tb-close-icon').click(function(e){
	$(this).closest('.acf-pb-options-modal').removeClass('modal-active');
	activeModal = $('#poststuff').find('.modal-active');
	if ( ! $('#poststuff').find('.column-modal-open').length ) {
		$('.pb-modal-underlay').removeClass('modal-active');
		$('body').removeClass('modal-active');
	}
});