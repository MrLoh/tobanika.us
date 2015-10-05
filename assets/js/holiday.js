function make(type, attributes){
    var elem = document.createElement(type);
    for ( var name in attributes ){
        if ( attributes.hasOwnProperty(name) ){
            if ( name == 'text' ){
                elem.appendChild(document.createTextNode(attributes[name]));
            } else {
                elem.setAttribute(name, attributes[name]);
            }
        }
    }
    return elem
}

function populateList(id, items){
    var list = document.getElementById(id);
    for ( var i in items ){
        var card = make('div', {'class': 'card'});
        list.appendChild(card);

        var figure = make('figure', {});
        card.appendChild(figure);

        figure.appendChild(make('img', {'alt': items[i].name, 'src': 'assets/img/holiday/'+items[i].name+'.jpg', 'width': '360', 'height': '240'}));
        figure.appendChild(make('figcaption', {'text': items[i].title}));

        card.appendChild(make('p', {'text': items[i].caption}));
    };
}

populateList('chicago-activities', activities);
populateList('midwest-trips', trips);
