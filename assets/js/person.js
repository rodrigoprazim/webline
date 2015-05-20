function formSubmit(form, action) {
    if(action!=''){
        document.forms[form].action=action;
        document.forms[form].submit();
    }
}

tinymce.init({
    selector: "textarea#elm2",
    language : 'pt_BR',
    plugins: "textcolor print code",
    toolbar: "forecolor backcolor print"
});

tinymce.init({
    selector: "textarea#elm1",
    language : 'pt_BR',
    plugins: "textcolor media advlist autoresize charmap print code insertdatetime searchreplace table",
    toolbar: "forecolor backcolor print insertdatetime searchreplace inserttable",
    insertdatetime_formats: ["%d/%m/%y", "%H:%M"]

});

$(document).ready(function() {
    jQuery(function($){
        $("#contato_").mask("(99)999999999");
    });
});
