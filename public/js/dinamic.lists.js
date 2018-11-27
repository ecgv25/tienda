/*
Author: Leonardo Aniceto
Email: lanice03@gmail.com
File: js
*/

function getMunicipio(estado) {
  var munic = $('select.municipio-get');
  var parro = $('select.parroquia-get');

  $.ajax({
    url: '/api/municipio',
    type: 'POST',
    //headers: xHeaders,
    data: {
      estado: estado
    },
    success: function(response) {
      if (response.length > 0) {
        munic.html('').append($('<option>')).val('');//.trigger('change');
        parro.html('').append($('<option>')).val('');//.trigger('change');
        munic.append($('<option selected>').val(0).text("Seleccione..."));
        parro.append($('<option selected>').val(0).text("Seleccione..."));
        for (i = 0; i < response.length; i++) {
          munic.append(
            $('<option>').val(response[i].id).text(response[i].nombre)
          );
        }
        munic.children('option:first').remove();
        parro.children('option:first').remove();
        if (munic.data('old') > 0) {
          //munic.selectpicker('val', munic.data('old'))
          munic.val(munic.data('old'));
        }
        //munic.selectpicker('refresh');
        //parro.selectpicker('refresh');
      }
    },
    error: function(response) {
      console.log(response.status + " - " + response.statusText);
      notify('', response.status + " - " + response.statusText, 'error');
    }
  });
}

function getParroquia(municipio) {
  var parro = $('select.parroquia-get');

  $.ajax({
    url: '/api/parroquia',
    type: 'POST',
    //headers: xHeaders,
    data: {
      municipio: municipio
    },
    success: function(response) {
      if (response.length > 0) {
        parro.html('').append($('<option>')).val('').trigger('change');
        parro.append($('<option selected>').val(0).text("Seleccione..."));
        for (i = 0; i < response.length; i++){
          parro.append(
            $('<option>').val(response[i].id).text(response[i].nombre)
          );
        }
        parro.children('option:first').remove();
        if (parro.data('old') > 0) {
          //parro.selectpicker('val', parro.data('old'))
          parro.val(parro.data('old'));
        }
        //parro.selectpicker('refresh');
      }
    },
    error: function(response) {
      console.log(response.status + " - " + response.statusText);
      notify('', response.status + " - " + response.statusText, 'error');
    }
  });
}

// Buscar municipios del estado
$('select.estado-get').change(function(e) {
  e.preventDefault();
  var estad = $('option:selected', $(this));
  getMunicipio(estad.val());
});

// Buscar parroquias del municipio
$('select.municipio-get').change(function(e) {
  e.preventDefault();
  var munic = $('option:selected', $(this));
  getParroquia(munic.val());
});