$(document).ready(function () {

  $("#" + genero).prop('checked', true);

    if (nacionalidad == "Chilena") {
        $("#chilena").prop("checked", true);
    } else {
        $("#otros").prop("checked", true);
        $("#txt_otros").show();
        $("#txt_otros").val(nacionalidad);
        $("#otros").val($("#txt_otros").val());
    }

    $("#comuna option[value='" + comuna + "']").prop('selected', true);
    $("#nivel_pregrado option[value='" + nivel_pregrado + "']").prop('selected', true);
    $("#nivel_pregrado2 option[value='" + nivel_pregrado2 + "']").prop('selected', true);
    $("#nivel_postgrado option[value='" + nivel_postgrado + "']").prop('selected', true);
    $("#nivel_postgrado2 option[value='" + nivel_postgrado2 + "']").prop('selected', true);
    $("#institucion_bancaria option[value='" + institucion_bancaria + "']").prop('selected', true);
    $("#tipo_cuenta option[value='" + tipo_cuenta + "']").prop('selected', true);
    $("#perfil option[value='" + perfil + "']").prop('selected', true);
    
});
