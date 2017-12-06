function setTypoInput(element) {
	wrapper 		= element.parents('.typography-wrapper');
	selector 		= element.data("preview");
	selector 		= '.'+element.data("preview");
	style 			= element.data("style");
	value 			= element.val();
	previewElement 	= wrapper.find(selector);
	previewElement.css(style,value);
}

function addPx(element) {
    currentVal = element.val();
    if ( element.val().slice(-2) !== 'px' ) {
    	newVal = (currentVal + 'px');
        element.val( newVal ) ;
        setTypoInput(element);
    }
}

function addPxShadow(element) {
    currentVal = element.val();
    if ( element.val().slice(-2) !== 'px' ) {
    	newVal = (currentVal + 'px');
        element.val( newVal );
    }
    if ( element.val().slice(1) == 'p' ) {
    	newVal = ('0'+'px');
        element.val( newVal );
    }
}

function setShadow(element) {
	group 			= element.parents('.row');
	wrapper 		= element.parents('.typography-wrapper');
	hValue 			= group.find('.acf-section-styles-text-shadow-h').val();
	vValue 			= group.find('.acf-section-styles-text-shadow-v').val();
	bValue 			= group.find('.acf-section-styles-text-shadow-blur').val();
	cValue 			= group.find('.acf-section-styles-text-shadow-color').val();
	actualValue 	= group.find('.acf-section-styles-text-shadow-actual');
	selector 		= element.data("preview");
	selector 		= '.'+element.data("preview");
	value 			= hValue+' '+vValue+' '+bValue+' '+cValue;
	previewElement 	= wrapper.find(selector);
	previewElement.css(style,value);
	actualValue.val(value);
}

function removeStyle(style){
    var search = new RegExp(style + '[^;]+;?', 'g');
    return this.each(function(){
        $(this).attr('style', function(i, style){
            return style.replace(search, '');
        });
    });
}
