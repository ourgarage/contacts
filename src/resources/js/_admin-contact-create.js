$('#trumbowygContactCreate').trumbowyg({
    lang: appLocale,
    btnsDef: {
        image: {
            dropdown: ['insertImage', 'upload'],
            ico: 'insertImage'
        }
    },
    btns: [
        ['viewHTML'],
        ['formatting'],
        'btnGrp-semantic',
        ['superscript', 'subscript'],
        ['link'],
        ['image'],
        'btnGrp-justify',
        'btnGrp-lists',
        ['foreColor', 'backColor'],
        ['horizontalRule'],
        ['removeformat'],
        ['fullscreen']
    ]
});
