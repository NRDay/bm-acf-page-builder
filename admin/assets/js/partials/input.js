@@include('./background-function.js')
@@include('./typography.js')
(function($){
	
	//Modals for Appearance, Responsive Options & Typography
	
	
	if( typeof acf.add_action !== 'undefined' ) {
	
		/*
		*  ready append (ACF5)
		*
		*  These are 2 events which are fired during the page load
		*  ready = on page load similar to $(document).ready()
		*  append = on new DOM elements appended via repeater field
		*
		*  @type	event
		*  @date	20/07/13
		*
		*  @param	$el (jQuery selection) the jQuery element which contains the ACF fields
		*  @return	n/a
		*/
		
		acf.add_action('ready append', function( $el ){
			@@include('./extra-modals.js')

            $('.acf-pb-tabs').tabslet({
                animation: true
            });

            //Typography
            $('#poststuff').on('change', '.values .acf-type-input',function() {
                picker = $(this);
                setTypoInput(picker);
            });
            $( "#poststuff .acf-type-input" ).each(function() {
                picker = $(this);
                setTypoInput(picker);
            });
            $('#poststuff').on('change', '.values .font-size',function() {
                element = $(this);
                addPx(element);
            });
            $( "#poststuff .values .font-size" ).each(function() {
                element = $(this);
                addPx(element);
            });

            $('#poststuff').on('change', '.values .text-shadow input.px-value',function() {
                element = $(this);
                addPxShadow(element);
                setShadow(element)
            });
            $( "#poststuff .values .text-shadow input.px-value" ).each(function() {
                element = $(this);
                addPxShadow(element);
                setShadow(element);
            });
        
            $('#poststuff').on('click', '.values .typo-full-reset',function() {
                element = $(this);
                wrapper = element.parents('.typography-wrapper');
                inputs  = wrapper.find('input');
                selects = wrapper.find('select')
                inputs.each(function(){
                    defaultVal = $(this).data('default');
                    $(this).val(defaultVal).change();
                })
                selects.each(function(){
                    defaultVal = $(this).data('default');
                    $(this).find('option[value="' + defaultVal + '"]').prop('selected', true).change();
                })
            });

        });
		
	} 

})(jQuery);

jQuery(document).ready(function($){
    
    @@include('./columns.js')

    $('.acf-field-setting-display_options input[id$="display_options-all"]').on('change', function() {
        $(this).closest('.acf-checkbox-list').find('input[type="checkbox"]').not(this).prop('checked', true);  
    });
    $('.acf-field-setting-display_options .acf-checkbox-list input[type="checkbox"]').not('input[id$="display_options-all"]').on('change', function() {
        $(this).closest('.acf-checkbox-list').find('input[id$="display_options-all"]').prop('checked', false);  
    });    
});
