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
$('#page-builder > .acf-input > .acf-flexible-content > .clones > .layout > .acf-fields > .acf-field').not('.acf-field-section-styles').chunk(2).wrap( '<div class="pb-column"><div class="pb-column-inner"></div></div>' );

//Split existing fields.
$('#page-builder > .acf-input > .acf-flexible-content > .values > .layout > .acf-fields > .acf-field').not('.acf-field-section-styles').chunk(2).wrap( '<div class="pb-column"><div class="pb-column-inner"></div></div>' );

/*//Select cols to wrap
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
    $('.pb-column').find('[data-name$="elements_elements"] > .acf-input > .acf-flexible-content > .values > .layout').addClass('-collapsed');
}*/

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
    $(currentColumn).find('[data-name$="elements_elements"] > .acf-input > .acf-flexible-content > .values > .layout').removeClass('-collapsed');
    
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
            newClass = $(this).parent().attr('class');
            console.log(newClass);
            $(this).parent().find('.acf-responsive-options-desk-size-container > select').val(newClass).change();
            newPrevClass = $(this).parent().prev().attr('class');
            console.log(newPrevClass);
            $(this).parent().prev().find('.acf-responsive-options-desk-size-container > select').val(newPrevClass).change();
            largeColUpdate();
        },
        stop: function(){
            $(this).removeClass('dragging').parent().parent().removeClass('sizing');
        }
    });
});

$('#poststuff').on('mouseleave','[data-layout^="page_builder_columns"] > .acf-fields', function(e){
    $('.column-merge').remove();
});

/*    $('#poststuff').on('mouseenter','[data-layout^="page_builder_columns"]:not(.modal-open)', function(e){

        $(this).find('> .acf-fc-layout-controlls').prepend('<a class="acf-icon -pencil small" href="#" title="Edit this layout"></a>');

});
$('#poststuff').on('mouseleave','[data-layout^="page_builder_columns"]', function(e){
    $(this).find('> .acf-fc-layout-controlls .-pencil').remove();
});
$('#poststuff').on('click','.-pencil', function(e){
    console.log($(this).siblings())
    $(this).closest('[data-layout^="page_builder_columns"]').addClass('pb-modal modal-open').removeClass('-collapsed');
    $(this).closest('.acf-fc-layout-controlls').prepend('<a class="acf-icon -plus small pb-close-modal" href="#" title="Close this layout"></a>');
    $(this).siblings('.-pencil').remove();
    $(this).closest('.acf-fc-layout-controlls .-pencil').remove();
});
$('#poststuff').on('click','.modal-open .acf-fc-layout-controlls .pb-close-modal', function(e){
    $(this).closest('.pb-modal').removeClass('pb-modal modal-open');
    $(this).remove();
});*/

acf_actions = $('#page-builder .tmpl-popup');

$(acf_actions).each(function(){
    $(this).append('<div class="acf-fc-popup acf-pb-layouts grid-layouts"><label>Add Grid Elements</label></div><div class="acf-fc-popup acf-pb-layouts media-layouts"><label>Add Media Elements</label></div><div class="acf-fc-popup acf-pb-layouts content-layouts"><label>Add Content Elements</label></div>');
    action_parent = $(this).parent('.acf-flexible-content');
    content = $(this).html();
    newContent = '<div class="acf-pb-actions">'+content+'</div>';
    $(action_parent).append(newContent);
});
mediaActions = $('.acf-pb-actions [data-layout^="media_"]');
$(mediaActions).each(function(){
    mediaActionsParent = $(this).closest('.acf-pb-actions').find('.media-layouts');
    $(this).appendTo(mediaActionsParent);
});
contentActions = $('.acf-pb-actions [data-layout^="content_"],.acf-pb-actions [data-layout^="page_builder_columns_"]');
$(contentActions).each(function(){
    contentActionsParent = $(this).closest('.acf-pb-actions').find('.content-layouts');
    $(this).appendTo(contentActionsParent);
});
gridActions = $('.acf-pb-actions [data-layout^="page_builder_columns_"]');
$(gridActions).each(function(){
    gridActionsParent = $(this).closest('.acf-pb-actions').find('.grid-layouts');
    $(this).appendTo(gridActionsParent);
});

actionHolders = $('.acf-pb-layouts');
$(actionHolders).each(function(){
    $(this).find('a').addClass('acf-button button button-primary');
    if ( !$(this).find('a').length ) {
        $(this).hide();
    }
})