//Add Modal Unerlay used for column and layout modal.
$('#wpwrap').append('<div class="pb-modal-underlay"></div>');

//Function to split fields into columns.
$.fn.chunk = function(size) {
    var arr = [];
    for (var i = 0; i < this.length; i += size) {
        arr.push(this.slice(i, i + size));
    }
    return this.pushStack(arr, "chunk", size);
}
//Split clones.
$('#page-builder > .acf-input > .acf-flexible-content > .clones > .layout > .acf-fields > .acf-field').not('[data-name="section_styles"]').chunk(2).wrap( '<div class="pb-column"><div class="pb-column-inner"></div></div>' );

//Split existing fields.
$('#page-builder > .acf-input > .acf-flexible-content > .values > .layout > .acf-fields > .acf-field').not('[data-name="section_styles"]').chunk(2).wrap( '<div class="pb-column"><div class="pb-column-inner"></div></div>' );

//Select cols to wrap
columnsToWrap   = $('.pb-column');

//Wrap them
$(columnsToWrap).each(function () {
    //Get saved/default col sizes
    colSize = $(this).find('.acf-responsive-options-desk-size-container > select option:selected');
    //Wrap them
    $(this).wrap( '<div class="col-desk-'+$(colSize).text()+'"></div>' );
});

//Define header and footer
header          = '<div class="pb-modal-header"><div class="modal-close"><span class="screen-reader-text">Close</span><span class="tb-close-icon"></span></div></div></div>'
footer          = '<div class="pb-modal-footer"><div class="pb-modal-button"><a class="acf-button button button-primary prev-column" href="#">Prev Column</a></div><div class="pb-modal-button"><a class="acf-button button button-primary next-column" href="#">Next Column</a></div></div>'

//Add header and footer to all columns
$('.pb-column').prepend(header);
$('.pb-column').append(footer);

//Add Column Number
colsParent = $('.acf-fields [class^="col-desk-"]').parent();
$(colsParent).each(function(index,obj) {
    cols = $(obj).find('.pb-column .pb-modal-header');
    $(cols).each(function(index){
        colNumber = index+1
        $(this).prepend('<div class="cols-number">Column '+colNumber+'</div>');
    })
});
colInner = $('.pb-column');

//Collapse all FC Layouts
$('[data-name$="elements_elements"] > .acf-input > .acf-flexible-content > .values > .layout').addClass('-collapsed');

//Add the "Edit Column" button to all cols.
$('[data-name$="elements_elements"]').append('<div class="pb-modal-button"><a class="acf-button button button-primary pb-edit-button" href="#"">Edit Column</a></div>');

//Function to close Column Modal
function closeColumnModal() {
    $('.pb-column').removeClass('column-modal-open');
    $('body').removeClass('modal-active');
    $('.pb-modal-underlay').removeClass('modal-active');
    $('.pb-column').find('[data-name$="elements_elements"] .values .layout').addClass('-collapsed');
}

//Function to initiate Column Modal
function initColumnModal() {
    //CLose any existing column modals
    closeColumnModal();
    //Display column in modal
    $('.pb-modal-underlay').addClass('modal-active');
    $('body').addClass('modal-active');
    $(currentColumn).addClass('column-modal-open');
    $(currentColumn).css('opacity','0');
    $(currentColumn).animate({
        opacity: 1
      }, 400, function() {
        // Animation complete.
    });

    //Un-collapse the FC Layputs
    //$(currentColumn).find('[data-name$="elements_elements"] > .acf-input > .acf-flexible-content > .values > .layout').removeClass('-collapsed');
    
    //Show/hide prev/next button as required.
    if ( ! $(currentColumn).closest('[class^="col-desk"]').prev('[class^="col-desk"]').length) {
        $(currentColumn).find('.prev-column').hide();
    }; 
    if ( ! $(currentColumn).closest('[class^="col-desk"]').next('[class^="col-desk"]').length) {
        $(currentColumn).find('.next-column').hide();
    }; 
}

//Fire Colum Modal
$('#poststuff').on('click','.pb-edit-button', function(e){
    //Vars
    currentColumn       = $(this).closest('.pb-column');
    initColumnModal();
});

//Prev/Next
$('#poststuff').on('click','.prev-column', function(e){
    //Vars
    activeColumn            = $(this).closest('.pb-column');
    activeColWrapper        = $(activeColumn).closest('[class^="col-desk"]');
    currentColumn           = $(activeColWrapper).prev().find('.pb-column');
    initColumnModal();
});
$('#poststuff').on('click','.next-column', function(e){
    //Vars
    activeColumn            = $(this).closest('.pb-column');
    activeColWrapper        = $(activeColumn).closest('[class^="col-desk"]');
    currentColumn           = $(activeColWrapper).next().find('.pb-column');
    initColumnModal();
});

