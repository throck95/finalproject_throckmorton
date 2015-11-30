$( function() {
    $('#ratingCurrent').text($('#rating').val()/20);
    $('#rating').change(function() {
        $('#ratingCurrent').text($('#rating').val()/20);
    });
    $('#submitButton').click(function() {
        var beverage_type = $('#beverage_type').val().text;
        var beverage_name = $('#beverage_name').text;
        var beverage_descrip = $('#beverage_descrip').val();
        var rating = $('#rating').val()/20;
        var comment = $('#comment').val();
        if(beverage_type == "Beer") {
            var brewery = $('#beer_brewery').text;
            $.ajax({
                url: 'beverage_store',
                type: 'post',
                data: {'beverage_type':beverage_type,'beverage_name':beverage_name,'beverage_descrip':beverage_descrip,'rating':rating,'comment':comment,'brewery':brewery,'_token': $('input[name=_token]')},
                success: function(data) {
                    console.log(data);
                }
            });
        }
        else if(beverage_type == "Wine") {
            var wine_color = $('input[name=wine_color]:checked').val();
            var wine_vineyard = $('#wine_vineyard').text;
            var wine_vintage = $('#wine_vintage').text;
            $.ajax({
                url: 'beverage_store',
                type: 'post',
                data: {'beverage_type':beverage_type,'beverage_name':beverage_name,'beverage_descrip':beverage_descrip,'rating':rating,'comment':comment,'wine_color':wine_color,'wine_vineyard':wine_vineyard,'wine_vintage':wine_vintage,'_token': $('input[name=_token]')},
                success: function(data) {
                    console.log(data);
                }
            });
        }
        else if(beverage_type == "Mixed Drink") {
            var md_ingredients = $('#md_ingredients').val();
            $.ajax({
                url: 'beverage_store',
                type: 'post',
                data: {'beverage_type':beverage_type,'beverage_name':beverage_name,'beverage_descrip':beverage_descrip,'rating':rating,'comment':comment,'md_ingredients':md_ingredients,'_token': $('input[name=_token]')},
                success: function(data) {
                    console.log(data);
                }
            });
        }

    });
    $('#beverage_type').change(function() {
        var sel_value = $('option:selected').val();
        if(sel_value == "1") {
            if($("#wine_color")) {
                $("#wine_color").remove();
                $("#wine_color2").remove();
                $("#wine_color_label").remove();
                $("#wine_color_whiteLabel").remove();
                $("#wine_color_redLabel").remove();
                $("#wine_color_br").remove();
            }
            if($("#wine_vineyard")) {
                $("#wine_vineyard").remove();
                $("#wine_vineyard_label").remove();
                $("#wine_vineyard_br").remove();
            }
            if($("#wine_vintage")) {
                $("#wine_vintage").remove();
                $("#wine_vintage_label").remove();
                $("#wine_vintage_br").remove();
            }
            if($("#md_ingredients")) {
                $("#md_ingredients").remove();
                $("#md_ingredients_label").remove();
                $("#md_ingredients_br").remove();
                $("#md_ingredients_br2").remove();
            }
            var label = $("<label>").attr('for','beer_brewery').attr('id','beer_brewery_label').text('Brewery:');
            $('#beverage_createForm').append(label);
            var breakl = $("<br>").attr('id','beer_brewery_br');
            $('#beverage_createForm').append(breakl);
            $('#beverage_createForm').append($("<input/>", {
                type: 'text',
                placeholder: 'Enter Brewery',
                id: 'beer_brewery',
                class: 'input'
            }));
            $('#beer_brewery_label').insertBefore("#beverage_descrip_label");
            $('#beer_brewery').insertBefore("#beverage_descrip_label");
            $('#beer_brewery_br').insertBefore("#beverage_descrip_label");
        }
        else if(sel_value == "2") {
            if($("#beer_brewery")) {
                $("#beer_brewery").remove();
                $("#beer_brewery_label").remove();
                $("#beer_brewery_br").remove();
            }
            if($("#md_ingredients")) {
                $("#md_ingredients").remove();
                $("#md_ingredients_label").remove();
                $("#md_ingredients_br").remove();
                $("#md_ingredients_br2").remove();
            }
            var label = $("<label>").attr('for','wine_color').attr('id','wine_color_label').text('Wine Color:');
            $('#beverage_createForm').append(label);
            var label = $("<label>").attr('for','wine_color').attr('id','wine_color_whiteLabel').text('White');
            $('#beverage_createForm').append(label);
            var label = $("<label>").attr('for','wine_color2').attr('id','wine_color_redLabel').text('Red');
            $('#beverage_createForm').append(label);
            var breakl = $("<br>").attr('id','wine_color_br');
            $('#beverage_createForm').append(breakl);
            $('#beverage_createForm').append($("<input/>", {
                type: 'radio',
                name: 'wine_color',
                id: 'wine_color',
                value: 'White',
                class: 'input'
            }));
            $('#beverage_createForm').append($("<input/>", {
                type: 'radio',
                name: 'wine_color',
                id: 'wine_color2',
                value: 'Red',
                class: 'input'
            }));
            $('#wine_color_label').insertBefore("#beverage_descrip_label");
            $('#wine_color_whiteLabel').insertBefore("#beverage_descrip_label");
            $('#wine_color').insertBefore("#beverage_descrip_label");
            $('#wine_color_redLabel').insertBefore("#beverage_descrip_label");
            $('#wine_color2').insertBefore("#beverage_descrip_label");
            $('#wine_color_br').insertBefore("#beverage_descrip_label");
            var label = $("<label>").attr('for','wine_vineyard').attr('id','wine_vineyard_label').text('Vineyard:');
            $('#beverage_createForm').append(label);
            var breakl = $("<br>").attr('id','wine_vineyard_br');
            $('#beverage_createForm').append(breakl);
            $('#beverage_createForm').append($("<input/>", {
                type: 'text',
                placeholder: 'Enter Vineyard',
                id: 'wine_vineyard',
                class: 'input'
            }));
            $('#wine_vineyard_label').insertBefore("#beverage_descrip_label");
            $('#wine_vineyard').insertBefore("#beverage_descrip_label");
            $('#wine_vineyard_br').insertBefore("#beverage_descrip_label");
            var label = $("<label>").attr('for','wine_vintage').attr('id','wine_vintage_label').text('Vintage:');
            $('#beverage_createForm').append(label);
            var breakl = $("<br>").attr('id','wine_vintage_br');
            $('#beverage_createForm').append(breakl);
            $('#beverage_createForm').append($("<input/>", {
                type: 'number',
                placeholder: 'Enter Vintage',
                id: 'wine_vintage',
                class: 'input'
            }));
            $('#wine_vintage_label').insertBefore("#beverage_descrip_label");
            $('#wine_vintage').insertBefore("#beverage_descrip_label");
            $('#wine_vintage_br').insertBefore("#beverage_descrip_label");
        }
        else if(sel_value == "3") {
            if($("#wine_color")) {
                $("#wine_color").remove();
                $("#wine_color2").remove();
                $("#wine_color_label").remove();
                $("#wine_color_whiteLabel").remove();
                $("#wine_color_redLabel").remove();
                $("#wine_color_br").remove();
            }
            if($("#wine_vineyard")) {
                $("#wine_vineyard").remove();
                $("#wine_vineyard_label").remove();
                $("#wine_vineyard_br").remove();
            }
            if($("#wine_vintage")) {
                $("#wine_vintage").remove();
                $("#wine_vintage_label").remove();
                $("#wine_vintage_br").remove();
            }
            if($("#beer_brewery")) {
                $("#beer_brewery").remove();
                $("#beer_brewery_label").remove();
                $("#beer_brewery_br").remove();
            }
            var label = $("<label>").attr('for','md_ingredients').attr('id','md_ingredients_label').text('Ingredients:');
            $('#beverage_createForm').append(label);
            var breakl = $("<br>").attr('id','md_ingredients_br');
            $('#beverage_createForm').append(breakl);
            var breakl2 = $("<br>").attr('id','md_ingredients_br2');
            $('#beverage_createForm').append(breakl2);
            $('#beverage_createForm').append($("<textarea/>", {
                rows: '4',
                cols: '100',
                placeholder: 'Enter ingredients separated by commas.',
                id: 'md_ingredients',
                class: 'input'
            }));
            $('#md_ingredients_label').insertBefore("#beverage_descrip_label");
            $('#md_ingredients_br').insertBefore("#beverage_descrip_label");
            $('#md_ingredients').insertBefore("#beverage_descrip_label");
            $('#md_ingredients_br2').insertBefore("#beverage_descrip_label");
        }
    })
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
});