//Close Modal
$('#poststuff').on('click','.column-modal-open .pb-modal-header>.modal-close .tb-close-icon', function(e){
    closeColumnModal();
});

//Helper function to set the columns for large screen meta.
function largeColSet() {
    $('[data-name$="options_size_on_large_screens"]').each(function(){
        $(this).find('.acf-input').hide();
        largeColSize = $(this).find('.acf-input select option:selected').text();
        $(this).append('<span><strong><span class="col-size">'+largeColSize+'</span> Columns</strong></span>');
    });
}
largeColSet();

//Helper function to set the columns for large screen meta when columns are dragged.
function largeColUpdate() {
    $('[data-name$="options_size_on_large_screens"]').each(function(){
        $(this).find('.acf-input').hide();
        largeColSize = $(this).find('.acf-input select option:selected').text();
        $(this).find('.col-size').text(largeColSize);
    });
}
//Do the dragging and class changing.
$('#poststuff').on('mouseenter','[data-layout^="page_builder_columns"] > .acf-fields', function(e){
    var setrow = $(this);
    setrow.children('[class^="col-desk-"]').not(':first').prepend('<div class="column-merge"></div>');
    var single = setrow.parent().width()/12-1;
    setrow.children('[class^="col-desk-"]').each(function(k,v){
        var column = $(v)
        var width = column.width()/2-5;
    });
    $( ".column-merge" ).draggable({
        axis: "x",
        helper: "clone",
        appendTo: setrow,
        grid: [single, 0],
        drag: function(e, ui){
            $(this).addClass('dragging');
            var column = $(this).parent(),
                dragged = ui.helper,
                direction = (ui.originalPosition.left > dragged.position().left) ? 'left' : 'right',
                step = 0,
                prev = column.prev(),
                single = Math.round(column.parent().width()/12-10),
                distance = Math.abs(ui.originalPosition.left - dragged.position().left);                
            column.parent().addClass('sizing');
            if(distance >= single){
                var left        = prev.attr('class').split('-'),
                    right       = column.attr('class').split('-');

                left[2]     = parseFloat(left[2]);
                right[2]    = parseFloat(right[2]);

                if(direction === 'left'){
                    left[2]--;
                    right[2]++;
                    if(left[2] > 0 && left[2] < (left[2]+right[2]) ){
                        prev.attr('class', left.join('-'));
                        column.attr('class', right.join('-'));
                        ui.originalPosition.left = dragged.position().left;
                    }else{
                        $(this).draggable( "option", "disabled", true );
                    }
                }else{
                    left[2]++;
                    right[2]--;
                    if(right[2] > 0 && right[2] < (right[2]+right[2]) ){
                        prev.attr('class', left.join('-'));
                        column.attr('class', right.join('-'));
                        ui.originalPosition.left = dragged.position().left;
                    }else{
                        $(this).draggable( "option", "disabled", true );
                    }

                }
            }
        },
        stop: function(){
            $(this).removeClass('dragging').parent().parent().removeClass('sizing');
            newClass = $(this).parent().attr('class');
            selectVal = newClass.replace(/\D/g,'');
            $(this).parent().find('.acf-responsive-options-desk-size-container > select').val(selectVal,selectVal);
            console.log('new class = '+newClass);
            console.log('select val = '+selectVal);
            newPrevClass = $(this).parent().prev().attr('class');
            newSelectVal = newPrevClass.replace(/\D/g,'');
            $(this).parent().prev().find('.acf-responsive-options-desk-size-container > select').val(newSelectVal,newSelectVal);
            console.log('new prev class = '+newPrevClass);
            console.log('prev select val = '+newSelectVal);
        }
    });
});

$('#poststuff').on('mouseleave','[data-layout^="page_builder_columns"] > .acf-fields', function(e){
    $('.column-merge').remove();
});

$('#poststuff').on('change', '.values .typo-default-switcher select',function() {
    console.log('clicked');
    options = $(this).parents('.acf-pb-section-inner').next('.acf-pb-section-inner').toggleClass('disabled');
});
$('#poststuff').on('input', '.pb-control-group input',function() {
    if ($(this).closest('ul.pb-control-group').hasClass('linked')) {
        $(this).closest('ul.pb-control-group').find('input').val(this.value);
    }
});

$('#poststuff').on('click', '.control-button', function() {
    $(this).toggleClass('linked');
    $(this).closest('ul.pb-control-group').toggleClass('linked');
});